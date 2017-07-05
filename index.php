<?php
date_default_timezone_set("Europe/Vilnius");

// Create connection
$conn = mysqli_connect("localhost", "ViktorijaG", "kashtankai15", "viktorijag"); // domenas, vardas, slaptazodis, lentele

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['message'])) { // paslinkom koda uz connection prie db
	$sql = "INSERT INTO messages(body) VALUES ('".$_POST['message']."')";
	// $sql = "INSERT INTO lent_pav (stulp_pav, stulp_pav) VALUES ('John', 'Doe', 'john@example.com')";


	if (mysqli_query($conn, $sql)) {
	    echo "<div class='alert alert-success' role='alert'>
  <strong>Well done!</strong> New record created successfully.
</div>;";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


$sql = "SELECT * FROM messages"; // where user = "kazkoks", isfiltruos duomenis pagal user nurodytu vardu
$result = mysqli_query($conn, $sql);

$db_messages = [];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	array_push($db_messages, $row);
    }
    } else {
    	echo "0 results";
    }

    mysqli_close($conn);
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
			
			foreach ($db_messages as $message) {
				echo '<div class="card"><div class="card-block">['.$message["id"].'] '.$message["time"]." ".$message["body"]." " .'</div></div><br />';
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

<!-- heidiSQL - patogesne duombaze nei mySQL