
    <!doctype html>  
    <html>  
    <head>  
    <title>Login</title>  
    </head>  
    <body>   
    <h3>Login</h3>
    
    <div class = "container">  
    <form action="" method="POST">  
    Username: <input type="text" name="user"><br/>  
    Password: <input type="password" name="pass"><br/><br/>   
    <input type="submit" value="Login" name="submit" />  
    </form>
    </div>  
    <?php  
    if(isset($_POST["submit"]))
    {    
        if(!empty($_POST['user']) && !empty($_POST['pass'])) 
        {  
            $user=$_POST['user'];  
            $pass=$_POST['pass'];    
            $con = mysqli_connect('localhost', 'root', '','credentials');
            $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows!=0)  
            {  
                while($row=mysqli_fetch_assoc($query))  
                {  
                $dbusername=$row['username'];  
                $dbpassword=$row['password'];  
                $dbtype=$row['type'];
                }  
            
                if($user == $dbusername && $pass == $dbpassword &&$dbtype !='admin')  
                {  
                session_start();  
                $_SESSION['sess_user']=$user;  
            
                header("Location: page.php");  
                }  
                
                elseif($user == $dbusername && $pass == $dbpassword)  
                {  
                session_start();  
                $_SESSION['sess_user']=$user;  
              
                header("Location: adminpage.php");  
                } 
            
                else 
                {  
                echo "Invalid username or password!";  
                }  
            }
            else 
            {  
                echo "All fields are required!";  
            }  
         }  
    }
    ?>  
    </body>  
    </html>   
