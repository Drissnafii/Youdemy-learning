<?php
session_start();
if ($_SESSION["role"] !== "student") {
    # code...
    echo "dont have accec to that !";
}
echo "<h1>Normal User = Catalog page</h1>";