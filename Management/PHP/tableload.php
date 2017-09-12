  <?php
function LoadClient(){
     $connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
      $result = $connection->query("select * from customer order by name asc");
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){

              echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=1'>".$row["name"]."</a></td>";
              
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
              echo "<td>".$evaluationavg["AVG(evaluation_value)"]."</td>";
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
                 echo "<td>".$val."</td>";
              }             
              } 
          }
      }
function LoadEmpl(){
     $connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
      $result = $connection->query("select * from employee order by name asc");
       if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=1'>".$row["name"]."</a></td>";
                
          }
       }
}
?>