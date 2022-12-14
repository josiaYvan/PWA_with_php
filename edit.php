<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = $_POST['id'];
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
	} else {	
		//updating the table
		try {
		$doc = $client->getDoc($id);
		} catch (Exception $e) {
		echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
		}
		// make changes
		$doc->name = $name;
		$doc->age = $age;
		$doc->email = $email;
		// update the document on CouchDB server
		try {
			$response = $client->storeDoc($doc);
		} catch (Exception $e) {
			echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
		}
		echo "Doc recorded. id = ".$response->id." and revision = ".$response->rev."<br>\n";
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
	//getting id from url
	$id = $_GET['id'];
	// get the document
	try {
	$doc = $client->getDoc($id);
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
	}
	$name = $doc->name;
	$age = $doc->age;
	$email = $doc->email;
?>
<html>
<head>
	<?php include('header.php') ?>
	<title>Edit Data</title>
</head>

<body>
<?php include('button.php') ?>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	<?php include('footer.php') ?>
</body>
</html>
