<?php

namespace App\Repository;
use App\Entity\Donneur;
use App\Service\DatabaseConnection;

class DonneurRepository
{
    public function addDonneur(Donneur $donneur): bool
    {
        $db = DatabaseConnection::getInstance();
    
        $query = "INSERT INTO Donneur (namedonneur, numtelephone) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $namedonneur = $donneur->getNomDonneur();
        $numtelephone = $donneur->getNumTelephone();
        $stmt->bindParam(1, $namedonneur);
        $stmt->bindParam(2, $numtelephone);
        return $stmt->execute();
    }
    public function getAllDonneurs(): array
    {
        $db = DatabaseConnection::getInstance();
        $query = "SELECT id, namedonneur, numtelephone FROM Donneur";
        $stmt = $db->query($query);
        $donnees = $stmt->fetchAll();
    
        $result = [];
        foreach ($donnees as $donneurData) {
            $donneur = new Donneur();
            $donneur->setIdDonneur($donneurData['id']);
            if ($donneurData['namedonneur'] !== null) {
                $donneur->setNomDonneur($donneurData['namedonneur']);
            }
            $donneur->setNumTelephone($donneurData['numtelephone']);
            $result[] = $donneur;
        }
    
        return $result;
    }
    
    
    
    


    
}
