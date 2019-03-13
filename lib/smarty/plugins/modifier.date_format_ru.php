<?php

function smarty_modifier_date_format_ru($string)
{
	$months = array(
		"01" => "Января",
		"02" => "Февраля",
		"03" => "Марта",
		"04" => "Апреля",
		"05" => "Мая",
		"06" => "Июня",
		"07" => "Июля",
		"08" => "Августа",
		"09" => "Сентября",
		"10" => "Октября",
		"11" => "Ноября",
		"12" => "Декабря"
	);
	
    $date = date("j m Y", strtotime($string));
	$search = array();
	$replace = array();
	
	foreach (array_keys($months) as $m_key) {
		$search[] = "/ (" . $m_key . ") /";
	}
	foreach (array_values($months) as $m_val) {
		$replace[] = " " . mb_strtolower($m_val) . " ";
	}
	
	return preg_replace($search, $replace, $date);
	
}