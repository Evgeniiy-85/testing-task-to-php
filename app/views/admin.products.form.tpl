
<link rel="stylesheet" href="/_assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/_assets/css/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript" src="/_assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/_assets/js/bootstrap-multiselect.js"></script>

{literal}
<script>
	$(document).ready(function() {
		$('#products-sections').multiselect();
	});
</script>
{/literal}

<form method="post" action="" class="common-forms" enctype="multipart/form-data">
	{include 'errors.tpl'}
	<div class="row">
		<div class="lbl"><label for="af-section">Раздел</label></div>
		<div class="products-sections-box">
			{$sections_tree nofilter}
		</div>
	</div>
		
	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="{$form_data.name}" /></div>
	</div>
	
	{include 'admin.tdk-fields.tpl'}
	
	
	<div class="row">
		<div class="lbl"><label for="af-content">Описание</label></div>
		<div class="inp">
			<textarea name="content" id="content" class="wysiwyg" rows="10" cols="80">{$form_data.content}</textarea>
		</div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-links">Ссылки</label></div>
		<div class="inp">
			<textarea name="links_content" id="links_content" class="wysiwyg" rows="10" cols="80">{$form_data.links_content}</textarea>
		</div>
		<div class="note">
			Shift + Enter — новая ссылка
		</div>
	</div>
		
	<div class="row">
		<div class="lbl"><label for="af-photo">Фото</label></div>
		<div class="inp">
			{if $form_data.photo}
				{include 'admin.photo-preview.tpl' _url="/_upload/images/products/`$form_data.photo`" _remove='photo'}
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