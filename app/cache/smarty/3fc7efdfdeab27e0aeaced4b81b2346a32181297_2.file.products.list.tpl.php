<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\products.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:186615c51946cd6f657_04291669%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fc7efdfdeab27e0aeaced4b81b2346a32181297' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\products.list.tpl',
      1 => 1548685598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186615c51946cd6f657_04291669',
  'variables' => 
  array (
    'products' => 0,
    '_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946cda9987_18984970',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946cda9987_18984970')) {
function content_5c51946cda9987_18984970 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '186615c51946cd6f657_04291669';
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
"><?php if ($_smarty_tpl->tpl_vars['_product']->value['photo']) {?>
					<img src="/_upload/images/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['photo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" /><?php }?>
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
				<div class="content"><?php echo $_smarty_tpl->tpl_vars['_product']->value['content'];?>
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