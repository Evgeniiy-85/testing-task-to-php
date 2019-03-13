<form method="post" action="" class="common-forms">

	{include 'errors.tpl'}

	<div class="row">
		<div class="lbl"><label for="af-slug">Адрес</label></div>
		<div class="inp">http://{$smarty.server.HTTP_HOST}/ <input type="text" name="slug" id="af-slug" size="30" maxlength="64" value="{$form_data.slug}" /> /</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row">
		<div class="lbl"><label for="af-name">Название страницы</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="50" maxlength="128" value="{$form_data.name}" /></div>
	</div>
	
	{include 'admin.tdk-fields.tpl'}
	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое</label></div>
		<div class="inp"><textarea name="content" id="af-content" class="wysiwyg" rows="10" cols="80">{$form_data.content}</textarea></div>
		<div class="note">Enter — параграф. Shift + Enter — новая строка</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>