<?php /* Smarty version 3.1.27, created on 2019-02-15 13:24:47
         compiled from "E:\Projects\test_site\app\views\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:311355c66936f33e0c0_42755778%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f561f798dd9d2944ad75aefa455ec5b116b5185' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\header.tpl',
      1 => 1534837565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311355c66936f33e0c0_42755778',
  'variables' => 
  array (
    'user' => 0,
    'title' => 0,
    'page_name' => 0,
    'description' => 0,
    'keywords' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c66936f35cdc3_18868758',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c66936f35cdc3_18868758')) {
function content_5c66936f35cdc3_18868758 ($_smarty_tpl) {
if (!is_callable('smarty_function_assets_file_url')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\function.assets_file_url.php';

$_smarty_tpl->properties['nocache_hash'] = '311355c66936f33e0c0_42755778';
?>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php echo '<script'; ?>
 type="text/javascript" src="/_assets/js/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo smarty_function_assets_file_url(array('file'=>'/_assets/js/common.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>

<link href="<?php echo smarty_function_assets_file_url(array('file'=>'/_assets/css/style.css'),$_smarty_tpl);?>
" rel="stylesheet" type="text/css" />
<?php if ($_smarty_tpl->tpl_vars['user']->value->status == 'admin') {?>
<link href="<?php echo smarty_function_assets_file_url(array('file'=>'/_assets/css/admin.css'),$_smarty_tpl);?>
" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="/_assets/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	tinymce.init({
		selector: '.wysiwyg'
	});
<?php echo '</script'; ?>
>
<?php }?>

<title><?php if (!$_smarty_tpl->tpl_vars['title']->value) {
echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page_name']->value), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');
}?></title>

<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value, ENT_QUOTES, 'UTF-8');?>
" />
<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keywords']->value, ENT_QUOTES, 'UTF-8');?>
" /><?php }
}
?>