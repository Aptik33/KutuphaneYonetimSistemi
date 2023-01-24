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
                            <h2>Kitap İade</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            

                        <form name="form1" action="" method="post">
                        <table class="table table-bordered">
                            <tr>

                                <td><select name="enr" class="form-control">
                                   <?php 

                                      $res=mysqli_query($link,"SELECT ogrenci_kaydi FROM kitap_dagit where kitap_iade_tarihi=''");
                                      while ($row=mysqli_fetch_array($res)) 
                                      {
                                          echo "<option>";
                                          echo $row["ogrenci_kaydi"];
                                          echo "</option>";
                                      }

                                    ?>
                                </select></td>
                                <td>
                                    <input type="submit" name="submit1" value="Arama" class="form-control" style="background-color: blue; color:white;">
                                </td>
                                
                            </tr>

                        </table>
                        </form>

 
                        <?php 

                        if (isset($_POST["submit1"])) 
                        {
                           $res=mysqli_query($link,"SELECT * FROM kitap_dagit where ogrenci_kaydi='$_POST[enr]'");
                                      echo "<table class='table table-bordered'>";
                                      echo "<tr>";
                                      echo "<th>"; 
                                      echo "Öğrenci Kayıt No";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "Öğrenci Adı";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "Öğrenci dönemi";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "Öğrenci İletişim";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "Öğrenci Email";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "Kitap Adı";  
                                      echo "</th>";
                                      echo "<th>"; 
                                      echo "kitap Alış Tarihi";  
                                      echo "</th>";
                                      echo "<th>";
                                      echo "kitap İade Tarihi";
                                      echo "</th>";
                                      echo "</tr>";
                                      while ($row=mysqli_fetch_array($res)) { 
                                      
                                      echo "<tr>";
                                      echo "<td>"; echo $row["ogrenci_kaydi"]; ; echo "</td>";
                                      echo "<td>"; echo $row["ogrenci_ad"]; ; echo "</td>"; 
                                      echo "<td>"; echo $row["ogrenci_sem"]; ; echo "</td>"; 
                                      echo "<td>"; echo $row["ogrenci_iletisim"]; ; echo "</td>"; 
                                      echo "<td>"; echo $row["ogrenci_email"]; ; echo "</td>"; 
                                      echo "<td>"; echo $row["kitap_ad"]; ; echo "</td>"; 
                                      echo "<td>"; echo $row["kitap_veris_tarihi"]; ; echo "</td>"; 
                                      echo "<td>"; ?> <a href="iade.php?id=<?php echo $row["id"];  ?>">İade Et</a> <?php echo "</td>"; 
                                      echo "</tr>";
                                      }

                                      echo "</table>";
     

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
