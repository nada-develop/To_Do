<?php
require 'config.php';
$user_id = $_SESSION['user_id'];
 $result = $conn->query("SELECT id, description, done, due_date FROM tasks WHERE user_id = $user_id");
//  var_dump($result);

 $tasks = $result->num_rows > 0 ? $result : [];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>المساعد الشخصي للمهام</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
             <h1 class="header"> مهماتي</h1>
             <?php if(empty($tasks)):?>
             <p>لم تقم باضافة اية مهمه لعرضها</p>
             <?php else:?>
             <ul class="tasks">
             <?php foreach($tasks as $task):?>
                 <li>
                     <span class="task <?php $task['done'] ? done : ''?>"> <?php echo $task['description'];?></span>
                     <?php if($task['done']):?>
                        <a class="done-button" href="app/delete.php?task_id=<?php echo $task['id'];?>">حذف المهمه</a>;
                      <?php else:?>
                     <a class="done-button" href="app/mark.php?task_id=<?php echo $task['id'];?>">تم الانجاز</a>
                      <?php endif;?>
                     <p class="date"> اخر تاريخ لانجاز المهمه :<?php echo $task['due_date'];?></p>
                 </li>
                 <?php endforeach;?>
                 <!-- طريقه اخرى وهي تحويل المصفوفه$tasksالى object, وذلك عن طريق الدالة fetch_object() -->

              </ul>
             <?php endif;?>
             <?php
             if(isset($_SESSION['errors'])){
                 foreach($_SESSION['errors'] as $error) {
                     echo "<p class=\"error\">$error</p>";
                 }
                 $_SESSION['errors'] = [];
                }
             ?>
            <form action="app/add.php" method="POST">1
                <input type="text" placeholder="ادخل وصف مهمه جديده من هنا" class="input" name="task_name">
                <input type="text" placeholder="ادخل اخر تاريخ لانجاز المهمه من هنا" class="input" name="due_date">
                <input type="submit" value="اضف" class="submit">
            </form>
            </div>
    </body>
</html>