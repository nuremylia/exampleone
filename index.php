<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LAb 3A</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "webtester";
$password = "webtester123";
$dbname = "webtesting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $sql = "SELECT student_grade WHERE nric = '".$_GET["nric"]."'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {

	  while($row = $result->fetch_assoc()) {
		  echo "NRIC: <input type='text' name='nric' value='".$row["nric"]."'><br><br>";
		  echo "Name: <input type='text' name='name' value='".$row["name"]."'><br><br>";
		  
		  ?>
          
          Grade:
          <select>
              <option value="1" >1</option>
              <option value="2" >2</option>
              <option value="3" >3</option>
              <option value="4" >4</option>
          </select><br><br>
		  
		  <?php

	  }
  } else {
	  echo "NRIC: <input type='text' name='nric'>";
	  echo " *NRIC not found.<br><br>";
  }
  $conn->close();

} else {
    echo 'NRIC: <input type="text" name="nric"><br><br>';
}
//This is a comment
?>

<input type="submit" value="Submit">
</form>

</body>
</html>