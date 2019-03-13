<?php

function smarty_function_assets_file_url($params, $template)
{
    
	$path = $params['file'];
	
	$filemtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $path);
	
    return $path . "?v=" . $filemtime;
} 