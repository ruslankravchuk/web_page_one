<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<?php
$conect = mysqli_connect("localhost", "root", "", "new");
mysqli_set_charset($conect, "utf8");

if (mysqli_connect_errno()) {
	echo "Failed_to_connect to MySQL: ".mysqli_connect_error();
}



$query = "SELECT Fist_Name, Second_Name, Pidrozdil, Posada from viyskovi_i_bat INNER JOIN vidsutni ON viyskovi_i_bat.ID_Viyskovi= vidsutni.ID_Viyskovi";

$into = mysqli_query($conect, $query);

$count = mysqli_num_rows($into);
$y = mysqli_fetch_array($into);
if ($count) 
{

	for ($i = 0; $i < count($y); ++$i) 
	{;
		$viborka [] = $y[$i];
    
		if ($viborka[$i] == '') {
		break;
	}
	
	
	
	}


}


if (isset($_POST)) {
echo "<pre>";
var_dump($_POST);

}
?>
<body>

</body>
</html>
