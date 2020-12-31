<?php

$langs =  DB::table('categories')->select('id','cate_name')->get();

$output = array();
foreach($langs as $lang){
	$output[$lang->id] = $lang->cate_name;
}
return $output;