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
 include "ayar.php";
 include "başlık.php";

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
                    <h2>Kitaplar</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="form1" action="" method="get">
                        <input type="text" name="t1" class="form-control" placeholder="kitap adını girin">
                        <input type="submit" name="submit1" value="kitap ara" class="btn btn-default">
                        <label for="filtre">Filtrele:</label>
                        <select name="filtre" id="filtre">
                            <option value="en-yuksek-fiyat" <?php if($_GET["filtre"] == "en-yuksek-fiyat") echo "selected"?>>En yüksek fiyat</option>
                            <option value="en-dusuk-fiyat" <?php if($_GET["filtre"] == "en-dusuk-fiyat") echo "selected"?>>En düşük fiyat</option>
                        </select>
                        <input type="submit" value="Filtrele">
                    </form>
                    <?php $result = mysqli_query($link, "SELECT * FROM kategori");     
                    if (!$result)     
                        die("Database access failed: " . mysqli_error());         
                    $rows = mysqli_num_rows($result); 
                    if ($rows) {     
                        while ($row = mysqli_fetch_array($result)) {         
                            echo "<a href='kitapları_göster.php?kategori=".$row['kategori_adi']."'>".$row['kategori_adi']."</a><br>";           
                        } 
                    }

                    if (isset($_GET["submit1"])){
                        $res=mysqli_query($link,"SELECT * FROM kitaplar WHERE kitap_ad LIKE('$_GET[t1]%') ");
                    }
                    else
                    {
                        if(isset($_GET["filtre"])){
                          if($_GET["filtre"] == "en-yuksek-fiyat"){
                            $res=mysqli_query($link,"SELECT * FROM kitaplar ORDER by fiyat DESC");
                        } else if($_GET["filtre"] == "en-dusuk-fiyat"){
                            $res=mysqli_query($link,"SELECT * FROM kitaplar ORDER by fiyat ASC");
                        } else {
                            $res=mysqli_query($link,"SELECT * FROM kitaplar"); 
                        }
                    } else if(isset($_GET["kategori"])){
                      $res=mysqli_query($link,"SELECT * FROM kitaplar WHERE kitap_turu = '".$_GET['kategori']."' ORDER by kitap_id DESC");
                  }

              }
              echo"<div class='row'>";
              while ($row = mysqli_fetch_array($res)) 
              {

                echo"<div class='mycard col-md-3'>";
                echo"<center><img src='".$row['kapak_foto']."' width=100 height=100 class='card-cover' alt='...''></center>";
                echo"<div class='card-body'>";
                echo"<h4>";
                echo $row["kitap_ad"];
                echo"<h4>";
                echo"<p class='card-text'>";
                echo"<li>Tür: ".$row['kitap_turu']."</li><li>Yazar: ".$row['yazar']."</li><li>Sayfa: ".$row['sayfa']."</li><li>Yıl: ".$row['yili']."</li><li>Fiyat: ".$row['fiyat']."</li>";
                echo"</p>";
                echo "<td><a href='kitabı_sil.php?kitap_id=".$row['kitap_id']."' class='btn btn-danger'>Sil</a></td>";

                echo"<button type='button' id='".$row['kapak_foto']."|".$row['kitap_ad']."|".$row['kitap_turu']."|".$row['yazar']."'>Detay</button>";
                echo"</div>";
                echo"</div>";
            }

            echo"</div>";                
            ?>


        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<script>
    document.addEventListener("click", function(e) {
      if(e.target && e.target.matches("button")) {
        const divId = e.target.id;
        const parts = divId.split("|");

        Swal.fire({
          title: parts[1],
          html: `<h2>Kitap Türü : ${parts[2]} | Kitap Yazarı : ${parts[3]}</h2>`,
          imageUrl: parts[0],
          width: 600,
          imageWidth: 200,
          imageHeight: 300,
          showConfirmButton: false
      })
    }
});
</script>
<?php
include "altbilgi.php";
?>
