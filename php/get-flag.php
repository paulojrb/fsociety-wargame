<?php

session_start();

/* ------------------------------------------
 * Constants used in application
 * ------------------------------------------ */
require_once ('../includes/constants.php');
require_once (__ROOT__.'/classes/handler-mysql.php');
require_once (__ROOT__.'/includes/database-config.php');

/* ----- POST ------ */
$pFlag = addslashes($_POST["FLAG"]);
$pUser = $_SESSION["name_user"];
/* ----- POST ------ */
$response = array();

$handler  = new HandlerMysql("fsociety");
$pQueryStringToken = "select * from flags where flag='$pFlag' order by cod";
$lResult = $handler->ExecQuery($pQueryStringToken);
$lRows = $lResult->fetch_array();
if ( $lRows != NULL ) {
    $cod = $lRows[0];
    $pQueryString = "insert into user_flag values ('$pUser', $cod)";
    if ($lResult = $handler->ExecQuery($pQueryString) === TRUE ) {
        $response["error"] = "";
        $response["msg"] = "Flag resgatada com sucesso";
    } else {
        $response["error"] = "A2";
        $response["msg"] = "Servidor temporariamente indisponível, tente novamente mais tarde";
    }
} else {
    $response["error_flag"] = "A1";
    $response["msg"] = "Flag inválido";
}
$_SESSION["insertFlag"] = $response;

$handler->conMysqlClose();

/* Redirect default */
header('Location: ../index.php');

?>
