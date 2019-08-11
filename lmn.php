<html>
<body>
<h1>Opinion Poll Results Are</h1>

<?php
class polling
{
	
public function insert($conn,$sql)
{
  return mysqli_query($conn,$sql);
}
public function select($conn,$sql)
{
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);
  return $count;
}
}


$vote = filter_input(INPUT_POST, 'vote');
if (!empty($vote)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "poll";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}

$poll= new polling();
$sql = "INSERT INTO data (vote)
values ('$vote')";
$poll->insert($conn,$sql);


$sql="Select vote from data where vote='Charles Dickens'";
$v1=$poll->select($conn,$sql);



$sql="Select vote from data where vote='Miguel de Cervantes'";
$v2=$poll->select($conn,$sql);


$sql="Select vote from data where vote='J.R.R Tolkien'";
$v3=$poll->select($conn,$sql);



$sql="Select vote from data where vote='Antoine de Saint-Exuper'";
$v4=$poll->select($conn,$sql);

$high1= array($v1, $v2, $v3,$v4);
sort($high1);
$max=$high1[3];
$total=$v1+$v2+$v3+$v4;
echo 'Total votes till now ';
echo $total;
echo '<br>';


if($max==$v1)
{
	echo '<br><b>Vote for charles dickens are</b>';
	echo '<br>';
	echo $v1;
}
else {
	echo '<br>Vote for charles dickens are';
	echo '<br>';
	echo $v1;
}
if($max==$v2)
{
	echo '<br><b>Vote for Miguel de Cervantes are</b>';
	echo '<br>';
	echo $v2;
}
else {
	echo '<br>Vote for Miguel de Cervantes are';
	echo '<br>';
	echo $v2;
}
if($max==$v3)
{
	echo '<br><b>Vote for J.R.R Tolkien are</b>';
	echo '<br>';
	echo $v3;
}
else {
	echo '<br>Vote for J.R.R Tolkien are';
	echo '<br>';
	echo $v3;
}
if($max==$v4)
{
	echo '<br><b>Vote for Antoine de Saint-Exuper are</b>';
	echo '<br>';
	echo $v4;
}
else {
	echo '<br>Vote for Antoine de Saint-Exuper are';
	echo '<br>';
	echo $v4;
}

	
	


$conn->close();
}
else
{
	echo "<script>alert('You did not vote!');</script>";
die();
}





	

?>
</body>
</html>


