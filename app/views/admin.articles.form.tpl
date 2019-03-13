<form method="post" action="" class="common-forms" enctype="multipart/form-data">

	{include 'errors.tpl'}

	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="{$form_data.name}" /></div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-slug">Адрес</label></div>
		<div class="inp">http://{$smarty.server.HTTP_HOST}/articles/ <input type="text" name="slug" id="af-slug" size="50" maxlength="128" value="{$form_data.slug}" /> /</div>
	</div>
	
	{include 'admin.tdk-fields.tpl'}
	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое страницы</label></div>
		<div class="inp"><textarea name="content" id="af-content" class="wysiwyg" rows="10" cols="80">{$form_data.content}</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-summary">Вводный текст</label></div>
		<div class="inp"><textarea name="summary" id="af-summary" class="wysiwyg" rows="10" cols="80">{$form_data.summary}</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-photo">Фотография</label></div>
		<div class="inp">
			{if $form_data.photo}
				{include 'admin.photo-preview.tpl' _url="/_upload/images/articles/`$form_data.photo`" _remove='photo'}
			{/if}
			<input type="file" name="photo" id="af-photo" />
		</div>
		<div class="note">Размер будет уменьшен до 200 x 200 px</div>
	</div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>