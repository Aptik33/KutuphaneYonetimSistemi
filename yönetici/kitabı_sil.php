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


if (isset($_GET["id"])) 
{
    
 $id=$_GET["kitap_id"];
 mysqli_query($link,"DELETE FROM kitaplar WHERE kitap_id=$id");
  ?>
 <script type="text/javascript">
     window.location="kitapları_göster.php";
 </script>
<?php
}
else
{
?>
<script type="text/javascript">
     window.location="kitapları_göster.php";
 </script>
 <?php
 }

