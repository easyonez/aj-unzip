#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use AjUnzip\Unzipper;
use AjUnzip\Extractors\ZipExtractor;
use AjUnzip\Extractors\GzExtractor;
use AjUnzip\Extractors\TarExtractor;
use AjUnzip\Extractors\SevenZipExtractor;

$app = new Unzipper();

$app->registerExtractor('zip', new ZipExtractor());
$app->registerExtractor('gz', new GzExtractor());
$app->registerExtractor('tar', new TarExtractor());
$app->registerExtractor('7z', new SevenZipExtractor());

$app->run($argv[1], './output');
?>
