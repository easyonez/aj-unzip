<?php

namespace AjUnzip;

interface ExtractorInterface {
    /**
     * @param string $source Compressed file path
     * @param string $destination Destination folder
     * @return bool Return true if success
     */
    public function extract(string $source, string $destination): bool;
}
?>