<?php

$langs =  DB::table('categories')->select('id','cate_name_bn')->get();

$output = array();
$output[$lang->id] = $lang->cate_name_bn;

return $output;