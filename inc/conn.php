<?php
$host = "ec2-54-161-239-198.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d85gnlj8j0mcj0";
$user = "dfvybslkroicec";
$password = "5fbc0949cb42473725fecfacf19b0e03e91b0bbda4160be46e1acab02a7f4e93"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if(!$dbconn){
    echo "loi";
}
?>