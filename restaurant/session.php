<?php
	include (../'connect.php');
	session_start();
	if (!isset($_SESSION['user_id']))
	{
		?>
        <script>
			alert("You have not login yet");
			window.location.href = "login.php";
		</script>
        <?php
	}
?>