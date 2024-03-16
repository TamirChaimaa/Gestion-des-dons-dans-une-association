<?php

namespace app\Entity;

class Don {

    private $idDon;
    private $nomDon;
    private $typeDon;
    private $donneur;

    public function getIdDon() {
        return $this->idDon;
    }

    public function setIdDon($idDon): void {
        $this->idDon = $idDon;
    }

    public function getNomDon() {
        return $this->nomDon;
    }

    public function setNomDon($nomDon): void {
        $this->nomDon = $nomDon;
    }

    public function getTypeDon() {
        return $this->typeDon;
    }

    public function setTypeDon($typeDon): void {
        $this->typeDon = $typeDon;
    }

    public function getIdDonneur() {
        return $this->donneur;
    }

    public function setIdDonneur($donneur): void {
        $this->donneur = $donneur;
    }
}
