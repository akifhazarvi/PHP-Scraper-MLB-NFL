<?php
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

$sql = "SELECT * FROM nfc_table ORDER BY Conf_Rank";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $result_Team[]=$row["Team_Name"];
        $result_rank[]=$row["Conf_Rank"];
        $result_Division[]=$row["Division"];
        $result_Win[]=$row["Win"];
        $result_Lose[]=$row["Lose"];
        $result_Tie[]=$row["Tie"];
        $result_id[]=$row["ID"];

      


  }
}
else {
    echo "0 results";
}
$a=0;
$conn->close();

while($a<count($result_Team))
{
$Team_name=$result_Team[$a];	
$Division_Rank=0;
$conference_Rank=0;
$Division;
$pct=0;
$win=0;
$id=0;
$related_Team= array();
$weakrelated_Team= array();



for ($i=0; $i <count($result_Team) ; $i++) 
{

if($Team_name==$result_Team[$i])
{

	
	$conference_Rank=$result_rank[$i];
	$win=$result_Win[$i];
	$Lose=$result_Lose[$i];
	$Tie=$result_Tie[$i];
	$id=$result_id[$i];



}
	
	}
	echo $conference_Rank;

	
	if($conference_Rank==1)
	{
		echo "string";
		$diff=$win-$result_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[2]);
		}
		$diff=$win-$result_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[3]);
		}
	}
	if($conference_Rank==1)
	{
		$diff=$win-$result_Win[1];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[2];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[2]);
		}
		$diff=$win-$result_Win[3];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[3]);
		}
	}
	

if($conference_Rank==2)
	{
		
		$diff=$win-$result_Win[0];

		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[2]);
		}
		$diff=$win-$result_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[3]);
		}
	}


	if($conference_Rank==2)
	{
		$diff=$win-$result_Win[0];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[2];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[2]);
		}
		$diff=$win-$result_Win[3];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[3]);
		}
	}

	if($conference_Rank==3)
	{
		$diff=$win-$result_Win[0];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[3]);
		}
	}
	if($conference_Rank==3)
	{
		$diff=$win-$result_Win[0];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[1];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[3];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[3]);
		}
	}
	if($conference_Rank==4)
	{
		$diff=$win-$result_Win[0];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $result_Team[2]);
		}
	}
	if($conference_Rank==4)
	{
		$diff=$win-$result_Win[0];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[0]);
		}
		$diff=$win-$result_Win[1];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[1]);
		}
		$diff=$win-$result_Win[2];
		if($diff==-2 || $diff==2)
		{
		array_push($weakrelated_Team, $result_Team[2]);
		}
	}
	if($conference_Rank>=5)
	{
		for ($i=4; $i<=15 ; $i++) 
		{    
			
			
			
			$diff=(int)$win-(int)$result_Win[$i];
			if($diff>=-1&&$diff<=1&&$Team_name!=$result_Team[$i])
			{
				array_push($related_Team, $result_Team[$i]);
			}


		}
	}
	if($conference_Rank>=5)
	{
		for ($i=4; $i<=15 ; $i++) 
		{
			$diff=(int)$win-(int)$result_Win[$i];
			if($diff==2||$diff==-2&&$Team_name!=$result_Team[$i])
			{
				array_push($weakrelated_Team, $result_Team[$i]);
			}


		}
	}
$i=0;

while($i<count($related_Team))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'akif';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$sql = "INSERT INTO nfc_relevnacy
       (ID,Team_Name,Relevant_Team,Relevancy_Type)
       VALUES ('$id','$Team_name','$related_Team[$i]','Strong')";


mysql_select_db('nfl_standings');
$retval = mysql_query( $sql, $conn );

if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($conn);
 $i++; 
}
$i=0;
while($i<count($weakrelated_Team))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'akif';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$sql = "INSERT INTO nfc_relevnacy
       (ID,Team_Name,Relevant_Team,Relevancy_Type)
       VALUES ('$id','$Team_name','$weakrelated_Team[$i]','Weak')";


mysql_select_db('nfl_standings');
$retval = mysql_query( $sql, $conn );

if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($conn);
 $i++; 
}
$a++;
}
?>