<?php 
require_once "dbconfig.php"

$query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_STRING);

?>