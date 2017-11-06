<?php
 require_once('book_sc_fns.php');
 session_start();
 do_html_header('Promena šifre');
 check_admin_user();
 if (!filled_out($_POST)) {
   echo "<p>Niste popunili ceo obrazac.<br/>
         Pokušajte ponovo.</p>";
   do_html_url("admin.php", "Povratak u administracioni meni");
   do_html_footer();
   exit;
 } else {
   $new_passwd = $_POST['new_passwd'];
   $new_passwd2 = $_POST['new_passwd2'];
   $old_passwd = $_POST['old_passwd'];
   if ($new_passwd != $new_passwd2) {
      echo "<p>Šifre nisu identične.  Bez promena.</p>";
   } else if ((strlen($new_passwd)>16) || (strlen($new_passwd)<6)) {
      echo "<p>Nova šifra mora biti izmedju 6 i 16 karaktera.  Pokušajte ponovo.</p>";
   } else {
      // azuriranje šifre
      if (change_password($_SESSION['admin_user'], $old_passwd, $new_passwd)) {
         echo "<p>Šifra promenjena.</p>";
      } else {
         echo "<p>Šifra ne može da bude promenjena.</p>";
      }
   }
 }
 do_html_url("admin.php", "Povratak u administracioni meni");
 do_html_footer();
?>
