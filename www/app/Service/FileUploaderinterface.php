<?php

namespace App\Service;

interface FileUploaderInterface
{
    /**
     * Handle upload file to directory process.
     *
     * @param array $file representation of client front side $_FILE['input_file_name']
     *
     * @return array|true true if uploading file success, array of errors otherwise
     */
    public function upload(array $file);
}

