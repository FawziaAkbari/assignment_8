<?php
    session_start();
    require_once 'database_connection.php';
    if(!isset($_SESSION['manager-info'])) {
        header("location:index.php?try=again");
    }
    $query = "select * from student";
    $result = $db_connection->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    
    <table border="1">
        <tr>
            <th>Student_ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>address</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php foreach($result as $show) {?>
                <tr>
                    <td><?php echo $show['student_id'] ?></td>
                    <td><?php echo $show['name'] ?></td>
                    <td><?php echo $show['last_name'] ?></td>
                    <td><?php echo $show['gender'] ?></td>
                    <td><?php echo $show['phone'] ?></td>
                    <td><?php echo $show['address'] ?></td>
                    <td><?php echo $show['email'] ?></td>
                    <td><img src="images/<?php echo $show['photo'] ?>" width="50px" alt="img"> </td>
                    <td><a href="edit_student.php?id=<?php echo $show['student_id'] ?>" class="btn">Edit</a></td>
                    <td><a href="delete_student.php?id=<?php echo $show['student_id'] ?>" class="btn">Delete</a></td>
                  
                </tr>
            <?php } ?>
    </table>   
</body>
</html>