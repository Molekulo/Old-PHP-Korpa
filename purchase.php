<?php

  include ('book_sc_fns.php');
  // pokrece sesiju
  session_start();

  do_html_header("Checkout");

  $name = $_POST['name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  // ako je popunjeno
  if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)) {
    // upisi u bazu pod.
    if(insert_order($_POST) != false ) {
      //prikazi korpu, bez izmene i slike
      display_cart($_SESSION['cart'], false, 0);

      display_shipping(calculate_shipping_cost());

      //detalji kreditne kartice
      display_card_form($name);

      display_button("show_cart.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Ne mogu da se sačuvaju podaci, pokušajte ponovo.</p>";
      display_button('checkout.php', 'back', 'Back');
    }
  } else {
    echo "<p>Niste popunili ceo obrazac, pokušajte kasnije.</p><hr />";
    display_button('checkout.php', 'back', 'Back');
  }

  do_html_footer();
?>
