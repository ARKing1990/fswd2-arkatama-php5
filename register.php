<?php

require_once("koneksi.php");

if(isset($_POST['register'])){
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    $sql = "INSERT INTO users (email, password) 
            VALUES (:email, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":password" => $password,
        ":email" => $email
    );

    $saved = $stmt->execute($params);
    if($saved) header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale-1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" href="#">
        <title>Website Husein</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>
                </li>
                </ul>
            </div>
        </nav>
        <?php if(isset($error)):?>
            <p>Salah</p>
        <?php endif; ?>
        <div class="container mt-5">
            <div class="justify-content-center">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    REGISTER
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">Submit</button><br>
                        <a href="login.php" class="badge badge-light">Login Jika Sudah Ada</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>