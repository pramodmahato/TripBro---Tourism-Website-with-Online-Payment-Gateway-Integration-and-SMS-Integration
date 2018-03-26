<html>
<body>
 
 
<?php
$servername = "localhost";
$username = "TripBro";
$password = "Inspiron@123";
$dbname = "TripBro";
$Name=$_POST['Name'];
$Phnumber=$_POST['Phnumber'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection : " . mysqli_connect_error());
}

$sql = "INSERT INTO UserDetails (Name, Phnumber, Email, Password)
VALUES ('$Name', '$Phnumber','$Email','$Password')";

if (mysqli_query($conn, $sql)) {
    echo '<script>window.location.href = "SuccessLogin.html";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>