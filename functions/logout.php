<?php
//FAZ O LOGOFF DO SISTEMA
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
?>