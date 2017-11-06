<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Ažuriranje kategorije");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    if(update_category($_POST['catid'], $_POST['catname'])) {
      echo "<p>Kategorija ažurirana.</p>";
    } else {
      echo "<p>Kategorija ne može da bude ažurirana.</p>";
    }
  } else {
    echo "<p>Niste popunili ceo obrazac. Pokušajte ponovo.</p>";
  }
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni da vidite ovu stranicu.</p>";
}
do_html_footer();

?>
