<?php
include "ayar.php";
$id=$_GET["id"];
$a=date("d-m-Y");
$res=mysqli_query($link,"UPDATE kitap_dagit SET kitap_iade_tarihi='$a' WHERE id=$id");

$kitap_adi="";
$res=mysqli_query($link,"SELECT * FROM kitap_dagit WHERE id=$id");
while ($row=mysqli_fetch_array($res)) 
{
	$kitap_adi=$row["kitap_ad"];
}
    mysqli_query($link,"UPDATE kitaplar SET mevcut_miktar=mevcut_miktar+1 WHERE kitap_ad='$kitap_ad'");

?>

<script type="text/javascript">
	window.location="kitap_iade.php";
</script>