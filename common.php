<?php
# make it easy to turn on/off debugging...
if (!defined('SITE_DEBUG')) define('SITE_DEBUG', 0);

# automatically load config.php...
require_once('config.php');

# add support for autoloading of classes...
if (!defined('CLASS_DIR')) define('CLASS_DIR', dirname(__FILE__).DIRECTORY_SEPARATOR.'class');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_extensions('.class.php');
spl_autoload_register();

# ensure that session_start() is always called first...
if (!isset($_SESSION)) session_start();

?>
