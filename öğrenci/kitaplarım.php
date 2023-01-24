   <?php
   session_start();
   if (!isset($_SESSION["kullanici_adi"])) 
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
                        <h3></h3>
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
                                <h2>Kitaplarım</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <table class="table table-bordered">
                                <th>
                                    Öğrenci Kayıt No
                                </th>
                                <th>
                                    Kitap Adı
                                </th>
                                <th>
                                    Kitap Basım Tarihi
                                </th>
                                <?php 
                        $res = mysqli_query($link,"SELECT * FROM kitap_dagit where ogrenci_kullanici_ad ='$_SESSION[kullanici_adi]'");
                                  while ($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["ogrenci_kaydi"];
                                        echo "</td>";
                                    echo "<td>";
                                        echo $row["kitap_ad"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["kitap_veris_tarihi"];
                                        echo "</td>";

                                        echo "</tr>";
                                    }

                                 ?>
                                   
                               </table>
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
