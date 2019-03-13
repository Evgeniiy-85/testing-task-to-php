<?php /* Smarty version 3.1.27, created on 2019-01-30 15:46:14
         compiled from "F:\Projects\test_site\app\views\articles.item.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:196735c519c96055739_73682006%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c19638c70e55fe5675a8ee50f9cd1dd13a11c83' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\articles.item.tpl',
      1 => 1448372697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196735c519c96055739_73682006',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519c9607fbc8_93833962',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519c9607fbc8_93833962')) {
function content_5c519c9607fbc8_93833962 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '196735c519c96055739_73682006';
?>
<div class="article-item">

	<div class="article-content">
		<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

	</div>

	<div class="article-date"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['article']->value['add_time']), ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['add_time'],'%H:%M'), ENT_QUOTES, 'UTF-8');?>
</div>

</div><?php }
}
?>