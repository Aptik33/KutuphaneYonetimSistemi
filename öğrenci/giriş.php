<?php

session_start();
 include "ayar.php";

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Öğrenci Giriş Formu | KYS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Kütüphane Yönetim Sistemi</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Kullanıcı Giriş Formu</h1>

            <div>
                <input type="text" name="kullanici_adi" class="form-control" placeholder="Kullanıcı Adı" required=""/>
            </div>
            <div>
                <input type="password" name="parola" class="form-control" placeholder="Parola" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Giriş">
                <a class="reset_pass" href="#">Parolanızı mı unuttunuz?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Sitenin yeni üyesi misiniz?
                    <a href="kayıt.php"> Hesap Oluştur </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>


<?php

   if (isset($_POST['submit1']))

   {
    $count=0;
     $res=mysqli_query($link,"SELECT * FROM ogrenciler WHERE kullanici_adi ='$_POST[kullanici_adi]' && parola='$_POST[parola]' && durum='evet'");
     $count=mysqli_num_rows($res);
 
   if ($count==0) 
   {
       ?>
       <div class="alert alert-danger col-lg-6 col-lg-push-3">
        <strong style="color:white">Geçersiz</strong> Kullanıcı Adı veya Parola.
      </div>

    <?php
   }

   else 
   {
    $_SESSION["kullanici_adi"]=$_POST["kullanici_adi"];
   ?>
 
   <script type="text/javascript"> 

   window.location="kitaplarım.php";
   </script>

   <?php

   }

   }

?>

</body>
</html>
