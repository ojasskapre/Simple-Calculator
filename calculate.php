<?php 
	session_start(); 
	if(isset($_POST['calculate'])){
		$num1 = $_POST['num1'];
		$num2 = $_POST['num2'];
		$operation = $_POST['operation'];
		$_SESSION['num1'] = $num1;
		$_SESSION['num2'] = $num2;
		$_SESSION['operation'] = $operation;
		$_SESSION['last_activity'] = time();
		echo "<h3>",$_SESSION['num1'],"</h3>";
		echo "<h3>",$_SESSION['num2'],"</h3>";
		echo "<h3>",$_SESSION['operation'],"</h3>";
		echo "<h3>",$_SESSION['last_activity'],"</h3>";
	}
	if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'])>30){
		echo "<h1>Session Timeout</h1>";
	}else{
		if ($_SESSION['operation'] == '+') {
			$_SESSION['result'] = $_SESSION['num1'] + $_SESSION['num2'];
		}elseif ($_SESSION['operation'] == '-') {
			$_SESSION['result'] = $_SESSION['num1'] - $_SESSION['num2'];
		}elseif ($_SESSION['operation'] == '*') {
			$_SESSION['result'] = $_SESSION['num1'] * $_SESSION['num2'];
		}elseif ($_SESSION['operation'] == '/') {
			$_SESSION['result'] = $_SESSION['num1'] / $_SESSION['num2'];
		}
		echo "<h1>Session On</h1>";
		if (isset($_SESSION['result'])) {
			header('Location: ./index.php');
		}
	}
?>

<?php  
	if (isset($_POST['restart'])) {
		session_unset();
		header('Location: ./index.php');
	}
?>