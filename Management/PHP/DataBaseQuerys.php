  <?php
$connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
/**
* Load Client table
*/
function LoadClient(){
     global $connection;
     $result = $connection->query("select * from customer order by name asc");
     if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){

             echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idcustomer"]."&type=c'>".$row["name"]."</a></td>";
             
             $get = $connection->query("select count(*) from form where idcustomer = ".$row["idcustomer"]."");
             $getnum = $get->fetch_assoc();
             echo "<td>".$getnum["count(*)"]."</td>";
             echo "<td>".$row["tecnical_visits"]."</td>";

             $get = $connection->query("select AVG(evaluation_value) from form where idcustomer = ".$row["idcustomer"]."");
             $evaluationavg = $get->fetch_assoc();
             if($evaluationavg["AVG(evaluation_value)"] == null){
                  echo "<td>0</td>";
             }
             else{
             echo "<td>".$evaluationavg["AVG(evaluation_value)"]."%</td>";
             }

             $getans = $connection->query("select count(*) from form where idcustomer = ".$row["idcustomer"]." and issue_solve = 'sim'");
             $getvalans = $getans->fetch_assoc();
             $getall = $connection->query("select count(*) from form where idcustomer = ".$row["idcustomer"]."");
             $total = $getall->fetch_assoc();
             $val = ($getvalans["count(*)"]*100)/($total["count(*)"]);
             $nan = is_nan($val);
             if($nan){
                 echo "<td>0</td>";
             }
             else {
                echo "<td>".$val."%</td>";
             }             
             } 
         }
     }
 /**
* Load employee table
*/     
function LoadEmpl(){
    global $connection;
      $result = $connection->query("select * from employee order by name asc");
       if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idemployee"]."&type=e'>".$row["name"]."</a></td>";
               
              $get = $connection->query("select AVG(evaluation_value) from form where idemployee = ".$row["idemployee"]."");
              $evaluationavg = $get->fetch_assoc();
              if($evaluationavg["AVG(evaluation_value)"] == null){
                   echo "<td>0</td>";
              }
              else{
              echo "<td>".$evaluationavg["AVG(evaluation_value)"]."%</td>";
              }

              $getans = $connection->query("select count(*) from form where idemployee = ".$row["idemployee"]." and issue_solve = 'sim'");
              $getvalans = $getans->fetch_assoc();
              $getall = $connection->query("select count(*) from form where idemployee = ".$row["idemployee"]."");
              $total = $getall->fetch_assoc();
              if($getvalans["count(*)"] != 0){
              $val = ($getvalans["count(*)"]*100)/($total["count(*)"]);
              $nan = is_nan($val);
              if($nan){
                  echo "<td>0</td>";
              }
              else {
                 echo "<td>".$val."%</td>";
              }
            }
            else{
                echo "<td>0</td>";
            }             
          }
       }
}
/**
* Check in mainprofile's GET what is the table of database referenced
*/
function GetTableReference($type){
    if($type == "c")return "customer";
    else return "employee";
}
function LoadCustomerProfile($id, $name){
    global $connection;
    $result = $connection->query("SELECT * FROM form WHERE id$name = $id");
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
                $get = $connection->query("SELECT name from $name where id$name = $id");              
                $name = $get->fetch_assoc();
                echo "<td>".$name["name"]."</td>";
        }
    }
}
/**
* Load table referenced to profile historic
*/
function LoadTableColuns($kind){
if($kind == "c"){
    echo "<td>Nome do técnico</td>";
}
else if($kind == "e"){
    echo "<td>Nome do cliente</td>";
}
else{
    echo "";
}
echo "<td>Nota</td>";
echo "<td>Problema resolvido ?</td>";
echo "<td>Comentário</td>";
echo "<td>Data da visita</td>";
}

function GetNumberFromQuery($sql1){
    $sql = $sql1;
    global $connection;
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

function GetNameFromBD($id, $table){
    global $connection;
    $get = $connection->query("SELECT name FROM $table WHERE id$table = $id");
    $name = $get->fetch_assoc();
    return $name["name"];
}

function GetEmailsFromBD($id, $table){
    global $connection;
    $get = $connection->query("SELECT emails FROM $table WHERE id$table = $id");
    $name = $get->fetch_assoc();
    $val_to_return = "";
    foreach($name as $single_mail){
        return $single_mail;
    }
}
function GetLastVisitRecord($id, $table){
    global $connection;
    $get = $connection->query("SELECT count(*) FROM form WHERE id$table = $id");
    $name = $get->fetch_assoc();
    return $name["name"];
}
?>