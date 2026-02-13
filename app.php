#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php'; // Read the READ.ME to understand how to get it

use AjUnzip\Unzipper;
use AjUnzip\Extractors\ZipExtractor;
use AjUnzip\Extractors\GzExtractor;
use AjUnzip\Extractors\RarExtractor;
use AjUnzip\Extractors\TarExtractor;
use AjUnzip\Extractors\SevenZipExtractor;

$app = new Unzipper();

$app->registerExtractor('zip', new ZipExtractor());
$app->registerExtractor('gz', new GzExtractor());
$app->registerExtractor('tar', new TarExtractor());
$app->registerExtractor('7z', new SevenZipExtractor());
$app->registerExtractor('rar', new RarExtractor());

$app->run($argv[1], './output');
?>
