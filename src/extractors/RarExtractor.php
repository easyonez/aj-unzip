<?php

namespace AjUnzip\Extractors;
use AjUnzip\ExtractorInterface;

use Archive7z\Archive7z;

class RarExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        try {
            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }

            $archive = new Archive7z($source); //Archive7z can decompress rar files
            if (!$archive->isValid()) {
                return false;
            }
            $archive->setOutputDirectory($destination);
            $archive->extract();
            
            return true;
        } catch (\Exception $e) {
            echo "Errore rar: " . $e->getMessage() . "\n";
            return false;
        }
    }
}

?>