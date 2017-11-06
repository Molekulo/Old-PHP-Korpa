<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Ažuriraj detalje knjige");
if (check_admin_user()) {
  if ($book = get_book_details($_GET['isbn'])) {
    display_book_form($book);
  } else {
    echo "<p>Ne mogu da se preuzmu detalji knjige.</p>";
  }
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni za ulazak u administracioni meni.</p>";
}
do_html_footer();

?>
