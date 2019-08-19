<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

/* Required for loggin session */
session_start();

/* ------------------------------------------
 * Constants used in application
 * ------------------------------------------ */
require_once ('../includes/constants.php');
require_once (__ROOT__.'/classes/handler-mysql.php');
require_once (__ROOT__.'/includes/database-config.php');

/* ------------------------------------------
 * validation to prevent injection attacks
 * ------------------------------------------ */
/* ----- POST ------ */
$pUsername = addslashes($_POST["username"]);
$pPassword = hash('sha256', $_POST["password"]);
/* ----- POST ------ */

$handler  = new HandlerMysql("fsociety");
$pQueryString  = "select * from users where username='$pUsername' and password='$pPassword' ";
$lResult = $handler->ExecQuery($pQueryString);
$lRows = $lResult->fetch_array();

# exists
if ( $lRows == NULL ) {
    $_SESSION["error_login"] = "Usuário ou senha não inválidos";
} else {
    $_SESSION["name_user"] = $lRows[1];
    $_SESSION["time_for_logoff"] = time() + $TIME_SESSION;
}
$handler->conMysqlClose();

/* Redirect default */
//header('Location: ../index.php');
print_r($_POST);
?>