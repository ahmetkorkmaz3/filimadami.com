<div class="container">
  <div class="box">
    <form method="POST" action="<?php echo base_url('giris'); ?>">
      <table>
        <tr>
          <td class="doyou">ÜYE GİRİŞİ</td>
        </tr>
          <td class="error-message"> <?php if(isset($hata)){echo $hata;} ?></td>
        <tr>
          <td><input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" <?php if(isset($member_name)) { echo "value=\"" . $member_name . "\""; } ?>></td>
        </tr>
        <tr>
          <td><input type="password" name="sifre" placeholder="Şifre" <?php if(isset($member_pass)) { echo "value=\"" . $member_pass . "\""; } ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="beni_hatirla">Beni Hatırla</td>
        </tr>
        <tr>
          <td><button type="submit" class="submitLogin">Üye Girişi</button></td>
        </tr>
        <tr>
          <td class="doyou">Üyeliğiniz Yok mu ?</td>
        </tr>
        <tr>
          <td class="signup"><a href="<?php echo base_url('uye-ol'); ?>">ŞİMDİ ÜYE OLUN</a></td>
        </tr>
      </table>
    </form>
  </div>
</div>
