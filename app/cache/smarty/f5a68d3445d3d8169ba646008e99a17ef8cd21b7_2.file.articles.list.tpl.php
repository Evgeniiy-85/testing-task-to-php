<?php /* Smarty version 3.1.27, created on 2019-02-20 15:53:30
         compiled from "E:\Projects\test_site\app\views\articles.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:322555c6d4dca5ccd82_21185992%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a68d3445d3d8169ba646008e99a17ef8cd21b7' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\articles.list.tpl',
      1 => 1448372394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322555c6d4dca5ccd82_21185992',
  'variables' => 
  array (
    'articles' => 0,
    '_article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6d4dca611851_13680802',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6d4dca611851_13680802')) {
function content_5c6d4dca611851_13680802 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '322555c6d4dca5ccd82_21185992';
if ($_smarty_tpl->tpl_vars['articles']->value) {?>
	<div class="articles-list">	
		<?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_article'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_article']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_article']->value) {
$_smarty_tpl->tpl_vars['_article']->_loop = true;
$foreach__article_Sav = $_smarty_tpl->tpl_vars['_article'];
?>
		<div class="article-list-item">
			<div class="photo"><a href="/articles/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['_article']->value['photo']) {?><img src="/_upload/images/articles/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['photo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
" /><?php }?></a></div>
			<div class="info">
				<div class="name"><a href="/articles/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></div>
				<div class="description"><?php echo $_smarty_tpl->tpl_vars['_article']->value['summary'];?>
</div>
				<div class="extras">
					<div class="date"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['_article']->value['add_time']), ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['_article']->value['add_time'],'%H:%M'), ENT_QUOTES, 'UTF-8');?>
</div>
				</div>
			</div>
		</div>
		<?php
$_smarty_tpl->tpl_vars['_article'] = $foreach__article_Sav;
}
?>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('listing.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
}
?>