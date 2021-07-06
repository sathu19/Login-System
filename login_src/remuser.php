<!DOCTYPE html>
<h4><a href="back.php">Back</a></h4>
<form action="" method="POST">  
    Username to be removed: <input type="text" name="user"><br/><br/>  
    <input type="submit" value="confirm" name="submit" />  
    </form> 
<?php
    if(isset($_POST["submit"]))
    {    
        if(!empty($_POST['user'])) 
        {
                $user=$_POST['user']; 
                $con = mysqli_connect('localhost', 'root', '','credentials');
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $query = mysqli_query($con,"DELETE FROM login where username = '".$user."'");
                if($query==TRUE)
                {
                    echo "Successfully removed";
                }
                else
                {
                    echo "Removal Failed: ".mysqli_error($con);
                }
        }
    }
?>