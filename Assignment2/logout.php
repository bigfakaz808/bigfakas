<?php

session_start();

session_destroy();

header("Location: invoice.php");

exit;
