<?php 

/*set your website title*/

define('WEBSITE_TITLE', "My Website");

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','addressbook');
define('DB_USER','root');
define('DB_PASS','Weakpass$12');
define('DB_HOST','localhost');

define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}