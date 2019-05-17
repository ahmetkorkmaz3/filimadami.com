<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/main.css">

    <title></title>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <form method="POST" action="<?php echo base_url('admin'); ?>">
          <table>
            <tr>
              <td class="doyou">ÜYE GİRİŞİ</td>
            </tr>
              <td class="error-message"> <?php if(isset($hata)){echo $hata;} ?></td>
            <tr>
              <td><input type="text" name="username" placeholder="Kullanıcı Adı"></td>
            </tr>
            <tr>
              <td><input type="password" name="password" placeholder="Şifre"></td>
            </tr>
            <tr>
              <td><button type="submit" class="submitLogin">Üye Girişi</button></td>
            </tr>
          </table>
        </form>
      </div>
    </div>


  </body>
</html>
