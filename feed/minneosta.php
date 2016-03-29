<?php
	$rss = new DOMDocument();
	$rss->load('http://rss.scout.com/rss.aspx?&p=18&nid=113');
	$feed = array();
	$imageurl=array();
	$xml = simplexml_load_file('http://rss.scout.com/rss.aspx?&p=18&nid=113');
	$images = $xml->xpath("//media:content");
//echo "<pre>";print_r($images);die;
		foreach ($images as $image){
         
        $image['url'];
        $url= $image['url'];    
        $imageurl[]=$url;}
        

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
	for($x=1;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date =  $feed[$x]['date'];
		
	
$servername = "localhost";
$username = "root";
$password = "akif";
$dbname = "nfl_standings";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



$sql = 'INSERT INTO nflfeed (ID, Team_Name,Title,Description,ImageUrl,Date)
VALUES ("2006","Minnesota Vikings","'.$title.'","'.$description.'","'.$imageurl[$x].'","'.$date.'")';
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



}
$conn->close();





?>