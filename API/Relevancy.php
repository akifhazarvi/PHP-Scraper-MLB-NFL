<?php 
//header("Access-Control-Allow-Origin: *");
$value = $_GET['team'];
$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "nfl_standings";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Team_Name FROM afc_table";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $result_Team[]=$row["Team_Name"];
      $result_id[]=$row["ID"];
       
  }
}
else {
    echo "0 results";
}
$conn->close();


$word=$value;
$count=0;
$bool=false;
foreach ($result_Team as $temp ) {
 
if((strtoupper($temp)==strtoupper($word)))
{
  $bool=true;
  
  $id=$result_id[$count];
  echo $id;

$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "nfl_standings";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM nflfeed WHERE ID='$id'";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $recipes[] = array('post'=>$row);
       
  }

}
else {
    echo "0 results";
}
$output = json_encode(array('posts' => $recipes));
echo $output;
$conn->close();


}



$count++;



}
if($bool==false)
{$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "nfl_standings";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Team_Name FROM nfc_table";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $result_Team[]=$row["Team_Name"];
      $result_id[]=$row["ID"];
       
  }
}
else {
    echo "0 results";
}
$conn->close();


$word=$value;
$count=0;

foreach ($result_Team as $temp ) {
 
if((strtoupper($temp)==strtoupper($word)))
{
  
  
  $id=$result_id[$count];
  echo $id;

$$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "nfl_standings";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM nflfeed WHERE ID='$id'";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $recipes[] = array('post'=>$row);
       
  }

}
else {
    echo "0 results";
}
$output = json_encode(array('posts' => $recipes));
echo $output;
$conn->close();


}



$count++;



}


}
?>