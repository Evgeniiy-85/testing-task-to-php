<?php /* Smarty version 3.1.27, created on 2019-02-20 14:55:34
         compiled from "E:\Projects\test_site\app\views\news.item.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:195495c6d40368ba897_19452166%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1946254b9a51cf3de8d3a9caf99e6bbee3a7da17' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\news.item.tpl',
      1 => 1448628138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195495c6d40368ba897_19452166',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6d40368f9526_46116203',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6d40368f9526_46116203')) {
function content_5c6d40368f9526_46116203 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';

$_smarty_tpl->properties['nocache_hash'] = '195495c6d40368ba897_19452166';
?>
<div class="article-item">

	<div class="article-content">
		<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

	</div>

	<div class="article-date"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['article']->value['add_date']), ENT_QUOTES, 'UTF-8');?>
</div>

</div><?php }
}
?>