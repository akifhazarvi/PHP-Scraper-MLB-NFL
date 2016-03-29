<?php
header("Access-Control-Allow-Origin: *");
 
$servername = "sql204.base.pk";
$username = "basep_15870271";
$password = "Ptcl@123";
$dbname = "basep_15870271_nfl_standings";
$recipess= array();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM afc_table WHERE division='East'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      array_push($recipess, $row);
       
  }

}

else {
    echo "0 results";
}

$sql = "SELECT * FROM afc_table WHERE division='North'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      array_push($recipess, $row);
       
  }

}

else {
    echo "0 results";
}

$sql = "SELECT * FROM afc_table WHERE division='South'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      array_push($recipess, $row);
       
  }

}

else {
    echo "0 results";
}

$sql = "SELECT * FROM afc_table WHERE division='West'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      array_push($recipess, $row);
       
  }

}

else {
    echo "0 results";
}


$i=0;
while ($i<count($recipess)) {
	$recipes[] = array('Teams'=>$recipess[$i]);

$i++;	
}
$output = json_encode(array('Standings' => $recipes));
echo $output;
$conn->close();
?>