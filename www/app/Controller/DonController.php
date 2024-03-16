<?php

namespace App\Controller;

use App\Views\ViewManager;
use App\Repository\DonneurRepository;
use App\Repository\DonRepository;
use App\Entity\Don;

class DonController
{

    /**
     * Render home page.
     */
    public function pagedon(): void
    {
        $donneurRepository = new DonneurRepository();
        $donneurs = $donneurRepository->getAllDonneurs();
    
        ViewManager::renderView(
            'AjouDon/ajoutdon.php',
            ['donneurs' => $donneurs]
        );
    }
    public function adddon(): void
{
    $don = new DonRepository();
    $donneurs = $donneurRepository->getAllDonneurs();

    ViewManager::renderView(
        'AjouDon/ajoutdon.php',
        ['donneurs' => $donneurs]
    );
}


    
    
  

  
    
}