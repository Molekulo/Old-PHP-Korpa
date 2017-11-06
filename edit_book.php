<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Ažuriranje knjige");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $oldisbn = $_POST['oldisbn'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $catid = $_POST['catid'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if(update_book($oldisbn, $isbn, $title, $author, $catid, $price, $description)) {
      echo "<p>Knjiga ažurirana.</p>";
    } else {
      echo "<p>Knjiga ne može da bude ažurirana.</p>";
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
