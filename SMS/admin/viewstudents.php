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

<table align="center" width="80%" border="1" style ="margin-top:10px;">
	<tr style="background-color:#000; color:#fff; ">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Roll No</th>
		<th>Edit</th> 		
	</tr>

<?php
		include("../dbcon.php");
		
		$sql="SELECT * FROM `student`;";
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
?>
</table>

