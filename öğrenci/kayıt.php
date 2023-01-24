<?php
include "ayar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Öğrenci Kayıt Formu | KTS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Kütüphane Yönetim Sistemi</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h2>Kullanıcı Kayıt Formu</h2><br>

                <div>
                    <input type="text" class="form-control" placeholder="Ad" name="ad" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Soyad" name="soyad" required=""/>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kullanici_adi" required=""/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Parola" name="parola" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="E-posta" name="email" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="İletişim" name="iletisim" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Dönem" name="sem" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Kayıt Numarası" name="kayit_no" required=""/>
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit " type="submit" name="submit1" value="Kayıt ol">
                </div>
                <div class="separator">
                    <p class="change_link">Sitemize üyesi misiniz?
                        <a href="giriş.php"> Giriş Yapınız </a>
                    </p>

                    <div class="clearfix"></div>
                    <br/>


                </div>
            </form>
        </section>
        <?php
        
        if (isset($_POST['submit1'])) 

        {
            
            mysqli_query($link,"INSERT INTO yönetici VALUES ('','".$_POST['ad']."','".$_POST['soyad']."','".$_POST['kullanici_adi']."','".$_POST['parola']."','".$_POST['email']."','".$_POST['iletisim']."','".$_POST['sem']."','".$_POST['kayit_no']."','hayır')");

            ?>
            <div class="alert alert-success col-lg-6 col-lg-push-0">
                Kayıt başarıyla gerçekleşti, hesabınız onaylandığında e-posta alacaksınız
            </div>
            <?php


        } 

        ?> 

    </div>

    


</body>
</html>
