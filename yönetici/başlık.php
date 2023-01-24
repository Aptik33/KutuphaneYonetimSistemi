<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eğitim Yönetim Sistemi | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldiniz,</span>

                        <h2><?php echo $_SESSION["yönetici"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>MENÜ</h3>
                        <ul class="nav side-menu">
                            <li><a href="öğrenci_bilgilerini_göster.php"><i class="fa fa-home"></i> Tüm Öğrenci Bilgileri <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_ekleme.php"><i class="fa fa-edit"></i> Kitap Ekle <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitapları_göster.php?t1=&submit1=kitap+ara&filtre=en-yuksek-fiyat"><i class="fa fa-desktop"></i> Kitapları Göster <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_ver.php"><i class="fa fa-table"></i> Kitapları Ver <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_iade.php"><i class="fa fa-bar-chart-o"></i> kitapları iade et <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_ögrenci_listesi.php"><i class="fa fa-book"></i> Öğrencilerde olan Kitaplar <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="ögrenciye_bildirim_gönder.php"><i class="fa fa-mail-forward"></i> öğrenciye mesaj gönder <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo $_SESSION["yönetici"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="cıkıs.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
