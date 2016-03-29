<?php



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

$sql = "SELECT * FROM nl_relevancy";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    
$sql = "TRUNCATE TABLE al_relevancy";
$result = $conn->query($sql);
      


 
}
else {
    echo "0 results";
}
$conn->close();



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

$sql = "SELECT * FROM national_league ORDER BY ID";
$result = $conn->query($sql);
$result_Team= array();
$result_id= array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$result_ID[]=$row["ID"];
      	$result_Team[]=$row["Team_Name"];
        $result_rank[]=$row["Rank"];
        $result_Division[]=$row["Division"];
        $result_Win[]=$row["Win"];
        $result_Lose[]=$row["Lose"];
        
        

      


  }
}
else {
    echo "0 results";
}
$conn->close();

$a=0;

while ($a<count($result_Team)) {
	

$Division_Rank=0;
$conference_Rank=0;
$Division;
$pct=0;
$Team_name=$result_Team[$a];
$related_Team= array();
$weakrelated_Team= array();






for ($i=0; $i <count($result_Team) ; $i++) 
{

 

if($Team_name==$result_Team[$i])
{


	$Division_Rank=$result_rank[$i];
	$conference_Rank=$i+1;
	$Division=$result_Division[$i];
	$win=$result_Win[$i];
	$Lose=$result_Lose[$i];
	$Tie=$result_Tie[$i];
	$id=$result_ID[$i];



}
	
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

$sql = "SELECT * FROM national_league WHERE Division='$Division'ORDER BY Rank";
$result = $conn->query($sql);
$Division_Team= array();
$Division_id= array();
$Division_Win= array();
$Division_Lose= array();
$Division_rank= array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $Division_Team[]=$row["Team_Name"];
        $Division_rank[]=$row["Rank"];
        $Division_Win[]=$row["Win"];
        $Division_Lose[]=$row["Lose"];
        
        

      


  }
}
else {
    echo "0 results";
}
print_r($Division_Team);
$conn->close();


	if($Division_Rank==1)
	{
		$diff=$win-$Division_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[3]);

		}
		$diff=$win-$Division_Win[4];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[4]);

		}
		

	}
	if($Division_Rank==2)
	{
		$diff=$win-$Division_Win[0];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[3]);

		}
		$diff=$win-$Division_Win[4];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[4]);

		}

	}
	if($Division_Rank==3)
	{
		$diff=$win-$Division_Win[0];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[3]);

	
		}
		$diff=$win-$Division_Win[4];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[4]);

	
		}
	
	
	}
	

	if($Division_Rank==4)
	{
		$diff=$win-$Division_Win[0];
		if($diff>=-1 && $diff<=1)
		{echo "1";
		array_push($related_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff>=-1 && $diff<=1)
		{echo $Division_Team[1];
		array_push($related_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[4];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[4]);

		}
	}
	if($Division_Rank==5)
	{
		$diff=$win-$Division_Win[0];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[3];
		if($diff>=-1 && $diff<=1)
		{
		array_push($related_Team, $Division_Team[3]);

		}
	}
	if($Division_Rank==1)
	{
		$diff=$win-$Division_Win[1];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[3];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[3]);

		}
		$diff=$win-$Division_Win[4];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[4]);

		}
		

	}
	if($Division_Rank==2)
	{
		$diff=$win-$Division_Win[0];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[2];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[3];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[3]);

		}
		$diff=$win-$Division_Win[4];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[4]);

		}


	}
	if($Division_Rank==3)
	{
		$diff=$win-$Division_Win[0];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[3];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[3]);

		}
		$diff=$win-$Division_Win[4];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[4]);

		}


	}
	if($Division_Rank==4)
	{
		$diff=$win-$Division_Win[0];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[4];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[4]);

		}
	}
	if($Division_Rank==5)
	{
		$diff=$win-$Division_Win[0];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[0]);

		}
		$diff=$win-$Division_Win[1];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[1]);

		}
		$diff=$win-$Division_Win[2];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[2]);

		}
		$diff=$win-$Division_Win[4];
		if($diff==2||$diff==-2)
		{
		array_push($weakrelated_Team, $Division_Team[3]);

		}
	}

    echo"teams name";
	print_r($weakrelated_Team);
	print_r($related_Team);
	echo $Team_name;
	echo" ends here";
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


$sql = "INSERT INTO nl_relevancy
       (ID,Team_Name,Relevant_Team,Relevancy_type)
       VALUES ('$id','$Team_name','$related_Team[$i]','Strong')";


mysql_select_db('mlb');
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


$sql = "INSERT INTO nl_relevancy
       (ID,Team_Name,Relevant_Team,Relevancy_type)
       VALUES ('$id','$Team_name','$weakrelated_Team[$i]','Weak')";


mysql_select_db('mlb');
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