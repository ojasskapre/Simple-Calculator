<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="index.js"></script>
</head>
<body>
	<?php session_start();?>
	<?php 
		if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'])>30){
	?>
	<div class="container">
		<h3>Session Timeout</h3>
		<form action="./calculate.php" method="post">
			<input type="submit" name="restart" class="btn btn-primary" value="Restart">
		</form>
	</div>
	<?php
	}else{
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form method="post" action="./calculate.php">
					<span>Num1:</span>
					<input type="number" class="form-control" name="num1" id="num1" required>
					<span>Num2:</span>
					<input type="number" class="form-control" name="num2" id="num2" required>
					<br>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-check-inline">
    							<input type="radio" class="form-check-input" value="+" name="operation" required>+
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-check-inline">
    							<input type="radio" class="form-check-input" value="-" name="operation" required>-
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-check-inline">
    							<input type="radio" class="form-check-input" value="*" name="operation" required>*
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-check-inline">
    							<input type="radio" class="form-check-input" value="/" name="operation" required>/
							</div>
						</div>
					</div>
					<input type="submit" name="calculate" class="btn btn-primary form-control" value="Calculate">
				</form>
				<br>
				<button class="btn btn-danger" onclick="document.getElementById('num1').value = '';document.getElementById('num2').value = '';document.getElementById('result').style.display = 'none';">Clear</button>
				<?php 
					if (isset($_SESSION['result'])) {
						$result = $_SESSION['result'];
				?>
				<br>
				<span id="result"><h4>Result is <?php echo $result ?></h4></span>
				<?php } ?>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
<?php } ?>
</body>
</html>