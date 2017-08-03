<?php
function Conectiontry(){
$servername = "satisfactionbd";
$username = "root";
$password = "123";
$servermachine = "localhost";
$conn = mysqli_connect($servermachine, $username, $password, $servername);

if($conn){
    echo "Conection sucessfully !!";
}
else{
    die("Conection failed :(" . mysqli_connect_error());
}
}
?>