<?php
include 'connect.inc.php';
 
$conn = OpenCon();
 
echo "Connected Successfully";
 
//CloseCon($conn);
 
 
 ?>
 
 <html>
 
 <body>  
  <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1>
  
  </center>  
   

   <h3>Login Form</h3>  
<form action="" method="POST">  
Username: <input type="text" name="user"><br />  <br>
Password: <input type="password" name="pass"><br />   
<input type="submit" value="Login" name="submit" />  
</form>  
</body>
</html>
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
   // $con=mysql_connect('localhost','root','') or die(mysql_error());  
    //mysql_select_db('user_registration') or die("cannot select DB");  
  
$query="SELECT * FROM `users` WHERE `username`=`$user` AND `password`=`$pass`";
$query_run=mysqli_query($conn,$query);
   // $numrows=mysqli_num_rows(true);  
	//if (!$query_run || mysqli_num_rows($query_run) == 0)
		echo $query_run;
	$numrows=0;
	if ($query_run != false) {
  $numrows = mysqli_num_rows($query_run);
  if ($numrows == 0) {
    echo 'No results found.';
  }
}

    if($numrows!=0)  
		  
    {  
    while($row=mysqli_fetch_assoc($query_run))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];
echo $dbusername;	
	
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: member.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
   
 
 
 
 
