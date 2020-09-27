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
class GoogleUserModel extends Model implements Sessionable {

    const SESSION_PREFIX = "google_user.";
    
    private $token_id = null;
    private $iss = null;
    private $azp = null;
    private $aud = null;
    private $sub = null;
    private $hd = null;                // only avalilable, when GSuite Domain User
    private $email = null;
    private $email_verified = null;
    private $at_hash = null;
    private $name = null;
    private $picture = null;
    private $given_name = null;
    private $family_name = null;
    private $locale = null;
    private $iat = null;
    private $exp = null;
    private $jti = null;
   
    /*
    hd => dsgenova.com
    email => miguel.garcia@dsgenova.com
    email_verified => 1
    name => Miguel Garcia
    picture => https://lh3.googleusercontent.com/a-/AOh14GiKfHDDY9pqbZsKZhLfchLbGxN_ApMeJWUzNIsL=s96-c
    given_name => Miguel
    family_name => Garcia
    locale => it
     * 
     */
    
    
    public function getTokenId(){
        return $this->token_id;
    }
    public function getIss(){
        return $this->iss;
    }
    public function getAzp(){
        return $this->azp;
    }
    public function getAud(){
        return $this->aud;
    }
    public function getSub(){
        return $this->sub;
    }
    public function getHd(){
        return $this->hd;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEmailVerified(){
        return $this->email_verified;
    }
    public function getAtHash(){
        return $this->at_hash;
    }
    public function getName(){
        return $this->name;
    }
    public function getPicture(){
        return $this->picture;
    }
    public function getGivenName(){
        return $this->given_name;
    }
    public function getFamilyName(){
        return $this->family_name;
    }
    public function getLocale(){
        return $this->locale;
    }
    public function getIat(){
        return $this->iat;
    }
    public function getExp(){
        return $this->exp;
    }
    public function getJti(){
        return $this->jti;
    }
    
    public function loadGooglePayload($google_payload) {
        return $this->arrayToModel($google_payload);
    }

    public function modelToArray($prefix = '') {
        
        $array = [];
        $array[$prefix.'token_id'] = $this->getTokenId();
        $array[$prefix.'iss'] = $this->getIss();
        $array[$prefix.'azp'] = $this->getAzp();
        $array[$prefix.'aud'] = $this->getAud();
        $array[$prefix.'sub'] = $this->getSub();
        $array[$prefix.'hd'] = $this->getHd();
        $array[$prefix.'email'] = $this->getEmail();
        $array[$prefix.'email_verified'] = $this->getEmailVerified();
        $array[$prefix.'at_hash'] = $this->getAtHash();
        $array[$prefix.'name'] = $this->getName();
        $array[$prefix.'picture'] = $this->getPicture();
        $array[$prefix.'given_name'] = $this->getGivenName();
        $array[$prefix.'family_name'] = $this->getFamilyName();
        $array[$prefix.'locale'] = $this->getLocale();
        $array[$prefix.'iat'] = $this->getIat();
        $array[$prefix.'exp'] = $this->getExp();
        $array[$prefix.'jti'] = $this->getJti();
        
        return $array;
    }
    
    public function arrayToModel($array, $prefix = '') {
        if (is_array($array)) {
            if (isset($array[$prefix.'token_id'])){
                $this->token_id = $array[$prefix.'token_id'];
            }
            if (isset($array[$prefix.'iss'])){
                $this->iss = $array[$prefix.'iss'];
            }
            if (isset($array[$prefix.'azp'])){
                $this->azp = $array[$prefix.'azp'];
            }
            if (isset($array[$prefix.'aud'])){
                $this->aud = $array[$prefix.'aud'];
            }
            if (isset($array[$prefix.'sub'])){
                $this->sub = $array[$prefix.'sub'];
            }
            if (isset($array[$prefix.'hd'])){
                $this->hd = $array[$prefix.'hd'];
            }
            if (isset($array[$prefix.'email'])){
                $this->email = $array[$prefix.'email'];
            }
            if (isset($array[$prefix.'email_verified'])){
                $this->email_verified = $array[$prefix.'email_verified'];
            }
            if (isset($array[$prefix.'at_hash'])){
                $this->at_hash = $array[$prefix.'at_hash'];
            }
            if (isset($array[$prefix.'name'])){
                $this->name = $array[$prefix.'name'];
            }
            if (isset($array[$prefix.'picture'])){
                $this->picture = $array[$prefix.'picture'];
            }
            if (isset($array[$prefix.'given_name'])){
                $this->given_name = $array[$prefix.'given_name'];
            }
            if (isset($array[$prefix.'family_name'])){
                $this->family_name = $array[$prefix.'family_name'];
            }
            if (isset($array[$prefix.'locale'])){
                $this->locale = $array[$prefix.'locale'];
            }
            if (isset($array[$prefix.'iat'])){
                $this->iat = $array[$prefix.'iat'];
            }
            if (isset($array[$prefix.'exp'])){
                $this->exp = $array[$prefix.'exp'];
            }
            if (isset($array[$prefix.'jti'])){
                $this->jti = $array[$prefix.'jti'];
            }
        }        
        
    }
    
}
