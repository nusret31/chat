<?php

session_start();
session_destroy();

echo "<center>";

echo "You logged out. Click here <a href='login.php'>here to login again</a>";

echo "</center>";


?>