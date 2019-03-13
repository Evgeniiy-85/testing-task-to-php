<?php /* Smarty version 3.1.27, created on 2019-02-20 19:32:08
         compiled from "E:\Projects\test_site\app\views\static-page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:318005c6d8108019787_83351679%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d270f4c1a1e26e6020554f5ed0252597fbb9c07' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\static-page.tpl',
      1 => 1440503165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318005c6d8108019787_83351679',
  'variables' => 
  array (
    'static_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6d8108047171_96272254',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6d8108047171_96272254')) {
function content_5c6d8108047171_96272254 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '318005c6d8108019787_83351679';
?>
<div class="common-text">
	<?php echo $_smarty_tpl->tpl_vars['static_page']->value['content'];?>

</div><?php }
}
?>