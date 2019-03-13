<form method="post" action="" class="common-forms">

	{include 'errors.tpl'}

	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="{$form_data.name}" /></div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-add_date">Дата размещения</label></div>
		<div class="inp"><input type="text" name="add_date" id="af-add_date" class="datepicker" maxlength="10" value="{if $form_data.add_date}{$form_data.add_date|date_format:'%d.%m.%Y'}{elseif !$article}{$smarty.now|date_format:'%d.%m.%Y'}{/if}" /></div>
	</div>
	
	{include 'admin.tdk-fields.tpl'}
	
	<div class="row">
		<div class="lbl"><label for="af-summary">Анонс</label></div>
		<div class="inp"><textarea name="summary" id="af-summary" class="wysiwyg" rows="10" cols="80">{$form_data.summary}</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое страницы</label></div>
		<div class="inp"><textarea name="content" id="af-content" class="wysiwyg" rows="10" cols="80">{$form_data.content}</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form>