 <html>
<form action="" method="post">  
 <input type="radio" name="buah" value="aktif">Aktif<br><br>
 <input type="radio" name="buah" value="mati">Mati<br><br><br> 
 <input type="submit" name="enter" value="Enter">  
</form>

</html>

 <?php
 
$myfile = fopen("save.txt", "r") or die("Gagal membuka file!");

echo fread($myfile,filesize("save.txt"));

fclose($myfile);
 if(isset($_POST['enter']))  
 {
    $file = fopen("save.txt","w");
    fwrite($file, $_POST['buah']);
    fclose($file);
    
    header("Location: /client.php");
 }  
 ?>  