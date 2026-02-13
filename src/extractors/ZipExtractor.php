<?php

namespace AjUnzip\Extractors;

use AjUnzip\ExtractorInterface;
use ZipArchive;
use Exception;

class ZipExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        try {
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
        catch (\Exception $e) {
            echo "ERROR zip: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>
