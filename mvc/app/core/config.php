
<!-- // //define("hai","welcome");
#define('server','mysql');
#define('host','localhost');
#define('username','root');
#define('password','Weakpass$12');
#define('database','addressbook');
#$link = mysqli_connect(server,host,username,password,database); -->

// 

<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Weakpass$12');
define('DB_NAME', 'addressbook');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
