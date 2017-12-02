<?php session_start();
if(empty($_SESSION['ID'])):
header('Location:../index.php');
endif;
include('../database/connection.php');

	$id = $_SESSION['ID'];
	$username =$_POST['username'];
	$password =$_POST['password'];
	$name = $_POST['name'];
	$old =$_POST['passwordold'];
	$new =$_POST['new'];
      
	
	if($new<>$password)
	{
		echo "<script type='text/javascript'>alert('Password mismatch!');</script>";
		echo "<script>document.location='../pages/account.php'</script>";  
	}
	else
	{	
		$query=mysqli_query($conn,"select password from user where ID='$id'")or die(mysqli_error());
			$row=mysqli_fetch_array($query);
	
				$passold=$row['password'];
				
				if ($passold==$old)
				{
					if ($password<>"")
					{
						mysqli_query($conn,"update user set username='$username',password='$password' where ID='$id'")or die(mysqli_error($conn));
						echo "<script type='text/javascript'>alert('Successfully updated login details!');</script>";
						echo "<script>document.location='../pages/account.php'</script>";  
					}
					if ($password==$password)
					{
						mysqli_query($conn,"update user set username='$username' where ID='$id'")or die(mysqli_error($conn));
						echo "<script type='text/javascript'>alert('Successfully updated account!');</script>";
						echo "<script>document.location='../pages/account.php'</script>";
					}
				}
				else{
		
					echo "<script type='text/javascript'>alert('Password is incorrect!');</script>";
					echo "<script>document.location='../pages/account.php'</script>";  
				}
		}
?>