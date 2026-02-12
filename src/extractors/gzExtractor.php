<?php

namespace AjUnzip\Extractors;

use AjUnzip\ExtractorInterface;

class GzExtractor implements ExtractorInterface {
    public function extract(string $source, string $destination): bool {
        try {
            if (is_dir($destination)) {
                $outputFile = $destination . DIRECTORY_SEPARATOR . basename($source, '.gz');
            } else {
                $outputFile = $destination;
            }
    
            $gz = gzopen($source, 'rb');
            $out = fopen($outputFile, 'wb');

            if (!$gz || !$out) {
                return false;
            }
            while (!gzeof($gz)) {
                fwrite($out, gzread($gz, 4096));
            }
    
            gzclose($gz);
            fclose($out);
            return file_exists($outputFile);
        } catch (\Exception $e) {
            echo "Errore Gz: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>