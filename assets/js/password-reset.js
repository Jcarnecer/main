$(document).ready(
	function () {
		var userInput = null;
		$("#userEmail_input").on("change paste keyup", function () {
			userInput = $(this).val().trim();
			if (userInput == '') {
				$('#submit_btn').attr('disabled', 'true');
				// console.log('invalid');
			} else {
				// console.log('valid');
				$('#submit_btn').removeAttr('disabled');
				//if ($('#sendingText_span'))
				if ($('#userEmail_input').hasClass('is-invalid')) {
					$('#userEmail_input').removeClass('is-invalid');
					$('#emailHelp')
						.addClass('text-muted')
						.removeClass('text-danger')
						.text('An email will be sent to you with instructions on how to reset your password');
				}
			}
		});

		$('#passwordReset_form').submit(
			function (e) {
				e.preventDefault();
				$('#submitDefaultText_span').fadeOut('fast',
					function (e) {
						$('#sendingText_span').fadeIn('fast');

						$('#submit_btn').attr('disabled', 'true');

						var userEmail = $('#userEmail_input').val();

						$.post("users/sendLinkForPassReset",
							{
								email: userEmail
							})
							.done(function (data) {
								if (data != 0) {
									$('#userEmail_input').addClass('is-invalid');
									$('#emailHelp')
										.removeClass('text-muted')
										.addClass('text-danger');
									switch (data) {
										case '1':
											$('#emailHelp').text('We couldn\'t find an account with that email.');
											break;
										case '2':
											$('#emailHelp').text('Cannot access SMTP Service.');
											break;
										default:
											$('#emailHelp').text('An Error has occured.');
									}
									$('#sendingText_span').fadeOut('fast',
										function (e) {
											$('#submitDefaultText_span').fadeIn('fast');
										}
									);
								} else if (data == 0) {
									$('#promptModal').modal({ backdrop: 'static', keyboard: false });
									$('#promptModal').modal('show');
									var successText = "Sent <i class=\"fas fa-check\"></i>"
									$('#submit_btn').removeClass('btn-primary')
										.html(successText)
										.addClass('btn-success');
								}

							})
							.fail(function () {
								console.log('something is wrong')
							});
					}
				)
			}
		);

		$("#newPassword_input, #confPassword_input").on("change paste keyup",
			function () {
				if ($("#newPassword_input").val().trim() && $("#confPassword_input").val().trim()) {
					$('#changePass_btn').removeAttr('disabled', 'false');
				} else {
					$('#changePass_btn').attr('disabled', true);
				}
			}
		);
		
		console.log(document.cookie);

		function getCookie(name) {
			
			var cookie_array = document.cookie.split('; ');
			var cookie_value = false;
			for (var i = 0; i < cookie_array.length; i++) {
				if (cookie_array[i].includes(name)) {
					cookie_value = cookie_array[i].split('=')[1];
				}
			}
			return cookie_value;
		}


		$('#resetPasswordForm').submit(
			function (e) {
				e.preventDefault();
				e.stopPropagation();

				var newpass = $('#newPassword_input').val().trim();
				var confpass = $('#confPassword_input').val().trim();

				if (newpass.length !== 8) {
					$('#newPassword_input').addClass('is-invalid');
					$('#newPasswordHelp_txt').removeClass('text-muted').addClass('text-danger');
				}

				if (newpass !== confpass) {
					$('#confPassword_input').addClass('is-invalid');
					$('#confPasswordHelp_txt').removeClass('text-muted').addClass('text-danger');
				}

				$.post("users/setPassword",
					{
						password: newpass,
						userId: getCookie('userId')
					})
					.done(function (data) {
						switch (data) {
							case '0':
								$('#promptModal').modal({ backdrop: 'static', keyboard: false })	;
								$('#promptModal').modal('show');
								$('#for-reset-view_div').fadeOut('fast');
								$('#reset-done').fadeIn('slow');
							break;
							case '1':
								// @todo: an error has occured
							break;
							default:
								// @todo: default error handling
						}
					})
					.fail(function () {
						// @todo: connection error handling
					});
			}
		);
	}
);