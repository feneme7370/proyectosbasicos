<?php

session_start();

$_SESSION = [];

header("Location: ${raiz_url}index.php");
?>