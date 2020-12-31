<?php
$langs =  DB::table('products')->select('key','bn_details')->get();

$output = array();
foreach($langs as $lang){
	$output[$lang->key] = $lang->bn_details;
}
return $output;
