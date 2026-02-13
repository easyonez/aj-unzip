<?php

namespace AjUnzip;

class Unzipper {
    private array $Extractors = [];

    public function registerExtractor(string $extension, ExtractorInterface $Extractor): void {
        $this->Extractors[strtolower($extension)] = $Extractor;
    }

    public function run(string $filePath): void {
        $fileName = basename($filePath);
        $destination = preg_replace('/\.[^.]+$/', '', $fileName);
        
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if (!isset($this->Extractors[$extension])) {
            throw new \Exception("ERROR: format .$extension not supported.");
        }

        echo "Starting with file extraction: $filePath...\n";
        $success = $this->Extractors[$extension]->extract($filePath, $destination);

        if ($success) {
            echo "Extraction completed with success in: $destination\n";
        } else {
            echo "ERROR: Problem during the extraction.\n";
        }
    }
}
?>