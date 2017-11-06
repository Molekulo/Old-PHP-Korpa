<?php

// ukljucujemo funkcije za ovu aplikaciju
require_once('book_sc_fns.php');
session_start();


if (($_POST['username']) && ($_POST['passwd'])) {
	// pokusaj logovanja

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if (login($username, $passwd)) {
      // ako ne postoji u bazi podataka, registruj admina
      $_SESSION['admin_user'] = $username;

   } else {
      // neuspesan login
      do_html_header("Problem:");
      echo "<p>Ne mozete da se ulogujete.<br/>
            Morate biti ulogovani da biste videli ovu stranicu.</p>";
      do_html_url('login.php', 'Login');
      do_html_footer();
      exit;
    }
}

do_html_header("Administracija");
if (check_admin_user()) {
  display_admin_menu();
} else {
  echo "<p>Nije vam dozvoljeno da koristite administratorska prava.</p>";
}
do_html_footer();

?>
