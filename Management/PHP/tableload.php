  <?php
  function load($sql, $colums){ 
   $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
   $result = $connection->query($sql);
   if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){
           echo "<tr><td><a class='linkname' href='../Pages/mainprofile.php?profile=1'>".$row[$colums[0]]."</a></td>";
           for($i = 1; $i < sizeof($colums); $i++){
           echo "<td>". $row[$colums[$i]] ."</td>";
           }
           echo "</td>";
       }
   }
  }

  
  //Get Avarage of avaliation, note etc. just set as parameter the sql command right
  // and the function will return the number
  function Avarage($sqlget){
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
   ?>