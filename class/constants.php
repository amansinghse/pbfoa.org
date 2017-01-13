<?php
session_name("palmbeach");
session_start();
ini_set('post_max_size','20000M');
ini_set('upload_max_filesize','20000M');
ini_set('memory_limit', '20000M');
define("COMPANY_NAME","Palm Beach");
define("COMPANY_MAIL","fullstackjake@gmail.com");
define("SEND_MAIL",TRUE);
define("ENCRYPT_KEY","worldwide");
define("DB_SERVER_TYPE","mysql");
//https://sg2nlsmysqladm1.secureserver.net/grid50/355/index.php

define("DB_SERVER_NAME","mariadb-100.wc2.dfw3.stabletransit.com");
define("DB_USER_NAME","1007558_jdhflora");
define("DB_USER_PASSWORD","M$%4k[0lJK(m");
define("DB_DATABASE_NAME","1007558_jdhflora");
define("WEBSITE_URL","http://".$_SERVER['HTTP_HOST']."/");
define("UPLOAD_PATH_ORG",$_SERVER['DOCUMENT_ROOT']."/uploads/");
define("UPLOAD_URL_ORG","http://".$_SERVER['HTTP_HOST']."/uploads/");

?>
