<?php 
const DBHOST = "localhost:3306";
const DBUSER = "root";
const DBPASS = "";
const DBNAME = "opensource";
const DBUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
const TIMEZONE = "Asia/Ho_Chi_Minh";

date_default_timezone_set(TIMEZONE);
date_default_timezone_get();
?>