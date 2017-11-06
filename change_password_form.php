<?php
 require_once('book_sc_fns.php');
 session_start();
 do_html_header("Promena šifre admina");
 check_admin_user();

 display_password_form();

 do_html_url("admin.php", "Povratak u administracioni meni");
 do_html_footer();
?>
