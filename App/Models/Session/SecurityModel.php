<?php

namespace App\Models\Session;

use App\Helpers\CommonFunctions;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class SecurityModel extends \Core\Model {

    const SECURITY_TOKEN_STRENGTH = 24;
    
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
    
}
