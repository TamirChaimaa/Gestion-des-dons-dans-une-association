<?php
namespace App\Service;

class FileUploader implements FileUploaderInterface
{
    private const UPLOAD_DIR = '/var/www/html/public/products';
    private const ALLOWED_FILE_TYPES = ['text/csv'];
    private const MAX_FILE_SIZE = 4000000; // octets

    /**
     * {@inheritDoc}
     */
    public function upload(array $file) // $_FILE['name_input']
    {
        $errors = [];

        if (!\in_array($file['type'], self::ALLOWED_FILE_TYPES, true)) {
            $errors[] = [
                'code' => 0,
                'msg' => 'only '.\implode(',', self::ALLOWED_FILE_TYPES).' types allowed.',
            ];
        }

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $errors[] = [
                'code' => 1,
                'msg' => 'file size must be less than '.(self::MAX_FILE_SIZE / 1000 / 1000).' Mo.',
            ];
        }

        if (!empty($errors)) {
            return $errors;
        }

        try {
            \move_uploaded_file($file['tmp_name'], self::UPLOAD_DIR.'/'.$file['name']);

            return true;
        } catch (\Exception $exception) {
            return [
                'code' => 2,
                'msg' => $exception->getMessage(),
            ];
        }
    }
}
