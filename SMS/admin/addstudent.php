<?php
session_start();
     if(isset($_SESSION['uid']))
     {
         
     }
     else
     { 
         #if session is not set then send it back to login page
         header('location: ../login.php');
     }

?>

<?php
    include('header.php');
	include('titlehead.php');
	
?>
<body>
<html>

<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width:70%; margin-top:40px;">
		<tr>
			<th> Roll no </th>
			<td><input type="text" name="rollno" placeholder="Enter Roll no" > </td>
			
		</tr>
		<tr>
			<th> Full name </th>
			<td> <input type="text" name="name" placeholder="Enter Full name" >  </td>
		</tr>
		<tr>
			<th> City </th>
			<td> <input type="text" name="city" placeholder="Enter city" > </td>
		</tr>
		<tr>
			<th> Parents Contact no </th>
			<td> <input type="text" name="pcon" placeholder="Enter the contact no of parents"> </td>
		</tr>
		<tr>
			<th> Standard </th>
			<td> <input type="number" name="std" placeholder="Enter Standard" > </td>
		</tr>
		<tr>
			<th> Image </th>
			<td><input type="file" name="simg" > </td>
		</tr>
			<td colspan="2" align="center"> <input type="submit" name="submit" value="Submit"> </td>	
	</table>
</form>

</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
	include('../dbcon.php');
	$rolno= $_POST['rollno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$pcon=$_POST['pcon'];
	$std=$_POST['std']; 
	$imagename=$_FILES['simg']['name'];
	$tempname=$_FILES['simg']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimg/$imagename");
	
	
	$qry ="INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES (NULL, '$rolno','$name','$city','$pcon','$std', '$imagename');";
	
	//working query
	//$qry ="INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standard`) VALUES (NULL, '$rolno','$name','$city','$pcon','$std');";	
	//$qry= "INSERT INTO `student` (`id`, `rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ( '12', '107', 'Zulfiqar', 'Quetta', '0303', '58', '');";
	
	
	$run=mysqli_query($con,$qry);

	if($run== true)
	{
	?>
	<script>
	alert('Data Inserted Successsfully');
	</script>
	<?php
	}
	else
		echo"Roll no. is same, Kindly insert data again with different Roll no. "; 
}
?>
