<?php

namespace AjUnzip;

interface ExtractorInterface {
    /**
     * @param string $source Percorso del file compresso
     * @param string $destination Cartella di destinazione
     * @return bool Ritorna true se l'operazione ha successo
     */
    public function extract(string $source, string $destination): bool;
}
?>