<!DOCTYPE html>
<h4><a href="back.php">Back</a></h4>
<form action="" method="POST">  
    Username: <input type="text" name="user"><br/>  
    User Type: <select name="type" id="type">
        <option value="admin">admin</option>
        <option value="normal">normal</option>
    </select>
    <br/>
    <br/>
    <input type="submit" value="Submit" name="submit" />  
    </form> 
<?php
    if(isset($_POST["submit"]))
    {    
        if(!empty($_POST['user'])) 
        {
                $user=$_POST['user']; 
                $type=$_POST['type'];
                $con = mysqli_connect('localhost', 'root', '','credentials');
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $count = mysqli_query($con,"SELECT COUNT(*) as total FROM login where type='admin'");
                $row = mysqli_fetch_assoc($count);
                if($row['total']==1&&$type=="normal")
                {
                    echo "Can't change the only admin";
                    exit();
                }
                $query = mysqli_query($con,"UPDATE login set type='".$type."'where username = '".$user."'");
                if($query==TRUE)
                {
                    echo "Successfully changed";
                }
                else
                {
                    echo "Change Failed: ".mysqli_error($con);
                }
        }
    }
?>