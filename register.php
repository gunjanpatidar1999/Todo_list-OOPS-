<?php

include("class_pro.php");
$ob = new project();

if (isset($_POST['sub'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $tmp = $_FILES['img']['tmp_name'];


    if (!empty($uname) && !empty($email) && !empty($age) && !empty($city) && !empty($tmp)) {
        $fname = $_FILES['img']['name'];

        move_uploaded_file($tmp, "image/$fname");
        $msg = $ob->register($uname, $email, $age, $city, $fname);
    } else {
        $msg = "Please Fill All Fields!";
    }
}

if (!empty($_GET['del'])) {
    $id = $_GET['del'];

    $msg = $ob->delete($id);
}


if (!empty($_GET['edit'])) {
    $eid = $_GET['edit'];

    $msg = $ob->edit($eid);
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

    <title>Registeration</title>
</head>

<body>
    <div class="container">
        <br>
        <br>

        <h1>Add Employee</h1>

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
                <input type="text" class="form-control" name="uname" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" placeholder="Enter Age">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="Enter City">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="img">
            </div>

            <button type="submit" name="sub" class="btn btn-info btn-lg">Submit</button>
        </form>


        <br>
        <br>


        <table class="table">

            <tr>
                <th>S.no</th>
                <th>Uname</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>Image</th>
                <th>Action</th>

            </tr>

            <?php

            $sel = mysqli_query($ob->conn, "select * from employee_table");


            if (mysqli_num_rows($sel) > 0) {
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) {
            ?>

                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $arr['uname'] ?></td>
                        <td><?php echo $arr['email'] ?></td>
                        <td><?php echo $arr['age'] ?></td>
                        <td><?php echo $arr['city'] ?></td>
                        <td><img src="image/<?php echo $arr['image'] ?>" height="50px" width="50px" alt="image"></td>

                        <td>
                            <a href="?edit=<?php echo $arr['id']; ?>" class="btn btn-info">Edit</a>

                            <a href="?del=<?php echo $arr['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>


            <?php
                    $sn++;
                }
            } else {
                $msg = "Database Error!";
            }


            ?>

        </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>