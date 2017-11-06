<?php

require_once('book_sc_fns.php');
session_start();

do_html_header("Brisanje knjige");
if (check_admin_user()) {
  if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
    if(delete_book($isbn)) {
      echo "<p>Knjiga ".$isbn." je obrisana.</p>";
    } else {
      echo "<p>Knjiga ".$isbn." ne može da bude obrisana.</p>";
    }
  } else {
    echo "<p>Potreban je ISBN broj da biste obrisali knjigu. Pokušajte ponovo.</p>";
  }
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni da vidite ovu stranicu.</p>";
}

do_html_footer();

?>
