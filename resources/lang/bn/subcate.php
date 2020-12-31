<?php
$langs = DB::table('subcates')->select('key','name_bn')->get();

$output = array();

foreach($langs as $lang){
	$output[$lang->key] = $lang->name_bn;
}
return $output;