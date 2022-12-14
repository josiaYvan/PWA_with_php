<?php
//including the database connection file

include_once("config.php");
$docs = $client->include_docs(true)->getAllDocs();
?>

<html>
<head>	
	<?php include('header.php') ?>
	<title>Homepage</title>
</head>

<body>
<?php include('button.php') ?>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	foreach($docs->rows as $row){
		echo "<tr>";
		echo "<td>".$row->doc->name."</td>";
		echo "<td>".$row->doc->age."</td>";
		echo "<td>".$row->doc->email."</td>";	
		echo "<td><a href=\"edit.php?id=$row->id\">Edit</a> | <a href=\"delete.php?id=$row->id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
	}
	?>
	</table>
	<?php include('footer.php') ?>
</body>
</html>
