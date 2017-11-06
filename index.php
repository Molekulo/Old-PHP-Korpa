<?php
  include ('book_sc_fns.php');
  // Korpa zahteva sesiju
  session_start();
  do_html_header("Dobrodošli u web prodavnicu");
  
  //ako nije ulogovan, prikazi vezu za logovanje
  if(!isset($_SESSION['admin_user'])) {
    do_html_url("login.php", "Ulogujte se");
  }
    
  echo "<p>Odaberite kategoriju:</p>";

  // preuzmi kategorije iz baze podataka
  $cat_array = get_categories();

  // prikazi kao veze kategorije
  display_categories($cat_array);

  // ulogovan kao admin prikazi kategorije i linkove za dodavanje, azuriranje i brisanje
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
