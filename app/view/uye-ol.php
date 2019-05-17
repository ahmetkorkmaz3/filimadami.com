<div class="container">
  <div class="box">
    <form method="POST" action="<?php echo base_url('uye-ol'); ?>">
      <table>
        <tr>
          <td class="doyou">ÜYE OL</td>
        </tr>
        <tr>
          <td class="error-message"><?php if(isset($hata)){echo $hata;} ?></td>
        </tr>
        <tr>
          <td><input type="text" name="ad" placeholder="Ad" required></td>
        </tr>
        <tr>
          <td><input type="text" name="soyad" placeholder="Soyad" required></td>
        </tr>
        <tr>
          <td><input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" required></td>
        </tr>
        <tr>
          <td><input type="email" name="email" placeholder="E-Posta Adresi" required></td>
        </tr>
        <tr>
          <td><input type="password" name="sifre" placeholder="Şifre" required></td>
        </tr>
        <tr>
          <td><input type="password" name="sifre_tekrar" placeholder="Şifre Tekrar" required></td>
        </tr>
        <tr>
          <td class="signup"><input type="submit" value="ŞİMDİ ÜYE OLUN"></td>
        </tr>
        <tr>
          <td class="doyou">Üyeliğiniz var mı ?</td>
        </tr>
        <tr>
          <td class="signup"><a href="<?php echo base_url('giris'); ?>">GİRİŞ YAP</a>
        </tr>
      </table>
    </form>
  </div>
</div>
