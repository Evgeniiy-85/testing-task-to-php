<?php /* Smarty version 3.1.27, created on 2019-02-20 16:57:10
         compiled from "E:\Projects\test_site\app\views\products.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:42515c6d5cb674a144_74233696%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bb39e2ae33005ee96936cd4808bae1685df524a' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\products.list.tpl',
      1 => 1550671028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42515c6d5cb674a144_74233696',
  'variables' => 
  array (
    'products' => 0,
    '_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6d5cb6782818_00963332',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6d5cb6782818_00963332')) {
function content_5c6d5cb6782818_00963332 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '42515c6d5cb674a144_74233696';
if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<div class="products-list">
		<?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_product']->value) {
$_smarty_tpl->tpl_vars['_product']->_loop = true;
$foreach__product_Sav = $_smarty_tpl->tpl_vars['_product'];
?>
			<div class="product-list-item">
			<div class="photo">
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['sect_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
					<?php if ($_smarty_tpl->tpl_vars['_product']->value['photo']) {?>
						<img src="/_upload/images/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['photo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
					<?php }?>
				</a>
			</div>
			<div class="info">
				<div class="name">
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['sect_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
				</div>
				<div class="description">
					<?php echo $_smarty_tpl->tpl_vars['_product']->value['content'];?>

				</div>
			</div>
		</div>
		<?php
$_smarty_tpl->tpl_vars['_product'] = $foreach__product_Sav;
}
?>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('listing.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
}
?>