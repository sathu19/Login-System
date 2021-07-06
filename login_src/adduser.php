<!DOCTYPE html>
<h4><a href="back.php">Back</a></h4>
<form action="" method="POST">  
    Set New Username: <input type="text" name="user"><br/>  
    Set New Password: <input type="password" name="pass"><br/>   
    Confirm Password: <input type="password" name="pass2"><br/>
    
    User Type: <select name="type" id="type">
        <option value="normal">normal</option>
        <option value="admin">admin</option>
    </select>
    <br/>
    <br/>
    <input type="submit" value="Submit" name="submit" />  
    </form> 
<?php
if(isset($_POST["submit"]))
{    
    if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) 
    {
        if($_POST['pass']==$_POST['pass2'])
        {
            $user=$_POST['user'];  
            $pass=$_POST['pass'];
            $type=$_POST['type'];
            $con = mysqli_connect('localhost', 'root', '','credentials');
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $query = mysqli_query($con,"INSERT INTO login (username, password, type) VALUES ('".$user."','".$pass."','".$type."');");
            if($query==TRUE)
            {
                echo "Successfully added";
            }
            else
            {
                echo "Adding Failed: ".mysqli_error($con);
            }
        }
        else
        {
            echo "Passwords should match";
        }
    }
}
?>