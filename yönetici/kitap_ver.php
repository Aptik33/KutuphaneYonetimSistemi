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
                    <h2>Verilen Kitaplar</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="form1" action="" method="post">
                      <table>
                        <tr>
                         <td>
                            <select name="enr" class="form-control selectpicker">

                                <?php 
                                $res=mysqli_query($link,"SELECT kayit_no FROM ogrenciler");
                                while($row=mysqli_fetch_array($res))
                                {
                                  echo "<option>";
                                  echo $row["kayit_no"];
                                  echo "</option>";

                              }

                              ?>

                          </select> 
                      </td>
                      <td>
                        <input type="submit" value="Arama" name="submit1" 
                        class="form-control btn btn-default" style="margin-top: 5px;">
                        
                    </td>
                </tr>
                
            </table>

            

            <?php 
            if (isset($_POST["submit1"])) {

              $res5=mysqli_query($link,"SELECT * FROM ogrenciler WHERE kayit_no='$_POST[enr]'");
              while ($row5=mysqli_fetch_array($res5)) 
              {
                $ad=$row5["ad"];
                $soyad=$row5["soyad"];
                $kullanici_adi=$row5["kullanici_adi"];
                $email=$row5["email"];
                $iletisim=$row5["iletisim"];
                $sem=$row5["sem"];
                $kayit_no=$row5["kayit_no"];
                $_SESSION["kayit_no"]=$kayit_no;
                $_SESSION["skullanici_adi"]=$kullanici_adi;
            }

            ?>
            <table class="table table-bordered">
               <tr>
                 <td>
                   <input type="text" class="form-control" placeholder="Kayıt Numarası" name="kayit_no" value="<?php echo $kayit_no; ?>" disabled>
               </td>
           </tr>

           <tr>
             <td>
               <input type="text" class="form-control" placeholder="Öğrenci adı" name="ogrenci_ad" value="<?php echo $ad.' '.$soyad; ?>" required>
           </td>
       </tr>

       <tr>
         <td>
           <input type="text" class="form-control" placeholder="Öğrencinin Dönemi" name="ogrenci_sem" value="<?php echo $sem; ?>" required>
       </td>
   </tr>

   <tr>
     <td>
       <input type="text" class="form-control" placeholder="Öğrenci İletişim" name="ogrenci_iletisim" value="<?php echo $iletisim; ?>" required>
   </td>
</tr>

<tr>
 <td>
   <input type="text" class="form-control" placeholder="Öğrenci Emaili" name="ogrenci_email" value="<?php echo $email; ?>" required>
</td>
</tr>

<tr>
 <td>
   <select name="kitap_ad" class="form-control" selectpicker>

    <?php 
    $res=mysqli_query($link,"SELECT kitap_ad FROM kitaplar");
    while ($row=mysqli_fetch_array($res)) 
    {
        echo "<option>";

        echo $row["kitap_ad"];
        
        echo "</option>";
    }
    ?>
    

</select>
</td>
</tr>
<tr>
 <td>
   <input type="text" class="form-control" placeholder="Kitap Veriş Tarihi" name="kitap_veris_tarihi" value="<?php echo date("d-m-Y"); ?>" required>
</td>
</tr>

<tr>
 <td>
   <input type="text" class="form-control" placeholder="Öğrenci Kullanıcı Adı" name="ogrenci_kullanici_ad" value="<?php echo $kullanici_adi; ?>" disabled>
</td>
</tr>

<tr>
 <td>
   <input type="submit" value="Kitabı Ver" name="submit2" class="form-control btn btn-default" style="background-color: blue; color: white;">
</td>
</tr>


</table>
<?php
}
?>

</form>
<?php 
if(isset($_POST["submit2"])) 
{

    $qty=0;

    $res=mysqli_query($link,("SELECT * FROM kitaplar WHERE kitap_ad='$_POST[kitap_ad]'"));
    while($row=mysqli_fetch_array($res))
    {
        $qty=$row["mevcut_miktar"];
    }

    if ($qty==0) 
    {
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="...">Malesef İstediğiniz kitap Kalmadı</strong>
        </div>

        <?php
    }

    else
    {    


        mysqli_query($link,"INSERT INTO kitap_dagit values('','$_SESSION[kayit_no]','$_POST[ogrenci_ad]','$_POST[ogrenci_sem]','$_POST[ogrenci_iletisim]','$_POST[ogrenci_email]','$_POST[kitap_ad]','$_POST[kitap_veris_tarihi]','', '$_SESSION[skullanici_adi]')");
        mysqli_query($link,"UPDATE kitaplar SET mevcut_miktar=mevcut_miktar-1 WHERE kitap_ad='$_POST[kitap_ad]'");
        ?>
        <script type="text/javascript" >
          
          alert("Başarıyla verilen kitaplar");
          window.location.href=window.location.href;
      </script>


      <?php
  }
}


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
