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
   						<h2>Kitaplara Sahip Öğrenci Listesi</h2>

   						<div class="clearfix"></div>
   					</div>
   					<div class="x_content">
   						
                     <?php 
                     $res=mysqli_query($link,"SELECT * FROM kitap_dagit WHERE kitap_ad='$_GET[kitap_ad]' && kitap_veris_tarihi=''");
                     echo "<table class='table table-bordered'>";
                     echo "<tr>";
                     echo "<th>"; echo "Öğrenci Adı"; echo "</th>";
                     echo "<th>"; echo "Öğrenci Kaydı"; echo "</th>";
                     echo "<th>"; echo "Kitap Adı"; echo "</th>";
                     echo "<th>"; echo "Öğrenci Dönemi"; echo "</th>";
                     echo "<th>"; echo "Öğrenci İletişim"; echo "</th>";
                     echo "<th>"; echo "Öğrenci Email"; echo "</th>";
                     echo "<th>"; echo "Öğrenciye Kitap Veriliş Tarihi"; echo "</th>";
                     echo "</tr>";

                     while($row=mysqli_fetch_array($res)) 
                     {
                       echo "<tr>";
                       echo "<td>"; echo $row["ogrenci_ad"]; echo "</td>";
                       echo "<td>"; echo $row["ogrenci_kaydi"]; echo "</td>";
                       echo "<td>"; echo $row["kitap_ad"]; echo "</td>";  
                       echo "<td>"; echo $row["ogrenci_sem"]; echo "</td>";
                       echo "<td>"; echo $row["ogrenci_iletisim"]; echo "</td>";
                       echo "<td>"; echo $row["ogrenci_email"]; echo "</td>";
                       echo "<td>"; echo $row["kitap_veris_tarihi"]; echo "</td>";
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
