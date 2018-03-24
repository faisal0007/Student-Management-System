
<?php
session_start(); 
if(isset($_SESSION['uid']))
 {
         header('location: admin/admindash.php');
 }
#it should be in the start because so whenever the user open another with same it should not ask for login
?>
<!DOCTYPE HTML>

<html lang="en_US">
<head>
	<meta charset="UTF-8">
	<title> Student Management System </title>
</head>
<body>
    <h1 align ="center" >
        Admin Login
    </h1>

    <form action= "login.php" method="post" >
        <table align="center">
            <tr>
                <td>Username</td><td> <input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password</td><td> <input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td colsapn="2" align = "center"><input type="Submit" name="login" value="Login"></td>
            </tr>
            
            
        </table>
    </form>  
</body>
</html>
<?php
include("dbcon.php");

if(isset($_POST['login']))
{
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    
 //   $qry= "SELECT id,username,password FROM admin WHERE username='$username' AND password='$password'";
      $qry= "SELECT * FROM admin where username='$username' And password='$password'";
    
    $run=mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
       
    if($row < 1)
    {
        ?>
        <script> 
            alert('Username OR password not match!!');
            window.open('login.php' , '_self');
        </script>      
        <?php
    }
    else
    {
        $data= mysqli_fetch_assoc($run);
        $id = $data['id'];
        echo "id".$id;
        
        #session_start(); it should be in the start
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }
    
}   

?>


