<?php

namespace App\Controller;

use App\Views\ViewManager;
use App\Repository\DonneurRepository;
use App\Entity\Donneur ;
class DonneurController
{

    /**
     * Render home page.
     */
    final public function pagedonneur(): void
    {
        
        ViewManager::renderView(
            'AjoutDonneur/ajoutdonneur.php',
        );
    }
    final public function adddonneur(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $namedonneur = $_POST["donorName"];
            $numtelephone = $_POST["phoneNumber"];
            $donneur = new Donneur();
            $donneur->setNomDonneur( $namedonneur);
            $donneur->setNumTelephone($numtelephone);
           $donneurRepository=new DonneurRepository();
            $success = $donneurRepository->addDonneur($donneur);
            ViewManager::renderView(
                'home/home.php'
            );
        }
    }
    
}