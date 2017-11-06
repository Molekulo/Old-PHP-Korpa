<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Dodaj kategoriju");
if (check_admin_user()) {
  display_category_form();
  do_html_url("admin.php", "Povratak u administracioni meni");
} else {
  echo "<p>Niste ovlašćeni za ulazak u administracioni meni.</p>";
}
do_html_footer();

?>
