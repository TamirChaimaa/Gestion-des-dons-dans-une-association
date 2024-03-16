<?php

namespace app\Entity;

class Donneur {

    private $idDonneur;
    private $nomDonneur;
    private $numTelephone;

    public function getIdDonneur() {
        return $this->idDonneur;
    }

    public function setIdDonneur($idDonneur): void {
        $this->idDonneur = $idDonneur;
    }

    public function getNomDonneur() {
        return $this->nomDonneur;
    }

    public function setNomDonneur($nomDonneur): void {
        $this->nomDonneur = $nomDonneur;
    }

    public function getNumTelephone() {
        return $this->numTelephone;
    }

    public function setNumTelephone($numTelephone): void {
        $this->numTelephone = $numTelephone;
    }
}
