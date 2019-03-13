<form method="post" action="" class="common-forms">

	{include 'errors.tpl'}
	
	<div class="row">
		<div class="lbl"><label for="af-site_name">Название сайта</label></div>
		<div class="inp"><input type="text" name="site_name" id="af-site_name" class="txt" size="40" maxlength="100" value="{$form_data.site_name}" /></div>
	</div>
	
	<div class="row separator"></div>
	
	<h3><a href="#" class="ajax" onclick="$('#password-change-form').slideToggle('fast'); return false;">Смена пароля</a></h3>
	
	<div class="columns clearfix" id="password-change-form" style="display: none;">
		<div class="row">
			<div class="lbl"><label for="af-password_old">Старый пароль</label></div>
			<div class="inp"><input type="password" name="password_old" id="af-password_old" /></div>
		</div>
		<div class="row">
			<div class="lbl"><label for="af-password_new">Новый пароль</label></div>
			<div class="inp"><input type="password" name="password_new" id="af-password_new" /></div>
		</div>
		<div class="row">
			<div class="lbl"><label for="af-password_new_copy">Еще разок новый пароль</label></div>
			<div class="inp"><input type="password" name="password_new_copy" id="af-password_new_copy" /></div>
		</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>