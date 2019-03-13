<?php /* Smarty version 3.1.27, created on 2019-02-22 14:15:40
         compiled from "E:\Projects\test_site\app\views\articles.item.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:102765c6fd9dc6cec83_01725444%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2f09fda425dd5558656b0542bdd85cb9d2f1310' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\articles.item.tpl',
      1 => 1448372697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102765c6fd9dc6cec83_01725444',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6fd9dc70d070_81556287',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6fd9dc70d070_81556287')) {
function content_5c6fd9dc70d070_81556287 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '102765c6fd9dc6cec83_01725444';
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