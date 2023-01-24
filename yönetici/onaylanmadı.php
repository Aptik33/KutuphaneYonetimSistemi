 <?php

    include "ayar.php";
    $id=$_GET['id'];
    mysqli_query($link, "UPDATE ogrenciler SET durum='hayır' WHERE id=$id");

 ?>

  <script type="text/javascript">
  	
    window.location="öğrenci_bilgilerini_göster.php";

  </script>