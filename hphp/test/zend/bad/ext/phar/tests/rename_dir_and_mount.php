<?php
$fname = dirname(__FILE__) . '/' . basename(__FILE__, '.php') . '.phar.php';
$pname = 'phar://' . $fname;
$file = "<?php
Phar::mapPhar('hio');
__HALT_COMPILER(); ?>";

$files = array();
$files['a/x'] = 'a';
$files['a/b/x'] = 'a';
include 'files/phar_test.inc';
include $fname;

Phar::mount("$pname/a/c", dirname(__FILE__));

var_dump(file_exists($pname . '/a'));
var_dump(file_exists($pname . '/a/x'));
var_dump(file_exists($pname . '/a/b'));
var_dump(file_exists($pname . '/a/b/x'));
var_dump(file_exists($pname . '/a/c'));
var_dump(file_exists($pname . '/a/c/'.basename(__FILE__)));
rename($pname . '/a', $pname . '/b');
clearstatcache();
var_dump(file_exists($pname . '/a'));
var_dump(file_exists($pname . '/a/x'));
var_dump(file_exists($pname . '/a/b'));
var_dump(file_exists($pname . '/a/b/x'));
var_dump(file_exists($pname . '/a/c'));
var_dump(file_exists($pname . '/a/c/'.basename(__FILE__)));
var_dump(file_exists($pname . '/b'));
var_dump(file_exists($pname . '/b/x'));
var_dump(file_exists($pname . '/b/b'));
var_dump(file_exists($pname . '/b/b/x'));
var_dump(file_exists($pname . '/b/c'));
var_dump(file_exists($pname . '/b/c/'.basename(__FILE__)));
?>
<?php unlink(dirname(__FILE__) . '/' . basename(__FILE__, '.php') . '.phar.php'); ?>