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
 include "Ayar.php";

 ?>
 <!-- page content area main -->
 <div class    ="right_col" role="main">
    <div class    ="">
        <div class    ="page-title">
            <div class    ="title_left">
                <h3></h3>
            </div>

            <div class    ="title_right">
                <div class    ="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class    ="input-group">
                        <input type   ="text" class="form-control" placeholder="Arama...">
                        <span class   ="input-group-btn">
                            <button class ="btn btn-default" type="button">Gitmek!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class    ="clearfix"></div>
        <div class    ="row" style="min-height:500px">
         <div class    ="col-md-12 col-sm-12 col-xs-12"> 
            <div class    ="x_panel">
                <div class    ="x_title">
                    <h2>Öğrenci Kitap Listesi</h2>

                    <div class    ="clearfix"></div>
                </div>
                <div class    ="x_content">
                    <?php  
                    $i=0;
                    $res=mysqli_query($link,"SELECT * FROM kitaplar");
                    echo "<table class='table table-bordered'>";
                    echo "<tr>";
                    while ($row=mysqli_fetch_array($res)) 

                    {

                        $i=$i+1;
                        echo "<td>";
                        ?> <img src="../yönetici/<?php echo $row["kapak_foto"]; ?>" height="100" width="100"> <?php

                        echo "<br>";
                        echo "<b>" .$row["kitap_ad"]."</b>";
                        echo "<br>";
                        echo "<b>"."Kitap Sayısı:" .$row["kitaplar_adet"]."</b>";
                        echo "<br>";
                        echo "<b>". "Mevcut Miktar:" .$row["mevcut_miktar"]."</b>";
                        echo "<br>";
                        ?> <a href="kitaplara_sahip_ögrenciler.php?kitap_ad=<?php echo $row["kitap_ad"]; ?>" style="color: red;">Bu Kitaba Sahip Öğrenciler</a> <?php 
                        echo "</td>";

                        if ($i==4) 
                        {
                         echo "</tr>";
                         echo "<tr>";
                         $i=0;
                     }


                 }
                 echo "</tr>";
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
