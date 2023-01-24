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
                    <h2>Öğrenciye Mesaj Gönder</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data" > 
                        <table class="table table-bordered">
                         <tr>
                             <td>
                                <select class="form-control" name="kullanici_adi">
                                    <?php 
                                    $res=mysqli_query($link,"SELECT * FROM ogrenciler");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        ?><option value="<?php echo $row["kullanici_adi"]?>">
                                            <?php echo $row["kullanici_adi"]."(". $row["kayit_no"].")"; ?>
                                        </option><?php
                                    }


                                    ?>
                                    
                                </select>
                            </td>
                        </tr> 

                        <tr>
                            <td><input type="text" class="form-control" name="baslik" placeholder="Başlığı Girin"></td>
                        </tr>

                        <tr>
                            <td>
                                Mesaj <br>
                              <textarea name="msg" class="form-control">
                                  
                              </textarea>  
                            </td>
                        </tr>

                        <tr>
                            <td><input type="submit" name="submit1" value="Mesajı Gönder"></td>
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
if (isset($_POST["submit1"])) 
{
    mysqli_query($link,"INSERT INTO mesajlar VALUES('','$_SESSION[yönetici]','$_POST[kullanici_adi]','$_POST[baslik]','$_POST[msg]','n')") or die(mysqli_error($link));

    ?>

    <script type="text/javascript">
        alert("Mesaj Başarılı Bir Şekilde Gönderildi")
    </script>

    <?php


}
 ?>

<?php
include "altbilgi.php";
?>
