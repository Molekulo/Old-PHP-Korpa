<?php
  include ('book_sc_fns.php');
  // Pokrece sesiju
  session_start();

  do_html_header('Plaćanje');

  $card_type = $_POST['card_type'];
  $card_number = $_POST['card_number'];
  $card_month = $_POST['card_month'];
  $card_year = $_POST['card_year'];
  $card_name = $_POST['card_name'];

  if(($_SESSION['cart']) && ($card_type) && ($card_number) &&
     ($card_month) && ($card_year) && ($card_name)) {
    //prikazuje korpu bez izmena i slike
    display_cart($_SESSION['cart'], false, 0);

    display_shipping(calculate_shipping_cost());

    if(process_card($_POST)) {
      //prazna korpa
      session_destroy();
      echo "<p>Hvala na kupovini. Vaša porudžbina je primljena.</p>";
      display_button("index.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Greška sa kreditnom karticom..</p>";
      display_button("purchase.php", "back", "Back");
    }
  } else {
    echo "<p>Niste popunili sva polja, pokušajte ponovo.</p><hr />";
    display_button("purchase.php", "back", "Back");
  }

  do_html_footer();
?>
