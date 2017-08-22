  <?php
  function load($sql, $colums){ 
   $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
   $result = $connection->query($sql);
   if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){
           echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=1'>".$row[$colums[0]]."</a></td>";
           for($i = 1; $i <= sizeof($colums); $i++){
            echo "<td>". $row[$colums[$i]] ."</td>";
            if($i == 1){
               echo "<td>123</td>";
           }
           }
           echo "</td>";
       }
   }
  }

  
  //Get Avarage of avaliation, note etc. just set as parameter the sql command right
// Pass the sql command, the main name to compair, and the column name to amount the somatory
  function Avarage($sqlget, $nameto, $columnint){
      $avg = 0;
      $count = 0;
    $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
    $result = $connection->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $avg += $row[0];
            $count++;
        }
        return $avg / count;
    }
  }

  function load_Main(){
         $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
   $result = $connection->query("select * from customer");
   if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){
           echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile='".$row[0].">".$row[$colums[0]]."</a></td>";
           for($i = 1; $i < sizeof($colums); $i++){
           if($i == 1){
               $sqlasn = $connection->query("select idcostumer from costumer where name = " + $row[])
               $getavg = $connection->query("select * evaluation_value from form where idcostumer = ");
               echo "<td>123</td>";
           }
           }
           echo "</td>";
       }
   }
  }
   ?>