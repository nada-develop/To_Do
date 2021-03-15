
<?php
session_start();
$_SESSION['user_id'] = 1;
// <!-- $conn = new mysqli($server_name,$user_name,$password,$dbname); -->
$conn = new mysqli("localhost","root","","tasks_base");
mysqli_set_charset($conn,"utf8");
if($conn->connect_error){
    echo "failed connection  " . $conn->connect_error;
}else{
    echo "connection established";

}
?>