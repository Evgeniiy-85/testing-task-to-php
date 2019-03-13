<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:42
         compiled from "F:\Projects\test_site\app\views\news.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:94145c51947e8520c1_39864699%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bef3633edd47347cdcd644db0109c0b3f670c0df' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\news.list.tpl',
      1 => 1547632121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94145c51947e8520c1_39864699',
  'variables' => 
  array (
    'news' => 0,
    '_article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51947e885f98_15028488',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51947e885f98_15028488')) {
function content_5c51947e885f98_15028488 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';

$_smarty_tpl->properties['nocache_hash'] = '94145c51947e8520c1_39864699';
if ($_smarty_tpl->tpl_vars['news']->value) {?>
	<div class="articles-list">	
		<?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
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
			<div class="info">
				<div class="name"><a href="/news/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></div>
				<div class="description"><?php echo $_smarty_tpl->tpl_vars['_article']->value['summary'];?>
</div>
				<div class="extras">
					<div class="date"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['_article']->value['add_date']), ENT_QUOTES, 'UTF-8');?>
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