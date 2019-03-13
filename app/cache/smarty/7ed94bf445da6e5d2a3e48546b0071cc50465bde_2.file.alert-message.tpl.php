<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\alert-message.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:121895c51946ce4eaa9_52138144%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ed94bf445da6e5d2a3e48546b0071cc50465bde' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\alert-message.tpl',
      1 => 1448307989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121895c51946ce4eaa9_52138144',
  'variables' => 
  array (
    'alert_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946ce52468_58677927',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946ce52468_58677927')) {
function content_5c51946ce52468_58677927 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '121895c51946ce4eaa9_52138144';
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