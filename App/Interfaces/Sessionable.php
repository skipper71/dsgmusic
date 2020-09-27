<?php

namespace App\Interfaces;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Utente
 */
interface Sessionable {
    //put your code here
    public function modelToArray($prefix = '');
    public function arrayToModel($array, $prefix = '');
    
}
