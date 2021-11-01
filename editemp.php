<?php


include("class_pro.php");
$ob = new project();

$arr = $_SESSION['arr1'];
$eid = $_SESSION['eid'];

// print_r($arr);

if (isset($_POST['sub'])) {

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $tmp = $_FILES['img']['tmp_name'];


    if (!empty($uname) && !empty($email) && !empty($age) && !empty($city) && !empty($tmp)) {
        $fname = $_FILES['img']['name'];

        move_uploaded_file($tmp, "image/$fname");
        $msg = $ob->update($uname, $email, $age, $city, $fname,$eid);
    } else {
        $msg = "Please Fill All Fields!";
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Employee</title>
</head>

<body>
    <div class="container">
        <br>
        <br>

        <h1>Update Employee</h1>

        <form method="post" enctype="multipart/form-data">
            <?php

            if (!empty($msg)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg ?>
                </div>
            <?php
            }

            ?>

            <div class="form-group">
                <label>Uname</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $arr['uname'] ?>">
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $arr['email'] ?>">
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" value="<?php echo $arr['age'] ?>">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" value="<?php echo $arr['city'] ?>">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="img">
            </div>

            <button type="submit" name="sub" class="btn btn-primary">Update</button>
            <a href="register.php"  name="regis" class="btn btn-warning">Regis_Page</a>
        </form>



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>