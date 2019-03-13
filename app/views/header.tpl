<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="/_assets/js/jquery-1.11.3.min.js"></script>

<script type="text/javascript" src="{assets_file_url file='/_assets/js/common.js'}"></script>

<link href="{assets_file_url file='/_assets/css/style.css'}" rel="stylesheet" type="text/css" />
{if $user->status == 'admin'}
<link href="{assets_file_url file='/_assets/css/admin.css'}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/_assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: '.wysiwyg'
	});
</script>
{/if}

<title>{strip}
	{if !$title}
		{$page_name|strip_tags}
	{else}
		{$title}
	{/if}
</title>{/strip}

<meta name="description" content="{$description}" />
<meta name="keywords" content="{$keywords}" />