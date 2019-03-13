<?php /* Smarty version 3.1.27, created on 2019-03-10 19:15:59
         compiled from "E:\Projects\test_site\app\views\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:275815c85383fdc2c46_36035954%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fb8540cf070fd3ee506286283fd2518c50dcc98' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\sidebar.tpl',
      1 => 1552234557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275815c85383fdc2c46_36035954',
  'variables' => 
  array (
    'user' => 0,
    'sections_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c85383fded683_53809148',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c85383fded683_53809148')) {
function content_5c85383fded683_53809148 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '275815c85383fdc2c46_36035954';
if ($_smarty_tpl->tpl_vars['user']->value->status == 'admin') {?>
	<div class="sidebar-block"><?php echo $_smarty_tpl->getSubTemplate ('admin-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
</div>
<?php }?>

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

<?php if ($_smarty_tpl->tpl_vars['sections_tree']->value && $_smarty_tpl->tpl_vars['user']->value->status == 'guest') {?>
	<div class="sidebar-block sections">
		<?php echo $_smarty_tpl->tpl_vars['sections_tree']->value;?>

	</div>
<?php }

}
}
?>