<?php

class HandlerMysql {   
    private $con = null;
    private $isPublicInfos = true;

    public  function __construct($db) {
        if ( $db == "fsociety" ) {
            $this->conMysql(DB_HOST, DB_USERNAME_P, DB_PASSWORD_P, DB_NAME_P); 
        } else {
            $this->conMysql(DB_HOST, DB_USERNAME_G, DB_PASSWORD_G, DB_NAME_G); 
        }
    }

    public function conMysql($pHost, $pUser, $pPass, $pDb) {
        try {
            $this->con = new mysqli($pHost, $pUser, $pPass, $pDb);
        } catch ( Exception $e ) {
            throw(new Exception("Erro ao conectar com db."));
        }
        if ( $this->con != null ) {
            return true;
        }
    }

    public function ExecQuery($pQueryString) {
        try {
            $lResult = $this->con->query($pQueryString);
            if (!$lResult) {
                return false;
            } return $lResult;
        } 
        catch (Exception $e) {
			throw(new Exception(" + Error: ".$e));
		}
    }

    public function conMysqlClose() {
        try {
            $lResult = $this->con->close();
            if (!$lResult) {
                throw (new Exception("Connection error "));
            } 
        } catch ( Exception $e ) {
            throw(new Exception($e, "Error attempting to close MySQL connection."));
        }
    }
}

?>

