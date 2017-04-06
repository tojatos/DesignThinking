var baseUrl = "http://localhost/DesignThinking/";
/*
|--------------------------------------------------------------------------
| Egzamin
|--------------------------------------------------------------------------
|
*/
$(document).on("click", ".next", function nextQuestion() {
	let pytanie = $(this).parent();
	pytanie.addClass('hidden');
	pytanie.next().removeClass('hidden');

});
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
		success: function (serverResponse, refresh) {
			showResponse(serverResponse, refresh);
		},
		error: function () {
			showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
		}
	});
}

function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function (e) { //$(document) na początku żeby działało dla dynamicznych elementów
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
$(function () {
	$('.accept-response').on("click", function () {
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
});
