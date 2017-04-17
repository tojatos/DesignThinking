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
$(document).on("click", ".next", function nextQuestion() {
	let question = $(this).parent();
	question.addClass('hidden');
	question.next().removeClass('hidden');

});
/*
|--------------------------------------------------------------------------
| Generowanie PDF'a
|--------------------------------------------------------------------------
|
*/

function generatePDF(data) {
	var name = data.user_name;
	var date = data.recent_exam_date;
	var image = data.image;

	var docDefinition = {
		content: [{
				text: "Karta Młodego Ratownika\n",
				fontSize: 18,
				bold: true,
				alignment: 'center',
				margin: [0, 0, 0, 10]
			},
			{
				image: image,
				width: 220,
				height: 50
			},
			{
				text: name + " ukończył kurs" + " dnia: " + date,
				fontSize: 14,
				margin: [0, 10, 0, 20],
				alignment: 'center',
			},
			{
				text: "RKO:",
				bold: true,
				fontSize: 12,
				margin: [0, 0, 0, 1]
			},
			{
				fontSize: 10,
				columns: [{
						ul: [
							"30 uciśnięć i 2 wdechy",
							"udzielać",
							"wykorzystać"
						]
					},
					{
						ul: [
							"30 uciśnięć i 2 wdechy",
							"udzielać",
							"wykorzystać"
						]
					}
				],
			},
			{
				text: "RKO:",
				bold: true,
				fontSize: 12,
				margin: [0, 5, 0, 1]
			},
			{
				fontSize: 10,
				columns: [{
						ul: [
							"30 uciśnięć i 2 wdechy",
							"udzielać",
							"wykorzystać"
						]
					},
					{
						ul: [
							"30 uciśnięć i 2 wdechy",
							"udzielać",
							"wykorzystać"
						]
					}
				],
			},
		],
		pageSize: {
			width: 325,
			height: 204
		},
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
	$('.accept-response').on("click", function() {
		if ($(this).hasClass('refresh')) {
			location.reload();
		} else {
			hideResponse();
		}
	});
	sendPostDataOnSubmit('.login_form', 'Login/ajax_login', true);
	sendPostDataOnSubmit('.logout_form', 'Login/ajax_logout', true);
	sendPostDataOnSubmit('.register_form', 'Register/ajax_register');
	sendPostDataOnSubmit('.forgotten_password_form', 'Users/ajax_forgottenPassword', true);
	sendPostDataOnSubmit('.change_password_form', 'Users/ajax_changePassword', true);
	sendPostDataOnSubmit('.finish_kurs_form', 'Kurs/ajax_finish_kurs', true);
	sendPostDataOnSubmit('.egzamin_form', 'Egzamin/ajax_finish_exam', true);

	downloadPDFOnSubmit('.PDF_form', 'PDF/ajax_get_PDF_data', true);
});
