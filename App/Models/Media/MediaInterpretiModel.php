<?php

namespace App\Models\Media;

use App\Helpers\CommonFunctions;
use Core\Model;

use App\Persistence\Media\MediaInterpretiPersistence;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class MediaInterpretiModel extends Model{

    
    protected $id;
    protected $media_tipo;
    protected $catalogo_ds;
    protected $interprete_tipo;
    protected $interpreti;
    
    // GETTERS
    public function getId(){
        return $this->id;
    }    
    public function getMediaTipo(){
        return $this->media_tipo;
    }    
    public function getCatalogoDs(){
        return $this->catalogo_ds;
    }
    public function getInterpreteTipo(){
        return $this->interprete_tipo;
    }
    public function getInterpreti(){
        return $this->interpreti;
    }
    
    // SETTERS
    public function setId($value){
        $this->id = $value;
    }
    public function setMediaTipo($value){
        $this->media_tipo = $value;
    }    
    public function setCatalogoDs($value){
        $this->catalogo_ds = $value;
    }    
    public function setInterpreteTipo($value){
        $this->interprete_tipo = $value;
    }
    public function setInterpreti($value){
        $this->interpreti = $value;
    }
            
    public static function retrieveAllByCatalogoDS($media_tipo, $catalogo_ds){
        $models = array();        
        $results = MediaInterpretiPersistence::retrieveAllByCatalogoDS($media_tipo, $catalogo_ds);
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setMediaTipo($result['media_tipo']);
            $mymodel->setCatalogoDs($result['catalogo_ds']);
            $mymodel->setInterpreteTipo($result['interprete_tipo']);
            $mymodel->setInterpreti($result['interpreti']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
        
        return $models;
    }
    
}
