<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\listing.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:326985c51946cdb32c7_33047111%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ff68a0ad96077478df704e620db693859f4284d' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\listing.tpl',
      1 => 1444760110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326985c51946cdb32c7_33047111',
  'variables' => 
  array (
    'listing_data' => 0,
    'n' => 0,
    '_ajax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946cdcc228_71988775',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946cdcc228_71988775')) {
function content_5c51946cdcc228_71988775 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '326985c51946cdb32c7_33047111';
if ($_smarty_tpl->tpl_vars['listing_data']->value['listing_numbers']) {?>
<div class="page-listing">
	<div class="numbers">
		<?php
$_from = $_smarty_tpl->tpl_vars['listing_data']->value['listing_numbers'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['n']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
$foreach_n_Sav = $_smarty_tpl->tpl_vars['n'];
?>
		<div class="num<?php if ($_smarty_tpl->tpl_vars['n']->value['this']) {?> disabled<?php }?>" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['n']->value['page_num'], ENT_QUOTES, 'UTF-8');?>
"><?php if (!$_smarty_tpl->tpl_vars['n']->value['this'] && $_smarty_tpl->tpl_vars['n']->value['url']) {?><a href="<?php if (!$_smarty_tpl->tpl_vars['_ajax']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['n']->value['url'], ENT_QUOTES, 'UTF-8');
} else { ?>#<?php }?>" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['n']->value['page'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['_ajax']->value) {?> class="ajax"<?php }?>><?php echo $_smarty_tpl->tpl_vars['n']->value['page'];?>
</a><?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['n']->value['page'], ENT_QUOTES, 'UTF-8');
}?></div>
		<?php
$_smarty_tpl->tpl_vars['n'] = $foreach_n_Sav;
}
?>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['listing_data']->value['arrows']) {?>
	<div class="arrows">
		<div class="arrow left" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_left_page'], ENT_QUOTES, 'UTF-8');?>
">← <?php if ($_smarty_tpl->tpl_vars['listing_data']->value['listing_left_url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_left_url'], ENT_QUOTES, 'UTF-8');?>
" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_left_page'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['_ajax']->value) {?> class="ajax"<?php }?>>Назад</a><?php } else { ?>Назад<?php }?></div>
		<div class="separator">|</div>
		<div class="arrow right" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_right_page'], ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['listing_data']->value['listing_right_url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_right_url'], ENT_QUOTES, 'UTF-8');?>
" data-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing_data']->value['listing_right_page'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['_ajax']->value) {?> class="ajax"<?php }?>>Вперед</a> →<?php } else { ?>Вперед →<?php }?></div>
	</div>
	<?php }?>
</div>
<?php }
}
}
?>