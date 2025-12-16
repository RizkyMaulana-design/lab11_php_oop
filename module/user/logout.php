<?php

session_start();

session_unset();

session_destroy();

header("Location: ?mod=user&act=login&pesan=logout_sukses");

exit;
?>