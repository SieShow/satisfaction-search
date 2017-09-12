<?php

function RunQuery($sql1){
    $sql = $sql1;
    $connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
    $result = $connection->query($sql);
     if($result->num_rows > 0){
         $row = $result->fetch_assoc();
       foreach($row as $val){
           return $val;
       }
     }
     else{
        return 0;
     }
}

?>