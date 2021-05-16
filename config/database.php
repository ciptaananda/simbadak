<?php

namespace Config;

class Database{
 
	var $host = "localhost";
	var $username = "postgres";
	var $password = "oaxudowh9";
	var $dbname = "bpnb";
    var $driver = 'pgsql';
    var $conn;
 
	function __construct(){
        $this->conn = pg_connect("host='$this->host' dbname='$this->dbname' user='$this->username' password='$this->password'");
        if (!$this->conn) {
            echo 'Koneksi database gagal dibuat!';
        }
	}
 
} 

?>