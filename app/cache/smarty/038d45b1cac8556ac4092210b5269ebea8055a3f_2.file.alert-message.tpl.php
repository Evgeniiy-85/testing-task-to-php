<?php /* Smarty version 3.1.27, created on 2019-02-15 13:24:47
         compiled from "E:\Projects\test_site\app\views\alert-message.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:189045c66936f3f3944_93814544%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '038d45b1cac8556ac4092210b5269ebea8055a3f' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\alert-message.tpl',
      1 => 1448307989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189045c66936f3f3944_93814544',
  'variables' => 
  array (
    'alert_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c66936f3f86e3_08024983',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c66936f3f86e3_08024983')) {
function content_5c66936f3f86e3_08024983 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '189045c66936f3f3944_93814544';
if ($_smarty_tpl->tpl_vars['alert_message']->value) {?>
<?php echo '<script'; ?>
>
$(document).ready(function() {
	if ($('#alert-message').length) {
		setTimeout('$(\'#alert-message\').fadeOut(200, function() { $(this).remove(); });', 3500);
	}
});
<?php echo '</script'; ?>
>

<div id="alert-message" class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['alert_message']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['alert_message']->value['text'], ENT_QUOTES, 'UTF-8');?>
</div>
</div>
<?php }
}
}
?>