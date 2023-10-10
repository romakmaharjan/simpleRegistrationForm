<?php
$HOSTNAME= 'localhost';
$USERNAME= 'root';
$PASSWORD= '';
$DATABASE= 'signupforms';


 //creating an one varaible for connecting my existing database
 $con= mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

 if(!$con){
     die(mysqli_error($con));
 }
?>