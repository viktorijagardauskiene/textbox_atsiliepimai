<?php
date_default_timezone_set("Europe/Vilnius");

session_start();
if (!isset($_SESSION['messages'])) {
$_SESSION['messages'] = [];
}

if(isset($_POST['message'])) {
array_push($_SESSION['messages'], $_POST['message']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<body style="background-color: lightyellow">

<div class="container">
	<div class="row">
		<div class="col-md-12"><h1>Shoutbox</h1></div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php 
			echo date("Y-m-d H:i:s");

			foreach ($_SESSION['messages'] as $message) {
				echo '<div class="card"><div class="card-block">'.$message.'</div></div><br />';
			}
			
			?>
		</div>
	</div>
	<div class="row">
		
         <div class="col-md-12">
            
			<form action="" method="POST">
				<label for="message">Message</label> 
				<textarea class="form-control" name="message" id="message" rows="3"></textarea>
				<button class="btn btn-default" type="submit">Add</button>
			</form>
                        
        </div>
	</div>

</div>


</body>
</html>


</body>
</html>