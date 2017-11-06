<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Dodaj knjigu");
if (check_admin_user()) {
  display_book_form();
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni za ulazak u administracioni meni.</p>";
}
do_html_footer();

?>
