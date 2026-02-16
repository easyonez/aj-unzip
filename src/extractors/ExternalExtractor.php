<?php
namespace AjUnzip\Extractors;
use AjUnzip\ExtractorInterface;

use Archive7z\Archive7z;
use Exception;

abstract class ExternalExtractor implements ExtractorInterface {

    abstract protected function getCommand(string $source, string $destination): string;
    abstract protected function getBinaryName(): string;
    abstract protected function getFormat(): string;

    protected function checkBinary(): void {
    $binary = $this->getBinaryName();
        $whereCommand = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'where' : 'which';
        exec("$whereCommand $binary", $output, $returnCode);
        if ($returnCode !== 0) {
            echo "ERRORE: The format requires the 'utility '$binary' \nPlease, install it or add it to the system's PATH\n";
            // throw new \Exception(
            //     "ERRORE: The format requires the 'utility '$binary' \n" .
            //     "Please, install it or add it to the system's PATH\n"
            // );
        }
    }

    public function extract(string $source, string $destination): bool {
            $this->checkBinary();
            try {
                if (!is_dir($destination)) {
                    mkdir($destination, 0777, true);
                }
    
                $command = $this->getCommand($source, $destination);
                exec($command, $output, $returnCode);
    
                return $returnCode === 0;
            } catch (\Exception $e) {
                echo "ERROR: " . $this->getFormat() . ": " . $e->getMessage() . "\n";
                return false;
            }
        }
    

}
?>