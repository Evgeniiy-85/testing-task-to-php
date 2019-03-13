<?php /* Smarty version 3.1.27, created on 2019-02-15 13:41:04
         compiled from "E:\Projects\test_site\app\views\admin.photo-preview.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:215995c669740bfd331_77320850%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fee372eb6fd2589527c5b198ef0a3e6ce8ab399' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.photo-preview.tpl',
      1 => 1448609948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215995c669740bfd331_77320850',
  'variables' => 
  array (
    '_url' => 0,
    '_remove' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669740c01402_37062461',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669740c01402_37062461')) {
function content_5c669740c01402_37062461 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '215995c669740bfd331_77320850';
?>
<div class="photo-preview">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="lightbox" target="_blank"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_url']->value, ENT_QUOTES, 'UTF-8');?>
" alt="" /></a>
	<?php if ($_smarty_tpl->tpl_vars['_remove']->value) {?><input type="checkbox" id="af-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_remove']->value, ENT_QUOTES, 'UTF-8');?>
-remove" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_remove']->value, ENT_QUOTES, 'UTF-8');?>
_remove" value="1" style="margin-left: 20px;" /> <label for="af-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_remove']->value, ENT_QUOTES, 'UTF-8');?>
-remove">удалить</label><?php }?>
</div><?php }
}
?>