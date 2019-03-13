<?php /* Smarty version 3.1.27, created on 2019-02-15 13:28:17
         compiled from "E:\Projects\test_site\app\views\admin-menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:117095c669441a51e09_74002796%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfca8345093d55f58f306791df3c7a9587ce1ee3' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin-menu.tpl',
      1 => 1548063953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117095c669441a51e09_74002796',
  'variables' => 
  array (
    'routes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669441a87ce0_61578300',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669441a87ce0_61578300')) {
function content_5c669441a87ce0_61578300 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '117095c669441a51e09_74002796';
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