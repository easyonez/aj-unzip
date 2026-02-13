<?php

namespace AjUnzip;

class Unzipper {
    private array $Extractors = [];

    public function registerExtractor(string $extension, ExtractorInterface $Extractor): void {
        $this->Extractors[strtolower($extension)] = $Extractor;
    }

    public function run(string $filePath, string $destination): void {
        $fileName = basename($filePath);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        if (!isset($this->Extractors[$extension])) {
            echo "ERROR: format .$extension not supported\n";
            // throw new \Exception("ERROR: format .$extension not supported."); NEED TO SEE THIS BETTER
            return;
        }

        echo "LOADING: Starting extraction of $fileName in $destination\n";
        $success = $this->Extractors[$extension]->extract($filePath, $destination);

        if ($success) {
            echo "COMPLETE: Extraction completed with success in: $destination\n";
        } else {
            echo "ERROR: Problem during the extraction\n";
        }
    }
}
?>