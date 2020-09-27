<?php

namespace App\Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\Session\SecurityModel;
use App\Models\Session\GoogleUserModel;
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
        // $security->setToken(static::pull("security.token"));
        $array =[];
        foreach ($security->modelToArray(SecurityModel::SESSION_PREFIX) as $key =>$value){
            // need this loop just to loop the model properties
            $array[$key]=static::pull($key);
        }
        $security->arrayToModel($array, SecurityModel::SESSION_PREFIX);
        return $security;        
    }
    public static function setSecurity(SecurityModel $security){
        foreach ($security->modelToArray(SecurityModel::SESSION_PREFIX) as $key =>$value){            
            static::push($key, $value);
        }
    }
    public static function renewSecurityToken(){
        // called at Controller level, when needed
        $security = new SecurityModel();
        //static::push("security.token", $security->getToken());            
        static::setSecurity($security);
        
    }
    public static function getGoogleUser(){
        $googleUser = new GoogleUserModel();
        $array =[];
        foreach ($googleUser->modelToArray(GoogleUserModel::SESSION_PREFIX) as $key =>$value){
            // need this loop just to loop the model properties
            $array[$key]=static::pull($key);
        }
        $googleUser->arrayToModel($array, GoogleUserModel::SESSION_PREFIX);
        return $googleUser;
    }
    public static function setGoogleUser(GoogleUserModel $googleUser){
        foreach ($googleUser->modelToArray(GoogleUserModel::SESSION_PREFIX) as $key =>$value){            
            static::push($key, $value);
        }
    }
    public static function logoutGoogleUser(){
        $googleUser = new GoogleUserModel();
        static::setGoogleUser($googleUser);
    }
    
    
    /*
     * 
     */
    
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