<?php
$array = array();
$array[] = array("active_trail" => array('href' => 'node/7', 'title' => 'Uusimmat'));
$array[] = array("active_trail" => array('href' => 'node/5', 'title' => 'Uusimmat'));

$array2 = array();
$array2[] = array("active_trail" => array('href' => 'node/2', 'title' => 'Uusimmat'));
$array = array_merge($array,  $array2);
print_r($array);

foreach ($array as $key => $link) {
    print($key);
}
