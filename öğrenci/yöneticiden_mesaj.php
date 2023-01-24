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
   mysqli_query($link,"UPDATE mesajlar SET okuma='y' WHERE kullanici_isim='$_SESSION[kullanici_adi]'");

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
                    <h2>Mesajlar</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Başlık</th>
                            <th>Mesaj</th>
                        </tr>   
                        <?php   
                        $res=mysqli_query($link,"SELECT * FROM mesajlar WHERE kullanici_isim='$_SESSION[kullanici_adi]' ORDER by id desc");
                        while ($row=mysqli_fetch_array($res)) 
                        {
                        
                            $res1=mysqli_query($link,"SELECT * FROM yönetici WHERE kullanici_adi='$row[isim]'");
                        while ($row1=mysqli_fetch_array($res1)){

                          $adsoyad=$row1["ad"]." ".$row1["soyad"];
                        }
                    
                       
                            echo "<tr>";
                            echo "<td>"; echo $adsoyad; echo "</td>";
                            echo "<td>"; echo $row["baslik"]; echo "</td>";
                            echo "<td>"; echo $row["msg"]; echo "</td>";
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
