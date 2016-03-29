<?php
$teams = array();
$row1=array();
$word1='';
$word2='';

$html = file_get_contents('http://www.cbssports.com/mlb/scoreboard/20150516'); //get the html returned from the following url

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
$dbname = "mlb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Team_Name
FROM american_league
UNION 
SELECT ID, Team_Name
FROM national_league";
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


print_r($result_Team);
// Pull team names into array
foreach ($AFC_East_row1 as $result_object){
   
   $row1[] = $result_object->nodeValue;
}
$i=37;
$j=1;
//print_r($row1);
$count1=0;
$temp1=0;
$count2=0;
$temp2=0;
$Team1="";
$Team2="";


while($j<16)
{

$id=$j;

$team_name1=$row1[$i];
$str1 = trim(preg_replace('/\s*\([^)]*\)/', '', $team_name1));
$word1=trim(str_replace(range(0,9),'',$str1));

$Run1=$row1[$i+10];
$Homerun1=$row1[$i+11];
$E_score1=$row1[$i+12];

$team_name2=$row1[$i+13];
$str2 = trim(preg_replace('/\s*\([^)]*\)/', '', $team_name2));
$word2=trim(str_replace(range(0,9),'',$str2));
$Run2=$row1[$i+23];
$Homerun2=$row1[$i+24];
$E_score2=$row1[$i+25];


if($word1==='Los Angeles')
{
  
foreach ($result_Team as $t_name1 ) {
 


if(strpos($t_name1,$word2)!==false)
{

  $Team1=$t_name1;
  
  
  

}
$count1++;
}
$key1 = array_search($Team1, $result_Team);
$temp1=$result_id[$key1];
if($temp1>=1000&&$temp1<=1014)
{
  
  $word1='Los Angeles Angel';
  
}
else
{
   $word1='Los Angeles Dodg';
   
}

}
if($word1==='New York')
{
foreach ($result_Team as $t_name1 ) {
 


if(strpos($t_name1,$word2)!==false)
{

  $Team1=$t_name1;
  
  
  

}
$count1++;
}
$key1 = array_search($Team1, $result_Team);
$temp1=$result_id[$key1];
if($temp1>=1000&&$temp1<=1014)
{
  $word1='New York Yank';
}
else
{
  $word1='New York Me';
}

}
////////////////////

if($word2==='Los Angeles')
{
  foreach ($result_Team as $t_name1 ) {
 
echo $word1;

if(strpos($t_name1,$word1)!==false)
{

  $Team1=$t_name1;
  
  echo $Team1;
  

}
$count1++;
}
$key1 = array_search($Team1, $result_Team);
echo $key1;

$temp1=$result_id[$key1];


if($temp1>=1000&&$temp1<=1014)
{
  $word2='Los Angeles Angel';
}
else
{
   $word2='Los Angeles Dodge';
}

}
if($word2==='New York')
{
  

  foreach ($result_Team as $t_name1 ) {
 


if(strpos($t_name1,$word1)!==false)
{

  $Team1=$t_name1;
  
  
  

}
$count1++;
}
$key1 = array_search($Team1, $result_Team);
$temp1=$result_id[$key1];


if($temp1>=1000&&$temp1<=1014)
{

  $word2='New York Yankee';
}
else
{
  $word2='New York Met';
 
}

}
foreach ($result_Team as $t_name1 ) {
 


if(strpos($t_name1,$word1)!==false)
{

  $Team1=$t_name1;
  
  
  

}
$count1++;
}

$key1 = array_search($Team1, $result_Team);
$temp1=$result_id[$key1];

foreach ($result_Team as $t_name2) {
 
if(strpos($t_name2,$word2)!==false)
{
  $Team2=$t_name2;

}
$count2++;
}
$key2 = array_search($Team2, $result_Team);
$temp2=$result_id[$key2];
 $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'akif';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$sql = "INSERT INTO Score
       (ID1,Team_Name1,Run1,HomeRun1,E_Run1,ID2,Team_Name2,Run2,HomeRun2,E_Run2)
       VALUES ('$temp1','$Team1','$Run1','$Homerun1','$E_score1','$temp2','$Team2','$Run2','$Homerun2','$E_score2')";
mysql_select_db('mlb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($conn);    
   








$i=$i+44;
$j=$j+1;


}

?>