<?php
$string = file_get_contents("../data.json");
if ($string === false) {
    // deal with error...
    die("Shit hit the fan!");
}

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
    die("Another shit hit the fan!");

}

var_dump($json_a);

// foreach ($json_a as $person_name => $person_a) {
//     echo $person_a['status'];
// }

$json_a[] = $_POST;

var_dump($json_a);

$fp = fopen('../data.json', 'w');
fwrite($fp, json_encode($json_a));
fclose($fp);