<?php
    session_start();
    require_once 'database_connection.php';

    if(isset($_POST["submit"])) {
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];  
            $query = "SELECT * FROM manager WHERE user_name = '$user_name' AND password = '$password'"; 
            $result = $db_connection->query($query);
            $manager = $result->fetch_assoc();
        
                if($manager){
                    $manager_info = [
                        'user_name' => $user_name,      
                        'password' => $password,
                    ];

                    $_SESSION['manager-info'] = $manager_info ;
                    $_SESSION['authentication'] = true;
                    header('location:add_student.php?wel=welcome');
                }
                else {
                    header('location:index.php?try=again');
                }
        }    
?>