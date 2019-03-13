<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:28
         compiled from "F:\Projects\test_site\app\views\products.item.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12115c5194703bd2b4_27998192%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ac6d604f1d24ecd954356994069bc3debc86ad7' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\products.item.tpl',
      1 => 1548847495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12115c5194703bd2b4_27998192',
  'variables' => 
  array (
    'product' => 0,
    'links' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c5194703fa598_37871341',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c5194703fa598_37871341')) {
function content_5c5194703fa598_37871341 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12115c5194703bd2b4_27998192';
?>
<div class="product-list-item">
	<div class="photo">
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['sect_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
			<?php if ($_smarty_tpl->tpl_vars['product']->value['photo']) {?>
				<img src="/_upload/images/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['photo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
			<?php }?>
		</a>
	</div>
	<div class="info">
		<div class="name">
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['sect_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
		</div>
		<div class="content"><?php echo $_smarty_tpl->tpl_vars['product']->value['content'];?>
</div>
		<br>
		<?php if ($_smarty_tpl->tpl_vars['links']->value) {?>
			<div class="dealer-links content">
				<?php
$_from = $_smarty_tpl->tpl_vars['links']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['link']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
$foreach_link_Sav = $_smarty_tpl->tpl_vars['link'];
?>
					<?php if ($_smarty_tpl->tpl_vars['link']->value['name'] == '' || $_smarty_tpl->tpl_vars['link']->value['favicon'] == '') {?>
						<?php continue 1;?>
					<?php }?>
					<a class="dealer-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['href'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['name'], ENT_QUOTES, 'UTF-8');?>
" target="_blank">
						<img class="dealer-link-favicon" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
" alt='favicon'>
						<span class="dealer-link-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
						<br>
					</a>
				<?php
$_smarty_tpl->tpl_vars['link'] = $foreach_link_Sav;
}
?>
			</div>
		<?php }?>
	</div>
</div><?php }
}
?>