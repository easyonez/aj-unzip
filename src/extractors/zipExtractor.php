<?php

namespace AjUnzip\Extractors;

use AjUnzip\ExtractorInterface;
use ZipArchive;

class ZipExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        $zip = new ZipArchive();
        
        if ($zip->open($source) === TRUE) {
            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }
            
            $result = $zip->extractTo($destination);
            $zip->close();
            return $result;
        }
        
        return false;
    }
}
?>