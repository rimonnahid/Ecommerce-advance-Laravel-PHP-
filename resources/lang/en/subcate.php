<?php
$langs = DB::table('subcates')->select('key','name')->get();

$output = array();

foreach($langs as $lang){
	$output[$lang->key] = $lang->name;
}
return $output;