<?php

namespace AjUnzip\Extractors;

use AjUnzip\Extractors\ExternalExtractor;
use AjUnzip\ExtractorInterface;

class SevenZipExtractor extends ExternalExtractor {
    protected function getCommand(string $source, string $destination): string {
        return sprintf('7z x "%s" -o "%s" -y', $source, $destination);
    }
    protected function getBinaryName(): string {
        return "7z";
    }
    protected function getFormat(): string {
        return "7z";
    }
}
?>