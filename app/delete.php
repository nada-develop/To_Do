<?php
require "../config.php";
if(!empty($_GET['task_id'])){
    //DELETE FROM tablename WHERE some coloumn=some values
 $conn->query(" DELETE FROM tasks WHERE id=".$_GET['task_id']." AND user_id = ".$_SESSION['user_id']." AND done=1");
}
header('location:../index1.php');
?>