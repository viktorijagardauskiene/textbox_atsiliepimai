<?php
session_start();
if (!isset($_SESSION['messages'])) {
$_SESSION['messages'] = [];
}

if(isset($_POST['message'])) {
$_post
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
			<?php print_r($_SESSION['message'])?>
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