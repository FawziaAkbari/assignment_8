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

// edit students code
if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    if($_FILES["photo"]["name"] !== "") {
        $photo = $Student_data['photo'];
        unlink('images/'.$photo);
        $photo_tmp = $_FILES["photo"]["tmp_name"];
        $photo_name = $_FILES["photo"]["name"];
        $photo_type = $_FILES["photo"]["type"];
        $photo_type = $_FILES["photo"]["size"];
        move_uploaded_file($photo_tmp,"images/".$photo_name);
        
    }else {
        $photo_name = $Student_data['photo'];
    }
    $query2 = "UPDATE student SET name = '$name', last_name = '$last_name', gender = '$gender', phone = '$phone', address = '$address', email= '$email', photo = '$photo_name' WHERE student_id = $student_id";
    $result = $db_connection->query($query2);
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
    <div class="container container-edit">
        <h1>Edit Student</h1>
        <div class="image">
            <img src="images/<?php echo $Student_data['photo'];?>" width="100px" alt="">
        </div>
        <!-- the html form for add student by manager -->
       <form action="" method="POST" enctype="multipart/form-data">
           

            <div class="input-el">
                <label class="lable" for="name">Name Fawzia</label>
                <input type="text" class="input-feild" name="name" id="name" placeholder="Your Name" value="<?php echo $Student_data['name']; ?>" required>
            </div>
            <div class="input-el">
                <label class="lable" for="last_name">Last Name</label>
                <input type="text" class="input-feild" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $Student_data['last_name'] ?>" required>
            </div>
            <div class="input-el">
                <label class="lable" for="phone">Phone</label>
                <input type="number" min="0"  class="input-feild" name="phone" id="phone" placeholder="Phone" value="<?php echo $Student_data['phone'] ?>" required>
            </div>
            <div class="input-el">
                <label class="lable" for="address">Address</label>
                <input type="text" class="input-feild" name="address" id="address" placeholder="Address" value="<?php echo $Student_data['address'] ?>" required>
            </div>
            <div class="input-el">
                <label class="lable" for="email">Email</label>
                <input type="email" class="input-feild" name="email" id="email" placeholder="Email" value="<?php echo $Student_data['email'] ?>" required>
            </div>
            <div class="input-el">
                <label class="lable" for="photo">Photo</label>
                <input type="file"class="input-feild" name="photo" id="photo" placeholder="photo" value="<?php echo $Student_data['photo'] ?>" >
            </div> 
            <div class="input-el">
            <p class="lable">Gender</p>
                <div>
                    <input type="radio" class="input-radio" id="female" value="Female" name="gender" value="<?php echo $Student_data['gender'] ?>" required>
                    <label class="lable" for="female">Female</label>
                </div>
                <div>
                    <input type="radio" class="input-radio" id="male" value="Male" name="gender" value="<?php echo $Student_data['gender'] ?>" required checked>
                    <label class="lable" for="male">Male</label>
                </div>
            </div>
            <div class="input-el">
                <div>
                    <button class="info button btn-submit input-feild" name="submit">Save</button>
                    <button class="info button btn-submit input-feild">Reset</button>
                </div>
            </div>

        </form>
    </div>
    <!-- end form -->
</body>
</html>