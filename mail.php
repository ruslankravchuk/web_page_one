<?php
$conect = mysqli_connect("localhost", "root", "", "osobowiy_sklad");
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







<!-- <?php
$serverName = "127.0.0.1.";
$connectionOptions = array(
    "Database" => "ZSU.mdf",
    "Uid" => "RUSS",
    "PWD" => "M02111958"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
$tsql= "SELECT Fist_Name, Second_Name, Pidrozdil, Posada from viyskovi_i_bat INNER JOIN vidsutni ON viyskovi_i_bat.ID_Viyskovi= vidsutni.ID_Viyskovi";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
 echo ($row['Viyskovi_I_bat.Fist_Name'] . " " . $row['Viyskovi_I_bat.Second_Name'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);



?> -->



// $recepient = "ruslan.kravchuk79@gmail.com";
// $sitename = "Прохання_перезвонити";

// $name = trim($_GET["name"]);
// $phone = trim($_GET["phone"]);

// $pagetitle = "Новая заявка с сайта \"$sitename\"";
// $message = "Имя: $name \nТелефон: $phone";
// mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
