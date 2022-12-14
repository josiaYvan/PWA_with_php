<html>
<head>
	<?php include('header.php') ?>
	<title>Add Data</title>
</head>

<body> 
	<?php include('button.php') ?>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$new_doc = new stdClass();
		$new_doc->name = $name;
		$new_doc->age = $age;
		$new_doc->email = $email;
		try {
		$response = $client->storeDoc($new_doc);
		} catch (Exception $e) {
		echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
		}
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}

}
?>
<?php include('footer.php') ?>
</body>
</html>
