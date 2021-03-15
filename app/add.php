<?php
require "../config.php";
function Validate_date($date_string){
    if($time = strtotime($date_string)){
        return $time;
    }else{
        return false;
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $_SESSION[''] هذا المتغير يتاكد من نوعية الطلب هل هو post or get or delete ....
// عباره عن متغير من متغيرات PHP ال supper global ,وهو عبارة عن مصفوفه تخزن بداخلها بيانات عن الطلب
  
  
//اما للتحقق من ان الحقلين ليس فارغين 
//اما للتحقق من ان الحقلين ليس فارغين 
if((!empty($_POST['task_name'])) && (!empty($_POST['task_name']))){
    if( $due_date= Validate_date($_POST['due_date'])){
    
        //  في حالة ان الحقلين بهما قيم والتاريخ صحيح ننفذ هذا الكود
        //ادخال القيم لقاعده البيانات
        $description = $_POST['task_name'];
        $due_date = date('Y-m-d H:i:s',$due_date);
        $conn->query("INSERT INTO tasks (description, due_date, user_id)
            VALUES('".$description."','".$due_date."','".$_SESSION['user_id']."' )");
    }
    // في خالة خطا التاريخ يعرض للمستخدم رسالة خطا
    else{
        $errors['not_valid_date'] = 'يجب ان تدخل التاريخ بطريقه صحيحه ';
        $_SESSION['errors'] = $errors;
    }
}
//تنفذ في حالة اذا كان احد الحقلين فارغين او كلاهما
else{
if(empty($_POST['task_name'])){
   $errors['required_name'] = 'يجب ان تقوم بكتابة وصف للمهمه';
}
if(empty($_POST['due_date'])){
   $errors['required_date'] = 'يجب ان تقوم بتعيين اخر مهله لانجاز المهمه';
  
}
$_SESSION['errors'] = $errors;
}
header('location:../index1.php');
}






?>