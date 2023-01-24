   <?php
   session_start();
   if (!isset($_SESSION["yönetici"])) 
   {
       ?>
       <script type="text/javascript">
           window.location="giriş.php";
       </script>

       <?php
   }
    include "başlık.php";
    include "ayar.php";

   ?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Düz Sayfa</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Arama...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Gitmek!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Düz Sayfa</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $res=mysqli_query($link,"SELECT * FROM ogrenciler");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Ad"; echo "</th>";
                                echo "<th>"; echo "Soyad"; echo "</th>";
                                echo "<th>"; echo "Kullanıcı Adı"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "İletişim"; echo "</th>";
                                echo "<th>"; echo "Sem"; echo "</th>";
                                echo "<th>"; echo "Kayıt No"; echo "</th>";
                                echo "<th>"; echo "Durum"; echo "</th>";
                                echo "<th>"; echo "Onaylandı"; echo "</th>";
                                echo "<th>"; echo "Onaylanmadı"; echo "</th>";
                                echo "</tr>";
                                while ($row=mysqli_fetch_array($res)) 

                                {
                                    echo "<tr>";
                                echo "<td>"; echo $row["ad"]; echo "</td>";
                                echo "<td>"; echo $row["soyad"]; echo "</td>";
                                echo "<td>"; echo $row["kullanici_adi"]; echo "</td>";
                                echo "<td>"; echo $row["email"]; echo "</td>";
                                echo "<td>"; echo $row["iletisim"]; echo "</td>";
                                echo "<td>"; echo $row["sem"]; echo "</td>";
                                echo "<td>"; echo $row["kayit_no"]; echo "</td>";
                                echo "<td>"; echo $row["durum"]; echo "</td>";
                                echo "<td>"; ?> <a href="onaylandı.php?id=<?php echo $row["id"]; ?>">Onaylandı</a>  <?php echo "</td>";
                                echo "<td>"; ?> <a href="onaylanmadı.php?id=<?php echo $row["id"]; ?>">Onaylanmadı</a>  <?php echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
 <?php
          include "altbilgi.php";
         ?>
