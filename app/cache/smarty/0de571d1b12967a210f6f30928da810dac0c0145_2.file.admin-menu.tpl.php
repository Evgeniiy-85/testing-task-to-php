<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:39
         compiled from "F:\Projects\test_site\app\views\admin-menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:117365c51947b7ccd81_98976299%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0de571d1b12967a210f6f30928da810dac0c0145' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\admin-menu.tpl',
      1 => 1548063953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117365c51947b7ccd81_98976299',
  'variables' => 
  array (
    'routes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51947b7f5a95_34481673',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51947b7f5a95_34481673')) {
function content_5c51947b7f5a95_34481673 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '117365c51947b7ccd81_98976299';
?>
<ul id="admin-menu">
	<li class="menu-item news<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'news') {?> selected<?php }?>"><a href="/admin/news/">Новости</a></li>
	<li class="menu-item articles<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'articles') {?> selected<?php }?>"><a href="/admin/articles/">Статьи</a></li>
	<li class="menu-item static-pages<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'static-pages') {?> selected<?php }?>"><a href="/admin/static-pages/">Статичные страницы</a></li>
	<li class="menu-item static-pages<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'products') {?> selected<?php }?>"><a href="/admin/products/">Каталог товаров</a></li>
	<li class="menu-item static-pages<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'sections') {?> selected<?php }?>"><a href="/admin/sections/">Разделы</a></li>
	<li class="menu-item menu<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'menu') {?> selected<?php }?>"><a href="/admin/menu/">Меню</a></li>
	<li class="menu-item options<?php if ($_smarty_tpl->tpl_vars['routes']->value[1] == 'options') {?> selected<?php }?>"><a href="/admin/options/">Настройки</a></li>
	<li class="menu-item logout"><a href="/logout/">Выход</a></li>
</ul><?php }
}
?>