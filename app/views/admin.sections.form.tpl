<form method="post" action="" class="common-forms" enctype="multipart/form-data">

	{include 'errors.tpl'}

	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="{$form_data.name}" /></div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-url">Адрес</label></div>
		<div class="inp">http://{$smarty.server.HTTP_HOST}{$form_data.url}</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-parent-section">Главный раздел</label></div>
		<div class="note">{$sections_tree nofilter}</div>
	</div>
	
	{include 'admin.tdk-fields.tpl'}
	
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>