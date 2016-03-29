<?php
$teams = array();

$html = file_get_contents('http://www.nfl.com/standings'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

  $pokemon_doc->loadHTML($html);
  libxml_clear_errors(); //remove errors for yucky html
  
  $pokemon_xpath = new DOMXPath($pokemon_doc);

  //get all the h2's with an id
  $AFC_East_row1 = $pokemon_xpath->query('//tr/td');
}

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
print_r($result_id);

//print_r($result_Team);
// Pull team names into array
foreach ($AFC_East_row1 as $result_object){
   $row1[] = $result_object->nodeValue;
}
$i=0;
$j=1;
print_r($row1);

while($j<5)
{

$id=$j;

$team_name=$row1[$i+292];
$word;
$word=substr($team_name, 10,40);


$win=$row1[$i+293];
$lose=$row1[$i+294];
$tie=$row1[$i+295];
$pct=$row1[$i+296];
//$netpoints=$row1[$i+26];
$count=0;
$temp=0;

foreach ($result_Team as $temp ) {
 
if(strpos(strtoupper($word),strtoupper($temp))==TRUE)
{
  $temp=$result_id[$count];
 $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'akif';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$sql = "UPDATE afc_table SET Win ='$win',Lose='$lose',Tie='$tie',Pct='$pct',Rank='$id' WHERE ID='$temp'";
mysql_select_db('nfl_standings');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($conn);    
   
}
$count++;

}





$i=$i+18;
$j=$j+1;


}


?>