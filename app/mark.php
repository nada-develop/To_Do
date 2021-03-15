<?php
require "../config.php";
if(!empty($_GET['task_id'])){
    // UPDATE table_name SET coulmn1=value,coulmn2=value,.. WHERE condition;
 $conn->query(" UPDATE tasks SET done=1 WHERE id=".$_GET['task_id']." AND user_id = ".$_SESSION['user_id']."");
}
header('location:../index1.php');
?>