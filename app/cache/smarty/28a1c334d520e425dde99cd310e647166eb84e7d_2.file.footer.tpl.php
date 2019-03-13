<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:37005c51946ce43268_82027056%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28a1c334d520e425dde99cd310e647166eb84e7d' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\footer.tpl',
      1 => 1448355416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37005c51946ce43268_82027056',
  'variables' => 
  array (
    'options_basic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946ce47be4_56082716',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946ce47be4_56082716')) {
function content_5c51946ce47be4_56082716 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '37005c51946ce43268_82027056';
?>
<div id="footer">

	<div class="container">
	
		© <?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['options_basic']->value['site_name'], ENT_QUOTES, 'UTF-8');?>

	
	</div>

</div><?php }
}
?>