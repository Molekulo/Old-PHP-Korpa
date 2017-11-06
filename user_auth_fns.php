<?php

require_once('db_fns.php');

function login($username, $password) {
// proveri kor. ime i sifru
  $conn = db_connect();
  if (!$conn) {
    return 0;
  }

  // proveri da li je kor. ime unikatno
  $result = $conn->query("select * from admin
                         where username='".$username."'
                         and password = sha1('".$password."')");
  if (!$result) {
     return 0;
  }

  if ($result->num_rows>0) {
     return 1;
  } else {
     return 0;
  }
}

function check_admin_user() {
// proveri da li je logovan
  if (isset($_SESSION['admin_user'])) {
    return true;
  } else {
    return false;
  }
}

function change_password($username, $old_password, $new_password) {
//promeni sifru
  if (login($username, $old_password)) {

    if (!($conn = db_connect())) {
      return false;
    }

    $result = $conn->query("update admin
                            set password = sha1('".$new_password."')
                            where username = '".$username."'");
    if (!$result) {
      return false;  // nije promenjena
    } else {
      return true;  // uspesno promenjena
    }
  } else {
    return false; // stara sifra je pogresna
  }
}


?>
