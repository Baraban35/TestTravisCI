<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employe
 *
 * @author baraban
 */
class Employe {
    //put your code here
    private $nom;
    private $salaire;
    /**
     * Instancie un employé
     * @param string $unNom
     * @param double $unSalaire
     */
    public function __construct($unNom, $unSalaire) {
        $this->nom = $unNom;
        $this->salaire = $unSalaire;
    }
    /**
     * Augmente le salaire de l'employé courant de $taux pourcent
     * @param double $taux 
     */
    public function augmenteSalaire($taux=0.05) {
        $this->salaire *= (1+$taux);
    }
}
