var baseUrl = "http://localhost/DesignThinking/";
/*
|--------------------------------------------------------------------------
| Navbar
|--------------------------------------------------------------------------
|
*/
$(document).on("click", ".user_dropdown_toggle", function toggle() {
	$('.user_dropdown').toggle();

});
/*
|--------------------------------------------------------------------------
| Egzamin
|--------------------------------------------------------------------------
|
*/
function initialize_exam_form() {
	$(document).on("click", ".next", function nextQuestion() {
		let question = $(this).parent();
		if(is_checked_question(question))
		{
			question.addClass('hidden');
			question.next().removeClass('hidden');

		}
		else {
			showResponse("Trzeba coś zaznaczyć!")
		}

	});
	$(document).on("click", ".prev", function prevQuestion() {
		let question = $(this).parent();
		// if(is_checked_question(question))
		// {
			question.addClass('hidden');
			question.prev().removeClass('hidden');
		// }
		// else {
		// 	showResponse("Trzeba coś zaznaczyć!")
		// }
	});

	function is_checked_question(question) {
		if (!$(question.find("input:checked")).val()) {
			return false;
		} else {
			return true;
		}
	}
}
function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function(e) { //$(document) na początku żeby działało dla dynamicznych elementów
		e.preventDefault();
		var data = $(this).serialize();
		sendPostData(data, url);
		if (refresh) {
			$('.accept-response').addClass("refresh");
		} else {
			$('.accept-response').removeClass("refresh");
		}
	});
}
$(document).on("submit", '.egzamin_form', function(e) {
	e.preventDefault();
	var data = $(this).serialize();
	$.ajax({
		url: baseUrl + 'Egzamin/ajax_finish_exam',
		type: 'POST',
		data: data,
		success: function(serverResponse) {
			if(serverResponse==='[EXAM_FINISHED]')
			{
				window.location.replace(baseUrl + "Egzamin");
			}
			else{
				showResponse(serverResponse);
			}
		},
		error: function() {
			showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
		}
	});
});
/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
|
*/
$(document).on("submit", '.logout_form', function(e) {
	e.preventDefault();
	var data = $(this).serialize();
	$.ajax({
		url: baseUrl + 'Login/ajax_logout',
		type: 'POST',
		data: data,
		success: function(serverResponse) {
			if(serverResponse==='[LOGOUT_FINISHED]')
			{
				window.location.replace(baseUrl);
			}
			else{
				showResponse(serverResponse);
			}
		},
		error: function() {
			showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
		}
	});
});
/*
|--------------------------------------------------------------------------
| Ranking
|--------------------------------------------------------------------------
|
*/
function gradient_percent() {
	var circles = $(".exam_ranking_circle");
	for (var i = 0; i < circles.length; i++) {
		var precent = circles[i].firstChild.innerHTML;
		if (precent == 100)
			precent *= 2;
		$(circles[i]).css('background', 'linear-gradient(0deg, rgb(88, 178, 255) 0%,rgba(255,0,0,0)' + precent + "%)")
	}
}
/*
|--------------------------------------------------------------------------
| Generowanie PDF'a
|--------------------------------------------------------------------------
|
*/
function generatePDF(data) {
	var name = data.user_name;
	var date = data.recent_exam_date;
	var image1 = data.image1;
	var image2 = data.image2;
	var docDefinition = {
		content: [{
				text: "Karta Młodego Ratownika\n",
				fontSize: 22,
				bold: true,
				alignment: 'center',
				margin: [0, 15, 0, 10]
			},
			{
				image: image1,
				width: 320,
				height: 80
			},
			{
				text: name + " ukończył kurs" + " dnia: " + date,
				fontSize: 18,
				margin: [0, 15, 0, 0],
				alignment: 'center',
			},
			{
				image: image2,
				width: 320,
				height: 200
			}
		],
		pageSize: {
			width: 325,
			height: 204
		},
		pageMargins: 1
	};
	pdfMake.createPdf(docDefinition).download(name + '.pdf');

	String.prototype.capitalize = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	};
}

function downloadPDFOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function(e) { //$(document) na początku żeby działało dla dynamicznych elementów
		e.preventDefault();
		$.ajax({
			url: baseUrl + url,
			type: 'POST',
			success: function(data) {
				if (data.substring(0, 7) === "[ERROR]") {
					data = data.replace(/^(\[ERROR\])/, "");
					showResponse(data);
				} else {
					data = data.replace(/^(\[ERROR\])/, "");
					generatePDF(JSON.parse(data));
				}
			}
		});
	});
}
/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
|
*/
function showResponse(response) {
	$('.blur').show();
	$('.response').show();
	$('.response > .text').html(response);
	$('.accept-response').focus();
}

function hideResponse() {
	$('.blur').hide();
	$('.response').hide();
}

function sendPostData(data, url) {
	$.ajax({
		url: baseUrl + url,
		type: 'POST',
		data: data,
		success: function(serverResponse, refresh) {
			showResponse(serverResponse, refresh);
		},
		error: function() {
			showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
		}
	});
}



function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function(e) { //$(document) na początku żeby działało dla dynamicznych elementów
		e.preventDefault();
		var data = $(this).serialize();
		sendPostData(data, url);
		if (refresh) {
			$('.accept-response').addClass("refresh");
		} else {
			$('.accept-response').removeClass("refresh");
		}
	});
}
$(function() {
	initialize_exam_form();
	gradient_percent();
	$('.accept-response').on("click", function() {
		if ($(this).hasClass('refresh')) {
			location.reload();
		} else {
			hideResponse();
		}
	});
	sendPostDataOnSubmit('.login_form', 'Login/ajax_login', true);
	sendPostDataOnSubmit('.register_form', 'Register/ajax_register');
	sendPostDataOnSubmit('.finish_kurs_form', 'Kurs/ajax_finish_kurs', true);
	sendPostDataOnSubmit('.restart_exam_form', 'Egzamin/ajax_restart_exam', true);
	sendPostDataOnSubmit('.forgotten_password_form', 'UserPassword/ajax_forgottenPassword', true);
	sendPostDataOnSubmit('.change_password_form', 'UserPassword/ajax_changePassword', true);

	downloadPDFOnSubmit('.PDF_form', 'PDF/ajax_get_PDF_data', true);
});

/*
|--------------------------------------------------------------------------
| Google Analystics
|--------------------------------------------------------------------------
|
*/

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98113799-1', 'auto');
  ga('send', 'pageview');
