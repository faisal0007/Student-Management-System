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
<table align="center">
	<form action="updatestudent.php" method="post">
		<tr>
			<th>Enter Standard </th> 
			<td> <input type="number" name="standard" placeholder="Enter Standard" required="required" /> 
			</td>
		
			<th>Enter Student Name </th> 
			<td> <input type="text" name="stuname" placeholder="Enter StudentName" required="required" />
			</td>
			
			<td colspan="2"> 
			<input type="submit" name="submit" value="Search" /> </td>
			
		</tr>
	</form>
</table>


<table align="center" width="80%" border="1" style ="margin-top:10px;">
	<tr style="background-color:#000; color:#fff; ">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Roll No</th>
		<th>Edit</th> 		
	</tr>


<?php
	if(isset($_POST['submit']))
	{
		include("../dbcon.php");
		
		$standard= $_POST['standard'];
		$name= $_POST['stuname'];

		
		//SELECT * FROM `student` WHERE standard ="9"AND name LIKE'%a%'
		$sql="SELECT * FROM `student` WHERE standard='$standard' AND name LIKE '%$name%'";
		$run=mysqli_query($con, $sql);
		
		
		if(mysqli_num_rows($run)<1)
		{
			echo "<tr> <td colspan='5'> No Record Found!! </td> </tr>" ;
		}
		else
		{
			$count=0;
			
			while($data= mysqli_fetch_assoc($run))
			{
				$count++;
				?>
				
				<tr align="center">
					<td><?php echo $count; ?></td>
					<!––  retrieving image from selected folder dataimg ––>
					<td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px" /> </td>
					<td> <?php echo $data['name']; ?> </td>
					<td> <?php echo $data['rollno']; ?></td>
					<td> <a href="updateform.php?sid= <?php echo $data['id']; ?> "> Edit </a> </td> 		
				</tr>
				<?php
			}
		}
		
	}
?>
	
</table>

