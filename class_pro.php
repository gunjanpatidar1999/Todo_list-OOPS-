<?php 
session_start();

class project
{
    public $conn;
    public $msg;

    function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","todo_database");
    }

    function register($uname,$email,$age,$city,$fname)
    {
        if(mysqli_query($this->conn,"insert into employee_table(uname,email,age,city,image) values('$uname','$email','$age','$city','$fname')"))
        {
            $msg = "Registered Successfully";
            return $msg;
        }
        else
        {
            $msg = "Not Registered";
            return $msg;
        }
    }

    function delete($id)
    {

        if(mysqli_query($this->conn,"delete from employee_table where id='$id'"))
        {
            $msg = "Data Deleted";
            return $msg;
        }
        else
        {
            $msg = "Data Not Deleted";
            return $msg;
        }
        
    }

    function edit($eid)
          {
            $sel = mysqli_query($this->conn,"select * from employee_table where id='$eid'");
            $arr = mysqli_fetch_assoc($sel);

           $_SESSION['arr1'] = $arr;
           $_SESSION['eid'] = $eid;


            header("location:editemp.php");
     
          }

    function update($uname,$email,$age,$city,$fname,$eid)
    {
        if(mysqli_query($this->conn,"update employee_table set uname='$uname',email='$email',age='$age',city='$city',image='$fname' where id='$eid'"))
        {
            $msg = "Update Successfully!";
            return $msg;
            header("location:register.php");

        }
        else
        {
            $msg = "Not Update";
            return $msg;
        }

    }      

}

?>


