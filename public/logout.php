<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['intentsInvalids']);
unset($_SESSION['ofegat']);
session_destroy();
header('location:/login.php');