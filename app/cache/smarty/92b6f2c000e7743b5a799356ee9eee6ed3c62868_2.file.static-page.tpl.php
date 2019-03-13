<?php /* Smarty version 3.1.27, created on 2019-01-30 15:45:18
         compiled from "F:\Projects\test_site\app\views\static-page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:110405c519c5e83d4c2_22442050%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92b6f2c000e7743b5a799356ee9eee6ed3c62868' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\static-page.tpl',
      1 => 1440503165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110405c519c5e83d4c2_22442050',
  'variables' => 
  array (
    'static_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519c5e85c5a0_02155330',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519c5e85c5a0_02155330')) {
function content_5c519c5e85c5a0_02155330 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '110405c519c5e83d4c2_22442050';
?>
<div class="common-text">
	<?php echo $_smarty_tpl->tpl_vars['static_page']->value['content'];?>

</div><?php }
}
?>