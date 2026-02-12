<?php

namespace AjUnzip\Extractors;

use AjUnzip\ExtractorInterface;
use PharData;
use Exception;

class TarExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        try {
            $archive = new PharData($source);
            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }
            $archive->extractTo($destination, null, true);
            return true;
        } catch (Exception $e) {
            echo "Errore tar: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>
