<?php
include __DIR__ . '/../../src/Models/Admin.php';
if (isset($_GET['id'])) {
    $Admin = new Admin();
    $Admin->deleteCatego($_GET['id']);
}

?>