<?php

session_start();

session_destroy();

header("Location: ass2.php");

exit;
