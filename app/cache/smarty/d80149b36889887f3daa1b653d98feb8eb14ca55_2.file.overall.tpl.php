<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\overall.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:159795c51946cde1106_65423753%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd80149b36889887f3daa1b653d98feb8eb14ca55' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\overall.tpl',
      1 => 1448612044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159795c51946cde1106_65423753',
  'variables' => 
  array (
    'options_basic' => 0,
    'routes' => 0,
    'page_name' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946cdebb39_47240835',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946cdebb39_47240835')) {
function content_5c51946cdebb39_47240835 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '159795c51946cde1106_65423753';
?>
<!DOCTYPE html>
<html>

<head>

	<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
</head>

<body>

	<div id="wrapper">

		<div id="header">
			
			<div class="site-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['options_basic']->value['site_name'], ENT_QUOTES, 'UTF-8');?>
</div>
			
			<?php echo $_smarty_tpl->getSubTemplate ('menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			
		</div>
		
		<div id="main">
		
			<div class="container">
		
				<div id="sidebar">
				
					<?php echo $_smarty_tpl->getSubTemplate ('sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

					
				</div>
				
				<div id="content">
				
					<?php echo $_smarty_tpl->getSubTemplate ('breadcrumbs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

					<?php if ($_smarty_tpl->tpl_vars['routes']->value[0] == 'admin') {
echo $_smarty_tpl->getSubTemplate ('admin-tabs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
}?>
					
					<div>
			
						<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8');?>
</h1>
						
						<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

					
					</div>
					
				</div>
			
			</div>
		
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('alert-message.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
</body>

</html><?php }
}
?>