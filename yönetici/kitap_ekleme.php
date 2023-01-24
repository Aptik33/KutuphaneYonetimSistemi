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
                    <h2>Kitap bilgisi ekle</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data" > 
                        <table class="table table-bordered">
                           <tr>
                               <td>
                                <input type="text" class="form-control" placeholder="Kitap Adı" name="kitap_ad" required="">
                            </td>
                        </tr> 


                        <tr>
                           <td>

                            <label>Kitap Kategori <em>*</em></label>
                            <select name="kategori" class="form-control" required>
                                <option selected="rate" value="" disabled>Konu Seçiniz</option>
                                <?php $result = mysqli_query($link, "SELECT * FROM kategori");     
                                if (!$result)     
                                    die("Database access failed: " . mysqli_error());         
                                $rows = mysqli_num_rows($result); 

                                if ($rows) {     
                                    while ($row = mysqli_fetch_array($result)) {         
                                        echo "<option value='".$row["kategori_adi"]."'>".$row["kategori_adi"]."</option>";           
                                    } 
                                }
                                ?>

                            </select>
                        </td>
                    </tr> 


                    <tr>
                       <td>
                        <input type="text" class="form-control" placeholder="Yazar" name="yazar" required="">
                    </td>
                </tr> 

                <tr>
                   <td>
                    <input type="text" class="form-control" placeholder="Kitap Sayfası" name="sayfa" required="">
                </td>
            </tr> 

            <tr>
               <td>
                <input type="text" class="form-control" placeholder="Basım Yılı" name="yili" required="">
            </td>
        </tr>

        <tr>
           <td>
            <input type="text" class="form-control" placeholder="Kitap Dili" name="dili" required="">
        </td>
    </tr>

    <tr>
       <td>
        <input type="text" class="form-control" placeholder="Kitap Fiyatı" name="fiyat" required="">
    </td>
</tr>

<tr>
   <td>
    <input type="text" class="form-control" placeholder="Barkod Numarası" name="barkod" required="">
</td>
</tr>

<tr>
   <td>
    <input type="text" class="form-control" placeholder="Kitap Adeti" name="kitaplar_adet" required="">
</td>
</tr>

<tr>
   <td>
    <input type="text" class="form-control" placeholder="Mevcut Miktar" name="mevcut_miktar" required="">
</td>
</tr>

<tr>
   <td>
    Kapak Resmi
    <input type="file" name="f1" required="">
</td>
</tr> 

<tr>
   <td>
    <input type="submit" name="submit1" class="btn btn-default submit" value="kitabı ekle" style="background-color: blue; color:white;">
</td>
</tr>


</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php

if (isset($_POST['submit1'])) 
{
    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];
    $dst="kitap_resimleri/".$tm.$fnm;
    $dst1="kitap_resimleri/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"] ["tmp_name"],$dst);

    mysqli_query($link,"INSERT INTO kitaplar VALUES('','$_POST[kitap_ad]','$_POST[kategori]','$_POST[yazar]','$_POST[sayfa]','$_POST[yili]','$_POST[dili]','$_POST[fiyat]','$_POST[barkod]','$_SESSION[yönetici]','$dst1','$_POST[kitaplar_adet]','$_POST[mevcut_miktar]')");

    ?>

    <script type="text/javascript">
     alert("kitaplar başarıyla eklendi");
 </script>

 <?php

}

?>

<?php
include "altbilgi.php";
?>
