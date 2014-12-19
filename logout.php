<?php
session_start();
session_destroy();
echo "<script>alert('ANDA TELAH KELUAR');window.location='index.php';</script>";
?>