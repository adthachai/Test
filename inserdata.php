<!doctype html>
<html lang="en">
<head>
	<title>Lab5 : PHP and Azure Database</title>
	<meta charset="utf-8" />
</head>

<body>
<?php
$host = "ap-cdbr-azure-east-c.cloudapp.net";
$user = "b355975c074b0c";
$pass = "ac03e2f5";
$data = "db_adthachai";
mysql_connect($host,$user,$pass) or die("SQL Error :<br />".mysql_error());
mysql_select_db($data) or die("SQL Error :<br />".mysql_error());
mysql_query("SET NAMES UTF-8");
if($_GET){
	$save2db= mysql_query("INSERT INTO se57(id,name) values('".$_GET["id"]."','".$_GET["name"]."')");
	if(!$save2db)
	{
		die("SQL Error:<br />".mysql_error());
	}
}
?>
<table border="1">
	<tr>
		<th><strong>ID</strong></th>
		<th><strong>NAME</strong></th>
	</tr>
	<?php
	$objQuery = mysql_query("SELECT * FROM se57");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<tr><td align="center"><?php echo $objResult['id'];?></td><td><?php echo $objResult['name'];?></td></tr>
	<?php
	}
	?>
	<form method="GET" autocomplete="no">
	<tr><td><input type="text" name="id" /></td><td><input type="text" name="name" /> &nbsp;<input type="submit" value="SUBMIT" /></td></tr>
	</form>
</table>
<?php
mysql_close();
?>
</body>
</html>