<?php

/* And show errors... BE CAREFUL WITH THIS IN PRODUCTION */

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors','stdout');

$f = $_GET['f'].'.php';
unset ($_GET['f']);

if ($f[0] == '.') {
    print ("Invalid filename '$f', leading dots are forbidden.");
    exit();
}

require($f);
