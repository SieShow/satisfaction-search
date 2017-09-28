  <?php
//String of database connection  
$connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
/**
* Load Client table
*/
function LoadClient(){
     global $connection;
     $result = $connection->query("select * from customer order by name asc limit 13");
     if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
             echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idcustomer"]."&type=c'>".utf8_encode($row["name"])."</a></td>";
             echo "<td>".$row["forms_answereds"]."</td>";
             echo "<td>".$row["tecnical_visits"]."</td>";

             $get = $connection->query("SELECT ROUND(AVG(evaluation_value),0) AS 'ROUNDAVG'  from form where idcustomer = ".$row["V11_ID"]."");
             $evaluationavg = $get->fetch_assoc();
             if($evaluationavg["ROUNDAVG"] == null){
                  echo "<td>0</td>";
             }
             else{
             echo "<td>".$evaluationavg["ROUNDAVG"]."</td>";
             }
             $getall = $connection->query("SELECT ROUND(((Select Count(issue_solve) From form where issue_solve = 'yes') * 100 / (Select Count(*) From form)),0) as Score From form where issue_solve = 'yes' and idcustomer = ".$row["V11_ID"]."");
             $total = $getall->fetch_assoc();
             if($total["Score"] == null){
                 echo "<td></td>";
             }
             else {
                echo "<td>".$total["Score"]."%</td>";
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
///Load Forms table
function LoadForms(){
    global $connection;
    $result = $connection->query("select idcustomer, idemployee,evaluation_value,issue_solve,commentary, request_sent, request_answered from form order by idform asc");
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $result2 = $connection->query("select name, idcustomer from customer where V11_ID =".$row['idcustomer']);
            $row2 = $result2->fetch_assoc();
            echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row2["idcustomer"]."&type=c'>".$row2["name"]."</a></td>";
            $result2 = $connection->query("select name from employee where V11_code =". $row["idemployee"]);
            $row2 = $result2->fetch_assoc();
            echo "<td>".$row2["name"]."</td>";
            if($row["evaluation_value"] == 5)  echo "<td>5 - Excelente</td>";
            else if($row["evaluation_value"] == 4)  echo "<td>4 - Muito bom</td>";
            else if($row["evaluation_value"] == 3)  echo "<td>3 - Bom</td>";
            else if($row["evaluation_value"] == 2)  echo "<td>2 - Regular</td>";
            else echo "<td>1 - Ruim</td>";
                
            if($row["issue_solve"] == "yes"){
                echo "<td>Sim</td>";
            }
            else {
                echo "<td>Não</td>";
            }
            echo "<td>".utf8_encode($row["commentary"])."</td>";
            echo "<td>".$row["request_sent"]."</td>";
            echo "<td>".$row["request_answered"]."</td>";
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
function LoadDataFrom($id, $table){
    global $connection;
    $sql = "SELECT * FROM $table WHERE id$table = $id";
    $result = $connection->query("SELECT * FROM $table WHERE id$table = $id");
    $output = $result->fetch_assoc();
    if($result->num_rows > 0){return $output;}
    else{return null;}
    }
/**
* Load table referenced to profile historic
*/
function LoadTableColuns($kind){
if($kind == "c"){
    echo "<td>Nome do técnico</td>";
}
else if($kind == "e"){
    echo "<td id='nomecli'>Nome do cliente</td>";
}
else{
    echo "";
}
echo "<td id='nota'>Nota</td>";
echo "<td>Problema resolvido ?</td>";
echo "<td>Comentário</td>";
echo "<td>Data de envio da pesquisa</td>";
echo "<td>Data de resposta da pesquisa</td>";
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
function LoadHistoric($from, $id_vip){
    global $connection;
    $result = $connection->query("SELECT idcustomer, idemployee,evaluation_value,issue_solve,commentary, request_sent, request_answered from form where id".$from." = $id_vip order by idform desc");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $result2 = $connection->query("select name, idcustomer from customer where V11_ID =".$row['idcustomer']);
            $row2 = $result2->fetch_assoc();
            echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row2["idcustomer"]."&type=c'>".$row2["name"]."</a></td>";
            if($row["evaluation_value"] == 5)  echo "<td>5 - Excelente</td>";
            else if($row["evaluation_value"] == 4)  echo "<td>4 - Muito bom</td>";
            else if($row["evaluation_value"] == 3)  echo "<td>3 - Bom</td>";
            else if($row["evaluation_value"] == 2)  echo "<td>2 - Regular</td>";
            else echo "<td>1 - Ruim</td>";
                
            if($row["issue_solve"] == "yes"){
                echo "<td>Sim</td>";
            }
            else {
                echo "<td>Não</td>";
            }
            echo "<td>".utf8_encode($row["commentary"])."</td>";
            echo "<td>".$row["request_sent"]."</td>";
            echo "<td>".$row["request_answered"]."</td></tr>";
        }
    }
}
?>