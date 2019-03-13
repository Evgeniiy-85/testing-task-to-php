<script>
function users_login() {

	var login_form = $('#login-form');

	element_disable($(login_form), true);
	
	$.ajax({
		type     : 'post',
		url      : '/users/',
		data     : 'action=login&' + $(login_form).serialize(),
		dataType : 'json',
		success  : function(data, ans) {
			if (data.status == 'success') {
				if (!data.redirect) {
					window.location.href = '/';
				} else {
					window.location.href = data.redirect;
				}
			} else if (data.status == 'fail') {
				var errors = data.errors;
				$(login_form).find('.errors').remove();
				$(login_form).prepend('<ul class="errors" style="display: none;"></ul>');
				for (i = 0; i < errors.length; i++) {
					$(login_form).find('ul.errors').append('<li>' + errors[i] + '</li>');
				}
				$(login_form).find('.errors').slideDown();
				element_disable($(login_form));
			}
		}
	});
	
	return false;

}
</script>

<form method="post" action="" class="common-forms" onsubmit="users_login(); return false;" id="login-form">
	<div class="rows">
		<div class="row">
			<div class="lbl"><label for="lf-login">Логин</label></div>
			<div class="inp"><input type="text" name="login" id="lf-login" class="txt" required="required" /></div>
		</div>
		<div class="row">
			<div class="lbl"><label for="lf-password">Пароль</label></div>
			<div class="inp"><input type="password" name="password" id="lf-password" class="txt" required="required" /></div>
		</div>
		<div class="row">
			<div class="inp">
				<input type="submit" value="Вход" />
				<div class="preloader" style="position: absolute; margin-top: 8px;"></div>
			</div>
		</div>
	</div>
</form>

<script>
	$('#lf-login').focus();
</script>