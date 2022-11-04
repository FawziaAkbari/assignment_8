<?php
session_start();
require_once 'database_connection.php';

if(!isset($_SESSION['manager-info'])) {
    header("location:index.php?try=again");
}

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    
    $photo_tmp = $_FILES["photo"]["tmp_name"];
    $photo_name = $_FILES["photo"]["name"];
    $photo_type = $_FILES["photo"]["type"];
    $photo_type = $_FILES["photo"]["size"];
    move_uploaded_file($photo_tmp,"images/".$photo_name);

    $query = "INSERT INTO student (name, last_name, gender, phone, address, email, photo) VALUES ('$name', '$last_name', '$gender', '$phone', '$address','$email','$photo_name')";
    $result = $db_connection->query($query);
    if($result) {
        header('location: students.php');
    }
    else {
        echo "Your insertion feild!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- the php comment for check the login permission -->
    <div class="container">
        <?php
            if(isset($_GET['wel'])){
                echo "<h5 class='title'>Welcome ". $_SESSION['manager-info']['user_name']."</h5>";
            }
            else {

            }
            
            if(isset($_POST['submit'])) {
            }     
            ?>
        <h1>Add Student</h1>
        
        <!-- the html form for add student by manager -->
       <form action="" method="POST" enctype="multipart/form-data">
           

            <div class="input-el">
                <label class="lable" for="name">Name</label>
                <input type="text" class="input-feild" name="name" id="name" placeholder="Your Name" required>
            </div>
            <div class="input-el">
                <label class="lable" for="last_name">Last Name</label>
                <input type="text" class="input-feild" name="last_name" id="last_name" placeholder="Last Name" required>
            </div>
            <div class="input-el">
                <label class="lable" for="phone">Phone</label>
                <input type="number" min="0"  class="input-feild" name="phone" id="phone" placeholder="Phone" required>
            </div>
            <div class="input-el">
                <label class="lable" for="address">Address</label>
                <input type="text" class="input-feild" name="address" id="address" placeholder="Address" required>
            </div>
            <div class="input-el">
                <label class="lable" for="email">Email</label>
                <input type="email" class="input-feild" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-el">
                <label class="lable" for="photo">Photo</label>
                <input type="file"class="input-feild" name="photo" id="photo" placeholder="photo" required>
            </div> 
            <div class="input-el">
            <p class="lable">Gender</p>
                <div>
                    <input type="radio" class="input-radio" id="female" value="Female" name="gender" required>
                    <label class="lable" for="female">Female</label>
                </div>
                <div>
                    <input type="radio" class="input-radio" id="male" value="Male" name="gender" required>
                    <label class="lable" for="male">Male</label>
                </div>
            </div>
            <div class="input-el">
                <div>
                    <button class="info button btn-submit input-feild" name="submit">Add Student</button>
                    <button class="info button btn-submit input-feild">Reset</button>
                </div>
            </div>

        </form>
            <!-- the button for logout the manager -->
        <form method="POST" action="session_destroy.php">
            <input type="submit" class="btn-logout" value="Log me out" name="submit">
        </form>
            <!-- php class object -->
    </div>
    <!-- end form -->

   
</body>
</html>
