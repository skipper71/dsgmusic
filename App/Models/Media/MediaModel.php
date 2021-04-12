<?php

namespace App\Models\Media;

use App\Helpers\CommonFunctions;
use Core\Model;

use App\Persistence\Media\MediaPersistence;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class MediaModel extends Model{

    protected $id;
    protected $media_tipo;
    protected $catalogo_ds;
    protected $autore;
    protected $opera;
    protected $etichetta;
    protected $anno;
    protected $note;    
    
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
    public function getAutore(){
        return $this->autore;
    }
    public function getOpera(){
        return $this->opera;
    }
    public function getEtichetta(){
        return $this->etichetta;
    }
    public function getAnno(){
        return $this->anno;
    }
    public function getNote(){
        return $this->note;
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
    public function setAutore($value){
        $this->autore = $value;
    }
    public function setOpera($value){
        $this->opera = $value;
    }
    public function setEtichetta($value){
        $this->etichetta = $value;
    }
    public function setAnno($value){
        $this->anno = $value;
    }
    public function setNote($value){
        $this->note = $value;
    }
    
    // FUNCTIONS
    public static function retrieveAll(){
        $models = [];        
        $results = MediaPersistence::retrieveAll();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            
            $mymodel->setId($result['id']);
            $mymodel->setMediaTipo($result['media_tipo']);
            $mymodel->setCatalogoDs($result['catalogo_ds']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setOpera($result['opera']);
            $mymodel->setEtichetta($result['etichetta']);
            $mymodel->setAnno($result['anno']);
            $mymodel->setNote($result['note']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
        
    public static function retrieveOne($id){
        $model = false;        
        $results = MediaPersistence::retrieveOne($id);
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setMediaTipo($result['media_tipo']);
            $mymodel->setCatalogoDs($result['catalogo_ds']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setOpera($result['opera']);
            $mymodel->setEtichetta($result['etichetta']);
            $mymodel->setAnno($result['anno']);
            $mymodel->setNote($result['note']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
        
        $model = reset($models);
        
        return $model;
    }

    public static function retrieveRandom(){
        $model = false;        
        $results = MediaPersistence::retrieveRandom();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setMediaTipo($result['media_tipo']);
            $mymodel->setCatalogoDs($result['catalogo_ds']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setOpera($result['opera']);
            $mymodel->setEtichetta($result['etichetta']);
            $mymodel->setAnno($result['anno']);
            $mymodel->setNote($result['note']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
        
        $model = reset($models);
        
        return $model;
    }
    
    public static function retrieveSimpleSearch($searchkey){

        $models = [];        
        $results = MediaPersistence::retrieveSimpleSearch($searchkey);
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setMediaTipo($result['media_tipo']);
            $mymodel->setCatalogoDs($result['catalogo_ds']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setOpera($result['opera']);
            $mymodel->setEtichetta($result['etichetta']);
            $mymodel->setAnno($result['anno']);
            $mymodel->setNote($result['note']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
                
        return $models;
    }
    
}
