<?php

namespace App\Repository;
use App\Entity\Don;
use App\Service\DatabaseConnection;

class DonRepository
{
    





    public function ajouterDon(Don $don): void
    {
        $db = DatabaseConnection::getInstance();
    
        $query = "INSERT INTO Don (nameDon, typedon,  donneur_id) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $don->getNomDon());
        $stmt->bindParam(2, $don->getTypeDon());
        $stmt->bindParam(3, $don->getIdDonneur());
        $stmt->execute();
    }
    public function afficherDons($donneurId): array
    {
        $db = DatabaseConnection::getInstance();
        $query = "SELECT * FROM Don WHERE donneur_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$donneurId]);
        $dons = $stmt->fetchAll();
    
        $result = [];
        foreach ($dons as $donData) {
            $don = new Don();
            $don->setIdDon($donData['id']);
            $don->setNomDon($donData['namedon']);
            $don->setTypeDon($donData['typedon']);
            $don->setIdDonneur($donData['donneur_id']);
            $result[] = $don;
        }
    
        return $result;
    }
    
    

    

    
}



    

