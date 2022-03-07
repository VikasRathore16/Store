<?php

use App\Store;

require "../vendor/autoload.php";

$search = new Store();

$parameter = $_GET['query'];
echo $search->getSearch($parameter);
?>