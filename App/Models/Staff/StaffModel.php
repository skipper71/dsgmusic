<?php

namespace App\Models\Staff;

use App\Helpers\CommonFunctions;
use Core\Model;

use App\Persistence\Staff\StaffPersistence;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class StaffModel extends Model{

    protected $id;
    protected $nome;
    protected $incarico;
    protected $link_linkedin;
    protected $link_facebook;
    protected $link_twitter;
    protected $link_skype;
    protected $link_instagram;
    protected $descrizione;
    protected $url_immagine;    
    
    // GETTERS
    public function getId(){
        return $this->id;
    }    
    public function getNome(){
        return $this->nome;
    }
    public function getIncarico(){
        return $this->incarico;
    }
    public function getLinkLinkedin(){
        return $this->link_linkedin;
    }
    public function getLinkFacebook(){
        return $this->link_facebook;
    }
    public function getLinkTwitter(){
        return $this->link_twitter;
    }
    public function getLinkSkype(){
        return $this->link_skype;
    }
    public function getLinkInstagram(){
        return $this->link_instagram;
    }
    public function getDescrizione(){
        return $this->descrizione;
    }
    public function getUrlImmagine(){
        return $this->url_immagine;
    }
    
    // SETTERS
    public function setId($value){
        $this->id = $value;
    }
    public function setNome($value){
        $this->nome = $value;
    }    
    public function setIncarico($value){
        $this->incarico = $value;
    }    
    public function setLinkLinkedin($value){
        $this->link_linkedin = $value;
    }
    public function setLinkFacebook($value){
        $this->link_facebook = $value;
    }
    public function setLinkTwitter($value){
        $this->link_twitter = $value;
    }
    public function setLinkSkype($value){
        $this->link_skype = $value;
    }
    public function setLinkInstagram($value){
        $this->link_instagram = $value;
    }
    public function setDescrizione($value){
        $this->descrizione = $value;
    }
    public function setUrlImmagine($value){
        $this->url_immagine = $value;
    }
    
    // FUNCTIONS
    public static function retrieveAll(){
        $models = [];        
        $results = StaffPersistence::retrieveAll();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            
            $mymodel->setId($result['id']);
            $mymodel->setNome($result['nome']);
            $mymodel->setIncarico($result['incarico']);
            $mymodel->setLinkLinkedin($result['link_linkedin']);
            $mymodel->setLinkFacebook($result['link_facebook']);
            $mymodel->setLinkTwitter($result['link_twitter']);
            $mymodel->setLinkSkype($result['link_skype']);
            $mymodel->setLinkInstagram($result['link_instagram']);
            $mymodel->setDescrizione($result['descrizione']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
        
    public static function retrieveOne($id){
        $model = false;        
        $results = StaffPersistence::retrieveOne($id);
        
        foreach ($results as $result) {
            $mymodel = new static();
            
            $mymodel->setId($result['id']);
            $mymodel->setNome($result['nome']);
            $mymodel->setIncarico($result['incarico']);
            $mymodel->setLinkLinkedin($result['link_linkedin']);
            $mymodel->setLinkFacebook($result['link_facebook']);
            $mymodel->setLinkTwitter($result['link_twitter']);
            $mymodel->setLinkSkype($result['link_skype']);
            $mymodel->setLinkInstagram($result['link_instagram']);
            $mymodel->setDescrizione($result['descrizione']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
        
        $model = reset($models);
        
        return $model;
    }
    
    public static function retrieveOldest3(){
        $models = [];        
        $results = StaffPersistence::retrieveOldest3();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            
            $mymodel->setId($result['id']);
            $mymodel->setNome($result['nome']);
            $mymodel->setIncarico($result['incarico']);
            $mymodel->setLinkLinkedin($result['link_linkedin']);
            $mymodel->setLinkFacebook($result['link_facebook']);
            $mymodel->setLinkTwitter($result['link_twitter']);
            $mymodel->setLinkSkype($result['link_skype']);
            $mymodel->setLinkInstagram($result['link_instagram']);
            $mymodel->setDescrizione($result['descrizione']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
    
}
