<?php 
header("Access-Control-Allow-Origin: *");
$value = $_GET['team'];
$RelevantTeams=array();
$NewRelevantTeams=array();
$recipes=array();
$temp=array();
$result_Team= array();
$result_id= array();
$post_array=array();
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

$sql = "SELECT ID, Team_Name,Link FROM al_links";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $result_Team[]=$row["Team_Name"];
      $result_id[]=$row["ID"];
      $result_link[]=$row["Link"];
       
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
  
  
  for($i=0; $i<count($RelevantTeams);$i++)
  {
    
$key = array_search($RelevantTeams[$i], $result_Team);
$link=$result_link[$key];

$rss = new DOMDocument();
  $rss->load($link);
  $feed = array();
  $imageurl=array();
  $xml = simplexml_load_file($link);
  $images = $xml->xpath("//media:content");



    foreach ($images as $image){
         
        $image['url'];
        $url= $image['url'];    
        $imageurl[]=$url;
      }
        

  foreach ($rss->getElementsByTagName('item') as $node) {
    
         
    $item = array ( 
      'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
      'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
      'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
      'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
      

      );

    array_push($feed, $item);
    
  }
  
  
        
  


  $limit = 6;
  for($x=1;$x<$limit;$x++) 
  {
    $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    $link = $feed[$x]['link'];
    $description = $feed[$x]['desc'];
    $date =  $feed[$x]['date'];

    
    $post_array[] = array('Title' => $title ,
                          'Link'=>$link,
                          'Description'=>$description,
                          'Date'=>$date,
                          'ImageUrl'=>$imageurl[$x]);
    
    

}

}
$post=json_encode(array('Newsfeed'=>$post_array));
echo $post;
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

$sql = "SELECT ID, Team_Name,Link FROM nl_link";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $result_Team[]=$row["Team_Name"];
      $result_id[]=$row["ID"];
      $result_link[]=$row["Link"];
       
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
$link=$result_link[$key];

$rss = new DOMDocument();
  $rss->load($link);
  $feed = array();
  $imageurl=array();
  $xml = simplexml_load_file($link);
  $images = $xml->xpath("//media:content");



    foreach ($images as $image){
         
        $image['url'];
        $url= $image['url'];    
        $imageurl[]=$url;
      }
        

  foreach ($rss->getElementsByTagName('item') as $node) {
    
         
    $item = array ( 
      'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
      'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
      'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
      'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
      

      );

    array_push($feed, $item);
    
  }
  
  
        
  


  $limit = 6;
  for($x=1;$x<$limit;$x++) 
  {
    $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    $link = $feed[$x]['link'];
    $description = $feed[$x]['desc'];
    $date =  $feed[$x]['date'];

    
    $post_array[] = array('Title' => $title ,
                          'Link'=>$link,
                          'Description'=>$description,
                          'Date'=>$date,
                          'ImageUrl'=>$imageurl[$x]);
    
    

}

}
$post=json_encode(array('Newsfeed'=>$post_array));
echo $post;
}
}
?>