<?php

// ukljucujemo funkcije za ovu aplikaciju
require_once('book_sc_fns.php');
session_start();
$old_user = $_SESSION['admin_user']; 
unset($_SESSION['admin_user']);
session_destroy();

// prikazi html
do_html_header("Odjava");

if (!empty($old_user)) {
  echo "<p>Odjava.</p>";
  do_html_url("login.php", "Prijava");
} else {
  // stigao do ove stranice ali nije logovan
  echo "<p>Niste bili prijavljeni.</p>";
  do_html_url("login.php", "Prijava");
}

do_html_footer();

?>
