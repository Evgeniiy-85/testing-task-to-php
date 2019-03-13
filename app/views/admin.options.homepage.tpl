<form method="post" action="" class="common-forms">

	{include 'errors.tpl'}
	
	{include 'admin.tdk-fields.tpl'}
	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое страницы</label></div>
		<div class="inp"><textarea name="content" id="af-content" rows="8" cols="80" class="wysiwyg">{$form_data.content}</textarea></div>
		<div class="note">Enter — параграф. Shift + Enter — новая строка</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>