<?php

session_start();
session_unset();
session_destroy();

header("LOCATION: /ayush/healthify/index.php?logout=true");

?>