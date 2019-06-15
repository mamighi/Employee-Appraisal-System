<?php
ob_start();

error_reporting( E_ALL & ~E_NOTICE);

require_once("constants.php");
require_once("common_functions.php");

/*
 * turn off magic-quotes support, for runtime e, as it will cause problems if enabled
 */
if (version_compare(PHP_VERSION, 5.3, '<') && function_exists('set_magic_quotes_runtime')) set_magic_quotes_runtime(0);

//connect with the server
$conn = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD) or die("Sorry! could not connect <br><b>". mysqli_error($conn)."</b>");
if ($conn) {
	mysqli_select_db($conn,DB_DATABASE) or die("Sorry! could not connect with database <br><b>". mysqli_error($conn)."</b>");
}
?>