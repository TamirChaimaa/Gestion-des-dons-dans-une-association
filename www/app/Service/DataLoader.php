<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

class DataLoader implements DataLoaderInterface
{
   
    public function load(string $filePath)
    {
        $productRepository = new ProductRepository();
    
        if (!file_exists($filePath)) {
            return ['Le fichier n\'existe pas.'];
        }
    
        $file = fopen($filePath, 'r');
        if (!$file) {
            return ['Impossible d\'ouvrir le fichier.'];
        }
    
        try {
            while (($data = fgetcsv($file, 0, ';')) !== false) {
                $product = new Product();
                $product->setName($data[0]);
                $product->setPrice((float) $data[1]); 
                $product->setStock((int) $data[2]);   
                $productRepository->save($product);
            }
    
            fclose($file);
    
    
    
            return true;
        } catch (\Exception $e) {
            return ['Une erreur est survenue lors du chargement du fichier.'];
        }
    }
    

}
