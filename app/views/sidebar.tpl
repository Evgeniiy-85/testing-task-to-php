{if $user->status == 'admin'}
	<div class="sidebar-block">{include 'admin-menu.tpl'}</div>
{/if}

<div class="sidebar-block copyright">
	<p>Товарищи! Консультация с широким активом влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач.</p>
</div>

<div class="sidebar-block">
	<a href="#" class="ajax" onclick="popup_show('popup-example', 'Информационное окно', 600); return false;">Информация</a>
	<div class="popup-container" id="popup-example">
		<p>Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании форм развития.</p>
		<p>Значимость этих проблем настолько очевидна, что рамки и место обучения кадров требуют от нас анализа модели развития.</p>
	</div>
</div>

{if $sections_tree && $user->status == 'guest'}
	<div class="sidebar-block sections">
		{$sections_tree nofilter}
	</div>
{/if}
