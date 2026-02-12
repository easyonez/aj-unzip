<?php

namespace AjUnzip;

class Unzipper {
    private array $Extractors = [];

    public function registerExtractor(string $extension, ExtractorInterface $Extractor): void {
        $this->Extractors[strtolower($extension)] = $Extractor;
    }

    public function run(string $filePath, string $destination): void {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if (!isset($this->Extractors[$extension])) {
            throw new \Exception("Errore: Formato .$extension non supportato.");
        }

        echo "Inizio estrazione file: $filePath...\n";
        
        $success = $this->Extractors[$extension]->extract($filePath, $destination);

        if ($success) {
            echo "Estrazione completata con successo in: $destination\n";
        } else {
            echo "Si è verificato un errore durante l'estrazione.\n";
        }
    }
}
?>