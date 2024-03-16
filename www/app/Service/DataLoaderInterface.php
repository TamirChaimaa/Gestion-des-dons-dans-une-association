<?php

namespace App\Service;

interface DataLoaderInterface
{
    /**
     * Load data identified by given file path to dedicated storage (example a database)
     *
     * @param string $filePath path to file to load.
     *
     * @return array|true true if store file data success, array of errors otherwise
     */
    public function load(string $filePath);
}

