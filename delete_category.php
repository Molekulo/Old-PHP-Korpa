<?php

require_once('book_sc_fns.php');
session_start();

do_html_header("Brisanje kategorije");
if (check_admin_user()) {
  if (isset($_POST['catid'])) {
    if(delete_category($_POST['catid'])) {
      echo "<p>Kategorija je obrisana.</p>";
    } else {
      echo "<p>Kategorija ne može da bude obrisana.<br />
            Kategorija mora biti prazna da bi bila obrisana.</p>";
    }
  } else {
    echo "<p>Nije odabrana kategorija. Pokušajte ponovo.</p>";
  }
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni da vidite ovu stranicu.</p>";
}
do_html_footer();

?>
