<?php

namespace App\Controller;

use App\Views\ViewManager;
use App\Repository\DonneurRepository;
use App\Repository\DonRepository;
class HomeController
{

    /**
     * Render home page.
     */
    final public function homeAction(): void
    {
        $donneurRepository = new DonneurRepository();
        $donneurs = $donneurRepository->getAllDonneurs();
    
        ViewManager::renderView(
            'home/home.php',
            ['donneurs' => $donneurs]
        );
    }
    public function afficherDons(): void
    {
        $donneurId = $_POST['donorId'] ?? null;
        $donRepository = new DonRepository();
        $donneurRepository = new DonneurRepository();
        $donneurs = $donneurRepository->getAllDonneurs();
        if ($donneurId !== null) {
            $dons = $donRepository->afficherDons($donneurId);
        }
    
        ViewManager::renderView(
            'home/home.php',
            ['dons' => $dons],
            ['donneurs' => $donneurs]
        );
    }
    
    
}