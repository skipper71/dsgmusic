<?php

namespace App\Models\Session;

use App\Helpers\CommonFunctions;
use App\Interfaces\Sessionable;
use Core\Model;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class SecurityModel extends Model implements Sessionable{

    const SECURITY_TOKEN_STRENGTH = 24;
    const SESSION_PREFIX = "security.";
    
    private $token;
    
    public function getToken(){
        return $this->token;
    }
    public function setToken($token){
        $this->token = $token;
    }

    public function __construct($init = true) {
        if ($init){
            $this->init();
        }
    }
    
    public function init() {
        $this->token = CommonFunctions::newToken(self::SECURITY_TOKEN_STRENGTH);
    }

    public function arrayToModel($array, $prefix = '') {
        if (is_array($array)) {
            if (isset($array[$prefix.'token'])){
                $this->token = $array[$prefix.'token'];
            }
        }        
    }

    public function modelToArray($prefix = '') {
        $array = [];
        
        $array[$prefix.'token'] = $this->getToken();
        
        return $array;
        
    }

}
