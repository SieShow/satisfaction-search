  <?php
include_once('../php/class/Paginator.php');
include_once('../php/class/Database.php');
//String of database connection  
$connection = Database::getConnection();

/**
* Load Client table
*/
function loadLink($sql){
    global $connection;

    $result =  mysqli_query($connection, $sql);
    $number_of_results = mysqli_num_rows($result);
    echo "<div class='pagination'>";

    for($page = 1; $page <= $number_of_results / 25; $page++){
        echo  "<a href='mainclientes.php?pg=$page'>$page</a>";
    }
    echo "</div>";
}
/**
 * Load informations of client table
 */
function loadClient($page){
    global $connection;

    $startResult = ($page-1)*25;
    $result = $connection->query("SELECT * FROM customer ORDER BY name asc limit $startResult,25");

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
             echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idcustomer"]."&type=c'>".utf8_encode($row["name"])."</a></td>";
             echo "<td>".$row["tecnical_visits"]."</td>";
             echo "<td>".$row["forms_answereds"]."</td>";
             echo "<td>".$row["avaliation_avarage"]."</td>";
             echo "<td>".$row["effectiviness"]."%</td>";
            }
    }
}

function tratarComentario($commentary){
    if($commentary == null || $commentary == "") return "-";
    return utf8_encode(utf8_encode($commentary));
}

function tratarNotaDeAvaliacao($nota){
    if($nota == 5)  return "5 - Excelente";
    else if($nota == 4)  return "4 - Muito bom";
    else if($nota == 3)  return "3 - Bom";
    else if($nota == 2)  return "2 - Regular";
    return "<td>1 - Ruim</td>";
}

function tratarSolucaoDoProblema($issue_solved){
    if($issue_solved == "yes"){
        return "Sim";
    }
    return "Não";
}

/**
 * Load informations of employeers table
 */
function loadEmployers($page){
    global $connection;
    
    $startResult = ($page-1)*25;
    $result = $connection->query("SELECT * FROM employee ORDER BY idemployee asc limit $startResult,25");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc())
        {    
             echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idemployee"]."&type=e'>".utf8_encode($row["name"])."</a></td>";
             echo "<td>".$row["note_avarage"]."</td>";
             echo "<td>".$row["issue_sol_avarage"]."%</td>";
        }
    }
}

function loadForms($page){
    global $connection;
    
    $startResult = ($page-1)*25;
    $result = $connection->query("SELECT customer.idcustomer, employee.idemployee, customer.name as customer_name, employee.name as employee_name,
     form.evaluation_value as val, form.issue_solve as solved, form.commentary as comment, form.request_sent
      as sent_date, form.request_answered as answered_date from ((form inner join customer on form.idcustomer 
      = customer.V11_ID)inner join employee on form.idemployee = employee.V11_code) ORDER BY idform asc limit
       $startResult,25");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc())
        {    
            echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idcustomer"]."&type=c'>".$row["customer_name"]."</a></td>";
            echo "<td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idemployee"]."&type=e'>".$row["employee_name"]."</a></td>";
            echo "<td>".tratarNotaDeAvaliacao($row["val"])."</td>";
            echo "<td>".tratarSolucaoDoProblema($row["solved"])."</td>";
            echo "<td>".tratarComentario($row["comment"]) ."</td>";
            echo "<td>".$row["sent_date"]."</td>";
            echo "<td>".$row["answered_date"]."</td>";
        }
    }
}

/**
* Check in mainprofile's GET where type is referencing
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
    
    if($result->num_rows > 0){
        return $output;
    }
    else{
        return null;
    }

}
/**
* Load table referenced to profile historic
*/
function LoadTableColuns($kind){
if($kind == "c"){
    echo "<th>Nome do técnico</th>";
}
else if($kind == "e"){
    echo "<th>Nome do cliente</th>";
}
else{
    echo "";
}
echo "<th id='nota'>Nota</th>";
echo "<th>Problema resolvido ?</th>";
echo "<th>Comentário</th>";
echo "<th>Data de envio da pesquisa</th>";
echo "<th>Data de resposta da pesquisa</th>";
}
/**
 * carrega o número de registros das tabelas
 */
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
/**
 * carrega o nome de um usuario através do seu ID
 */
function GetNameFromBD($id, $table){
    global $connection;
    $get = $connection->query("SELECT name FROM $table WHERE id$table = $id");
    $name = $get->fetch_assoc();
    return $name["name"];
}
/**
 * Carrega os emails registrados de um cliente
 */
function GetEmailsFromBD($id, $table){
    global $connection;
    $get = $connection->query("SELECT emails FROM $table WHERE id$table = $id");
    $name = $get->fetch_assoc();
    $val_to_return = "";
    foreach($name as $single_mail){
        return $single_mail;
    }
}
/** 
 * Carrega o historico de um cliente ou funcionário
*/
function LoadHistoric($from, $id_vip){
    global $connection;
    $result = $connection->query("SELECT idcustomer, idemployee,evaluation_value,issue_solve,commentary, request_sent, request_answered from form where id".$from." = $id_vip order by idform desc");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $result2 = $connection->query("select name from customer where V11_ID =".$row['idcustomer']);
            $row2 = $result2->fetch_assoc();
            echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=".$row["idcustomer"]."&type=e'>".$row2["name"]."</a></td>";
            echo "<td>".tratarNotaDeAvaliacao($row["evaluation_value"])."</td>";
            echo "<td>".tratarSolucaoDoProblema($row["issue_solve"])."</td>";
            echo "<td>".tratarComentario($row["commentary"])."</td>";
            echo "<td>".$row["request_sent"]."</td>";
            echo "<td>".$row["request_answered"]."</td></tr>";
        }
    }
}
?>