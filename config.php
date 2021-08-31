<?php

try{
$con = new PDO("mysql:host=localhost; dbname=dating;", "root", "");

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
echo "Connection Failed". $e->getMessage();
}
?>