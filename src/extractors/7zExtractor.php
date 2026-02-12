<?php

namespace AjUnzip\Extractors;
use AjUnzip\ExtractorInterface;

use Archive7z\Archive7z;

class SevenZipExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        try {
            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }

            $archive = new Archive7z($source);
            if (!$archive->isValid()) {
                return false;
            }
            $archive->setOutputDirectory($destination);
            $archive->extract();
            
            return true;
        } catch (\Exception $e) {
            echo "Errore 7z: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>