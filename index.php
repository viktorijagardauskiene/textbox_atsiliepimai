<?php
date_default_timezone_set("Europe/Vilnius");

session_start();
if (!isset($_SESSION['messages'])) {
$_SESSION['messages'] = [];
}

if(isset($_POST['message'])) {
	$msg = ['date' => date("Y-m-d H:i:s"), 'message' => $_POST['message']];
	array_push($_SESSION['messages'], $msg);
}

// Create connection
$conn = mysqli_connect("localhost", "ViktorijaG", "kashtankai15", "viktorijag"); // domenas, vardas, slaptazodis, lentele

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    } else {
    	echo "0 results";
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
			
			foreach ($_SESSION['messages'] as $entry) {
				echo '<div class="card"><div class="card-block">'.$entry['date'].': '.$entry['message'].'</div></div><br />';
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
<pre><?php print_r($_SESSION['messages']) ?></pre>

</body>
</html>


</body>
</html>