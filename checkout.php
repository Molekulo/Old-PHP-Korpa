<?php
  //ukljuci sve funkcije
  include ('book_sc_fns.php');

  // potrebna je sesija za korpu
  session_start();

  do_html_header("Plaćanje");

  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart'], false, 0);
    display_checkout_form();
  } else {
    echo "<p>Nema knjiga u vašoj korpi</p>";
  }

  display_button("show_cart.php", "continue-shopping", "Continue Shopping");

  do_html_footer();
?>
