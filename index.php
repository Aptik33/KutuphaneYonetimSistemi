<!DOCTYPE html>
<html>
<head>
  <title>Kütüphane Yönetim Sistemi</title>
  <style>
    /* Sayfanın arkaplan rengini krem yapalım */
    body {
      background-color: #FFFACD;
    }

    /* Düğmelere biraz stil ekleyin */
    .button {
      background-color: #4CAF50; /* Yeşil */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

  </style>
</head>
<body>
  <center>
    <h1>Kütüphane Yönetim Sistemi Giriş Sayfası</h1>
    <br>
    <button class="button" onclick="location.href='yönetici/giriş.php'">Yönetici</button>
    <button class="button" onclick="location.href='öğrenci/giriş.php'">Öğrenci</button>
  </center>
</body>
</html>
