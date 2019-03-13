<?php /* Smarty version 3.1.27, created on 2019-02-15 13:24:47
         compiled from "E:\Projects\test_site\app\views\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:42835c66936f3df9b8_42169154%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd893a197009e977d32461eb0c9fa8d7f6b130d8' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\footer.tpl',
      1 => 1448355416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42835c66936f3df9b8_42169154',
  'variables' => 
  array (
    'options_basic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c66936f3e7624_44985008',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c66936f3e7624_44985008')) {
function content_5c66936f3e7624_44985008 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '42835c66936f3df9b8_42169154';
?>
<div id="footer">

	<div class="container">
	
		© <?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['options_basic']->value['site_name'], ENT_QUOTES, 'UTF-8');?>

	
	</div>

</div><?php }
}
?>