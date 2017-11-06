<?php

require_once('book_sc_fns.php');
session_start();

do_html_header("Dodavanje knjige");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $catid = $_POST['catid'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if(insert_book($isbn, $title, $author, $catid, $price, $description)) {
      echo "<p>Knjiga <em>".stripslashes($title)."</em> je dodata u bazu podataka.</p>";
    } else {
      echo "<p>Knjiga <em>".stripslashes($title)."</em> ne može da bude dodata u bazu podataka.</p>";
    }
  } else {
    echo "<p>Niste popunili ceo obrazac. Pokušajte kasnije.</p>";
  }

  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni da vidite ovu stranicu.</p>";
}

do_html_footer();

?>
