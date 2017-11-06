<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Ažuriranje kategorije");
if (check_admin_user()) {
  if ($catname = get_category_name($_GET['catid'])) {
    $catid = $_GET['catid'];
    $cat = compact('catname', 'catid');
    display_category_form($cat);
  } else {
    echo "<p>Ne mogu da se preuzmu detalji knjige.</p>";
  }
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni za ulazak u administracioni meni.</p>";
}
do_html_footer();

?>
