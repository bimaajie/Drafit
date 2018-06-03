<?php
session_start();
include 'config.php';

session_destroy();
exit("<script>window.location='".$www."';</script>");
?>