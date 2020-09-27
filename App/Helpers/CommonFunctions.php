<?php

namespace App\Helpers;

use App\Config;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonFunctions
 *
 * @author Utente
 */
class CommonFunctions {
    //put your code here
    
    const TOKEN_STRENGTH = 16;
    const NEW_LINE = "\n";
    
    public static function newToken($strength = self::TOKEN_STRENGTH) {

        try {
            // php 7
            $token = bin2hex(random_bytes($strength));            
        } catch (Exception $e){
            // php previous versions
            $token = bin2hex(openssl_random_pseudo_bytes($strength));            
        }
        
        return $token;
    }
    public static function writeLog($text, $prefix = ''){
        $logfile = Config::LOGS_DIR . '/' . ($prefix == '' ? '' : $prefix.'-' ) . date('Y-m-d') . '.log';
        
        $fp = fopen($logfile, 'a');
        fwrite($fp, $text.self::NEW_LINE);                
        fclose($fp);        
    }
}
