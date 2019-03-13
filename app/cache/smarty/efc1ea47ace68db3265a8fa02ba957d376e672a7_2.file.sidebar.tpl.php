<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:239425c51946ce1c1f1_03803069%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efc1ea47ace68db3265a8fa02ba957d376e672a7' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\sidebar.tpl',
      1 => 1548418064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239425c51946ce1c1f1_03803069',
  'variables' => 
  array (
    'user' => 0,
    'sections_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946ce22d24_98531149',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946ce22d24_98531149')) {
function content_5c51946ce22d24_98531149 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '239425c51946ce1c1f1_03803069';
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

<div class="sidebar-block products">
	<?php if ($_smarty_tpl->tpl_vars['sections_tree']->value && $_smarty_tpl->tpl_vars['user']->value->status == 'guest') {?>
		<?php echo $_smarty_tpl->tpl_vars['sections_tree']->value;?>

	<?php }?>
</div><?php }
}
?>