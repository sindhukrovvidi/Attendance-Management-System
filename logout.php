<!DOCTYPE html>
<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: SignIn.php");
exit;
?>
	
</html>

