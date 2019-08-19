<?php

/* Required for register */
session_start();

require_once(__ROOT__.'/classes/handler-mysql.php');
require_once(__ROOT__.'/includes/database-config.php');

/* ------------------------------------------
 * validation to prevent injection attacks
 * ------------------------------------------ */
/* ----- POST ------ */
$pUsername = addslashes($_POST["USER"]);
$pPassword = hash('sha256', $_POST["PASS"]);
$pToken = addslashes($_POST["TOKEN"]);
/* ----- POST ------ */

$response = array();
$handler  = new HandlerMysql("fsociety");
$pQueryStringToken = "select cod from tokens where token='$pToken' ";
$lResult = $handler->ExecQuery($pQueryStringToken);
$lRows = $lResult->fetch_array();
if ( $lRows != NULL ) {
    $codToken = $lRows[0];
    $pQueryStringToken = "select cod from users where token='$pToken' ";
    $lResult = $handler->ExecQuery($pQueryStringToken);
    $lRows = $lResult->fetch_array();
    if ( $lRows == NULL ) {
        $pQueryString  = "insert into users (username, password, token) values ('$pUsername', '$pPassword', $codToken) ";
        if ($lResult = $handler->ExecQuery($pQueryString) === TRUE ) {
            $response["error"] = "";
            $response["msg"] = "Usuário criado com sucesso";
        } else {
            $response["error"] = "A3";
            $response["msg"] = "Servidor temporariamente indisponível, tente novamente mais tarde";
        }
    } else {
        $response["error"] = "A2";
        $response["msg"] = "Token está em uso";
    }
} else {
    $response["error"] = "A1";
    $response["msg"] = "Token inválido";
}
$_SESSION["create_user"] = $response;

$handler->conMysqlClose();

/* Redirect default */
header('Location: ../index.php');

?>