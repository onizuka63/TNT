<?php

function debug($data, $style=true) {
    if ($style === true) 
        $str = "<pre style=\"padding:2px; background-color:lightgray\">";
    else
        $str = "<pre>" ;
    $str.= print_r($data, true) . "</pre>";
    return $str;
}
function pdebug($data, $style=true) {
    echo debug($data, $style);
}