<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/bootstrap.php';

$_SERVER['PHP_SELF'] = '/';


if (isset($_ENV['CAKE_ENV'])) { // このif文を追加
    Configure::load('app_' . $_ENV['CAKE_ENV'], 'default'); // このif文を追加
}