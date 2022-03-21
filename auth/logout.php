<?php 

// session
session_start();

// hancurkan session yang masuk
session_destroy();

// arahkan ke halaman index.php
header("Location:login.php");

?>