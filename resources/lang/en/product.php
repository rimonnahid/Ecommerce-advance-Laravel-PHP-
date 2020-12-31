<?php

$langs =  DB::table('products')->select('key','en_details')->get();

$output = array();
foreach($langs as $lang){
	$output[$lang->key] = $lang->en_details;
}
return $output;