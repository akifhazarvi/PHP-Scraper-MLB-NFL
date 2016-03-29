<?php
$teams = array();

$html = file_get_contents('http://espn.go.com/mlb/teams/printSchedule/_/team/stl/season/2015'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

  $pokemon_doc->loadHTML($html);
  libxml_clear_errors(); //remove errors for yucky html

  
  $pokemon_xpath = new DOMXPath($pokemon_doc);

  //get all the h2's with an id
  $AFC_East_row1 = $pokemon_xpath->query('//tr/td');
}



//print_r($result_Team);
// Pull team names into array

foreach ($AFC_East_row1 as $result_object){
   $row1[] = $result_object->nodeValue;
}



$j=6;


while($j<count($row1))
{

if($j==132||$j==262||$j==389)
{
  $j=$j+4;
}
else
{

$Date=$row1[$j];
$Opponent_Team=$row1[$j+1];
$Time=$row1[$j+2];



  
  
 $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'akif';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$sql = "INSERT INTO stlouiscardinals
       (Team_Name,Opponent_Team,Date,Time)
       VALUES ('St. Louis Cardinals','$Opponent_Team','$Date','$Time')"; 
mysql_select_db('mlb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($conn);    
   










$j=$j+3;

}

}


?>