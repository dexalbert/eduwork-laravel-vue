<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("connect.php");
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add-katalog.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Kode katalog</td>
				<td><input type="text" name="id_katalog"></td>
			</tr>
			<tr> 
				<td>Nama katalog</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit-katalog" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit-katalog'])) {
			$id_katalog = $_POST['id_katalog'];
			$nama_katalog = $_POST['nama'];
			// var_dump($id_katalog);
			// var_dump($nama_katalog);
			// die;
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama_katalog');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>