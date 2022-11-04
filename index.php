<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <h1>ADMIN LOGIN</h1>
        <form action="login.php" method="POST" enctype="multipart/form-data">
            <div class="admin">
                <input type="text" class="input-feild " id="user_name" name="user_name" placeholder="User name" required>
                <input type="password" class="input-feild" id="password" name="password" placeholder="Password" required>
                <?php
                    if(isset($_GET['try'])) {
                        echo "<h5>Incorrect User name or password!</h5>";
                    }
                ?> 
                <button type="submit" class="btn-submit input-feild" name="submit">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>