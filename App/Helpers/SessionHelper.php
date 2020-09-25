<?php

namespace App\Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\Session\SecurityModel;
/**
 * Description of SessionHelper
 *
 * @author Utente
 */
class SessionHelper {
    //put your code here
    
    public function __construct() {
        // called at new instance of SessionHelper() level
    }
    
    public static function init(){
        // called at index.php level
        
        if (is_null(static::pull("security.token"))){
            // if no security token available -> issue one and put it into session
            $security = new SecurityModel();
            static::push("security.token", $security->getToken());            
        }
        
    }
    
    public static function getSecurity(){
        $security = new SecurityModel(false);
        $security->setToken(static::pull("security.token"));
        return $security;
        
    }
        
    private static function pull($name) {
        $parsed = explode('.', $name);

        $result = $_SESSION;

        while ($parsed) {
            $next = array_shift($parsed);

            if (isset($result[$next])) {
                $result = $result[$next];
            } else {
                return null;
            }
        }

        return $result;
    }

    private static function push($name, $value) {
        $parsed = explode('.', $name);

        $session =& $_SESSION;

        while (count($parsed) > 1) {
            $next = array_shift($parsed);

            if ( ! isset($session[$next]) || ! is_array($session[$next])) {
                $session[$next] = [];
            }

            $session =& $session[$next];
        }

        $session[array_shift($parsed)] = $value;
    }
    
    
}    