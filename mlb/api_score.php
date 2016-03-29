<?php 
header("Access-Control-Allow-Origin: *");
$value = $_GET['team'];
$RelevantTeams=array();
$NewRelevantTeams=array();
$recipes=array();
$temp=array();
$result_Team= array();
$result_id= array();
$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Team_Name FROM american_league";
$result = $conn->query($sql);


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

array_push($RelevantTeams, $result_Team[$count]);
  $id=$result_id[$count];
  
$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM al_relevancy WHERE ID='$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
  
    while($row = $result->fetch_assoc()) {

      $RelevantTeams[]= $row["Relevant_Team"];
       
  }

}

else {
    echo "0 results";
}

$conn->close();


}



$count++;



}
if($bool==true)
{
  print_r($RelevantTeams);
  
  for($i=0; $i<count($RelevantTeams);$i++)
  {
$key = array_search($RelevantTeams[$i], $result_Team);
$temp = $result_id[$key];

$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM score WHERE ID1='$temp' OR ID2='$temp'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $recipes= array($row);
       
  }
}
else {
    echo "0 results";
}

$conn->close();
}
$output = json_encode( $recipes);
$json_array = json_decode( $output, TRUE );


$new_array = array();
$exists    = array();
foreach( $json_array as $element ) {
    if( !in_array( $element["ID1"], $exists )) {
        $new_array[] = $element;
        $exists[]    = $element["ID1"];
    }
}

$output = json_encode(array('Score' => $new_array));
echo $output;
}

if($bool==false)
{

$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Team_Name FROM national_league";
$result = $conn->query($sql);


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
array_push($RelevantTeams, $result_Team[$count]);
  

$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM nl_relevancy WHERE ID='$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     
       $RelevantTeams[]= $row["Relevant_Team"];
  }

}
else {
    echo "0 results";
}

$conn->close();


}



$count++;



}

if($bool==false)
{
  
  
  
  for($i=0; $i<count($RelevantTeams);$i++)
  {
$key = array_search($RelevantTeams[$i], $result_Team);
$temp = $result_id[$key];

$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "mlb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM score WHERE ID1='$temp' OR ID2='$temp'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $recipes[] = $row;
       
  }
  
}
else {
    echo "0 results";
}

$conn->close();
}
$output = json_encode( $recipes);
$json_array = json_decode( $output, TRUE );


$new_array = array();
$exists    = array();
foreach( $json_array as $element ) {
    if( !in_array( $element["ID1"], $exists )) {
        $new_array[] = $element;
        $exists[]    = $element["ID1"];
    }
}

$output = json_encode(array('Score' => $new_array));
echo $output;
}

}
?>