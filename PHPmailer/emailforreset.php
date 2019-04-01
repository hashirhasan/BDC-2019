<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<input type="text" name="email" placeholder="ENTER YOUR EMAIL HERE"></input>
	<input type="submit" name="reset" value="RESET"></input>
</form>

<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['reset'])))
{
$_SESSION['email']=$_POST['email'];
	header("Location:sendmail.php");
}
	?>
</body>
</html>