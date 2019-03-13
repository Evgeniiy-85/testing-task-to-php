<?php /* Smarty version 3.1.27, created on 2019-02-15 13:28:15
         compiled from "E:\Projects\test_site\app\views\users.login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:158265c66943f8fb011_49538251%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2960caffeab6661db2d332376575253755c5d538' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\users.login.tpl',
      1 => 1448358222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158265c66943f8fb011_49538251',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c66943f91f911_02129898',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c66943f91f911_02129898')) {
function content_5c66943f91f911_02129898 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '158265c66943f8fb011_49538251';
?>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

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

<?php echo '<script'; ?>
>
	$('#lf-login').focus();
<?php echo '</script'; ?>
><?php }
}
?>