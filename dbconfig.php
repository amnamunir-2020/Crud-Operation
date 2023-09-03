<?php



$dbserver="mysql:host=localhost;dbname=crud";
$dbusername="root";
$dbpassword="";

try{

$conn=new PDO($dbserver,$dbusername,$dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //set the pdo errormode!  for  database error 

//echo "Connection Success";


}

catch(PDOException $ex){

    echo "Connection Failed" .$e->getMessage();

}




















?>