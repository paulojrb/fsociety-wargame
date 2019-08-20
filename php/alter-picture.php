<?php

/* Required modify picture */
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
$pImg   = addslashes($_POST["img"]);
$pUser  = $_SESSION["name_user"];
/* ----- POST ------ */

$handler  = new HandlerMysql("fsociety");
$pQueryString = "update users set img='$pImg' where username='$pUser' ";
if ($lResult = $handler->ExecQuery($pQueryString) === TRUE ) {
    $_SESSION["alter-img"] = "Imagem alterada com sucesso";
} else {
    $_SESSION["alter-img"] = "Erro ao alterar imagem";
}
$handler->conMysqlClose();

/* Redirect default */
header('Location: ../dashboard/');

?>