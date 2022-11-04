<?php

session_start();
require 'database_connection.php';
if(!isset($_SESSION['manager-info'])) {
    header("location:index.php?try=again");
}
$student_id = $_GET['id'];

$query1 = "SELECT * from student where student_id = $student_id";
$result = $db_connection->query($query1);
$Student_data = $result->fetch_assoc();

    
$query1 = "DELETE FROM student WHERE student_id = $student_id";
$photo = $Student_data['photo'];
unlink('images/'.$photo);
$result = $db_connection->query($query1);

// $Student_data = $result->fetch_assoc()

    if($result) {

        header('location: students.php');
    }
    else {
        echo "Your insertion feild!";
    }


?>