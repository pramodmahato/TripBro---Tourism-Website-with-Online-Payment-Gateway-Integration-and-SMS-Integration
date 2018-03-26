<html>
<body>
 
 
<?php
$servername = "YAHA PE SERVER NAME LIKH";
$username = "YAHA PE USERNAME LIKH";
$password = "YAHA PASSWORD";
$dbname = "DATABASE KA NAAM LIKH YHA";
$Name=$_POST['buyer_name'];
$Ph_Number=$_POST['buyer_phone'];
$Email=$_POST['buyer'];
$Transaction_ID=$_POST['payment_id'];
$Package=$_POST['purpose'];
$Status=$_POST['status'];
$Amount=$_POST['Amount'];
$mobileNo=$_POST['buyer_phone'];
$authKey = "AUTH KEY MILTA HAI JAB ACCOUNT BNAEGAGA PAYMENT GATEWAY ME. WO YAHA LIKHNA HAI";
$senderId = "TRPBRO";
$route = "4";
$message='Your '.$Package.' of Amount Rs '.$Amount.' has been booked successfully. Our Customer Care Executive will get in touch with you shortly.';
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNo,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'country'=>'0'
);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection : " . mysqli_connect_error());
}

$sql = "INSERT INTO bookingdetails (Transaction_ID,Name,Ph_Number,Email,Amount,Package,Status) VALUES ('$Transaction_ID','$Name','$Ph_Number','$Email','$Amount','$Package','$Status')";

if (mysqli_query($conn, $sql)) {
   
   $url="https://control.YAHA PE MESSAGE GATEWAY ID LIKH FAUJI.com/api/sendhttp.php";
$ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);

 if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}
curl_close($ch);

   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>