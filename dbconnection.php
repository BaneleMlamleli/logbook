<?php
//20201027 - Added an alert pop-up message instead of a console printout when there is a successful or unsuccessful database connection - Banele

include_once('project_function.php');

$serverName = $_SERVER['RDS_HOSTNAME'];
$dbport = $_SERVER['RDS_PORT'];
$dbName = $_SERVER['RDS_DB_NAME'];
$charset = 'utf8' ;

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
$username = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];

// $serverName = "";
// $username = "";
// $password = "";
// $dbName = "";

// $link = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);


// switch($_SERVER['RDS_HOSTNAME']){
//     case "localhost":
//         $serverName = "localhost";
//         $username = "root";
//         $password = "";
//         $dbName = "logbook_db";
//         break;
//     case "lamp":
//         $serverName = "lamp";
//         $username = "root";
//         $password = "";
//         $dbName = "logbook_db";
//         break;
// }

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    //Added an alert pop-up message instead of a console printout for an unsuccessful database connection- Banele
    echo "<script type=text/javascript>alert('Database Connection failed')</script>";
    die($conn->connect_error);
}
//Added an alert pop-up message instead of a console printout for a successful database connection- Banele
//echo "<script type=text/javascript>alert('Database Connected successfully')</script>";
?>