<!DOCTYPE html>
<html>

<head>

	{include 'header.tpl'}
	
</head>

<body>

	<div id="wrapper">

		<div id="header">
			
			<div class="site-name">{$options_basic.site_name}</div>
			
			{include 'menu.tpl'}
			
		</div>
		
		<div id="main">
		
			<div class="container">
		
				<div id="sidebar">
				
					{include 'sidebar.tpl'}
					
				</div>
				
				<div id="content">
				
					{include 'breadcrumbs.tpl'}
					{if $routes[0] == 'admin'}{include 'admin-tabs.tpl'}{/if}
					
					<div>
			
						<h1>{$page_name}</h1>
						
						{$content nofilter}
					
					</div>
					
				</div>
			
			</div>
		
		</div>
		
		{include 'footer.tpl'}
	
	</div>
	
	{include 'alert-message.tpl'}
	
</body>

</html>