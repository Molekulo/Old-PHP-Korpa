<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Dodavanje kategorije");
if (check_admin_user()) {
  if (filled_out($_POST))   {
    $catname = $_POST['catname'];
    if(insert_category($catname)) {
      echo "<p>Kategorija \"".$catname."\" je dodata u bazu podataka.</p>";
    } else {
      echo "<p>Kategorija \"".$catname."\" nije dodata u bazu podataka.</p>";
    }
  } else {
    echo "<p>Niste popunili ceo obrazac. Pokušajte kasnije.</p>";
  }
  do_html_url('admin.php', 'Povratak u administracioni meni');
} else {
  echo "<p>Niste ovlašćeni za ulazak u administracioni meni.</p>";
}

do_html_footer();

?>
