<?php
 $hostname = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'fitness';

 //Opening a connection
 $conn = new mysqli($hostname, $username, $password, $database);
 if ($conn->connect_error) {
   die($conn->connect_error);
 }

 $fName = $_POST['fName'];
 $lName = $_POST['lName'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];

 $minfo = '';
 if (isset($_POST['grpfit'])) $minfo = '1'; else $minfo = '0';
 if (isset($_POST['prtrain'])) $minfo = $minfo.'1'; else $minfo = $minfo.'0';
 if (isset($_POST['nutr']))  $minfo = $minfo.'1'; else $minfo = $minfo.'0';

 $reference = $_POST['reference'];
 $questions = $_POST['questions'];

 $query = "insert into customer(fName, lName, email, phone, minfo, reference, questions) values('$fName', '$lName', '$email', '$phone', '$minfo', '$reference', '$questions')";

 $results = $conn->query($query);
 if (!$results) {
   echo "Insert Failed";
 } else {
   echo "Insert Successfully";
}

$query = "select * from customer";
$results = $conn->query($query);
if (!$results) {
  echo "Select Error";
}

while ($row = mysqli_fetch_array($results)) {
  echo $row['id'].''.$row['fName'].''.$row['lName'].''.$row['email'].''.$row['phone'].'<br/>';
}

?>
