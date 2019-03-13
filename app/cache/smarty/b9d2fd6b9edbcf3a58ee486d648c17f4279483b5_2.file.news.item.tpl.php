<?php /* Smarty version 3.1.27, created on 2019-01-30 15:38:39
         compiled from "F:\Projects\test_site\app\views\news.item.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:25955c519acfccb741_74630857%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9d2fd6b9edbcf3a58ee486d648c17f4279483b5' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\news.item.tpl',
      1 => 1448628138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25955c519acfccb741_74630857',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519acfceea10_87127985',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519acfceea10_87127985')) {
function content_5c519acfceea10_87127985 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';

$_smarty_tpl->properties['nocache_hash'] = '25955c519acfccb741_74630857';
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