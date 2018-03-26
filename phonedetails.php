<html>
<body>
 
 
<?php
$servername = "localhost";
$username = "TripBro";
$password = "Inspiron@123";
$dbname = "TripBro";
$UID=$_POST['UID'];
$Phone=$_POST['Phone'];
$Message=$_POST['Message'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection : " . mysqli_connect_error());
}

$sql = "INSERT INTO phonedetails (UID, Phone, Message)
VALUES ('$UID', '$Phone','$Message')";

if (mysqli_query($conn, $sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>