<?php

namespace App\Models\News;

use App\Helpers\CommonFunctions;
use Core\Model;

use App\Persistence\News\NewsPersistence;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class NewsModel extends Model{

    protected $id;
    protected $categoria;
    protected $titolo;
    protected $autore;
    protected $url_immagine;
    protected $location;
    protected $data;
    protected $ora_inizio;
    protected $ora_fine;
    protected $contenuto;    
    
    // GETTERS
    public function getId(){
        return $this->id;
    }    
    public function getCategoria(){
        return $this->categoria;
    }
    public function getTitolo(){
        return $this->titolo;
    }
    public function getAutore(){
        return $this->autore;
    }
    public function getUrlImmagine(){
        return $this->url_immagine;
    }
    public function getLocation(){
        return $this->location;
    }
    public function getData(){
        return $this->data;
    }
    public function getOraInizio(){
        return $this->ora_inizio;
    }
    public function getOraFine(){
        return $this->ora_fine;
    }
    public function getContenuto(){
        return $this->contenuto;
    }
    
    // SETTERS
    public function setId($value){
        $this->id = $value;
    }
    public function setCategoria($value){
        $this->categoria = $value;
    }    
    public function setTitolo($value){
        $this->titolo = $value;
    }    
    public function setAutore($value){
        $this->autore = $value;
    }
    public function setUrlImmagine($value){
        $this->url_immagine = $value;
    }
    public function setLocation($value){
        $this->location = $value;
    }
    public function setData($value){
        $this->data = $value;
    }
    public function setOraInizio($value){
        $this->ora_inizio = $value;
    }
    public function setOraFine($value){
        $this->ora_fine = $value;
    }
    public function setContenuto($value){
        $this->contenuto = $value;
    }
    
    // FUNCTIONS
    public static function retrieveAll(){
        $models = [];        
        $results = NewsPersistence::retrieveAll();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            
            $mymodel->setId($result['id']);
            $mymodel->setCategoria($result['categoria']);
            $mymodel->setTitolo($result['titolo']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            $mymodel->setLocation($result['location']);
            $mymodel->setData($result['data']);
            $mymodel->setOraInizio($result['ora_inizio']);
            $mymodel->setOraFine($result['ora_fine']);
            $mymodel->setContenuto($result['contenuto']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
        
    public static function retrieveOne($id){
        $model = false;        
        $results = NewsPersistence::retrieveOne($id);
        
        foreach ($results as $result) {
            $mymodel = new static();            

            $mymodel->setId($result['id']);
            $mymodel->setCategoria($result['categoria']);
            $mymodel->setTitolo($result['titolo']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            $mymodel->setLocation($result['location']);
            $mymodel->setData($result['data']);
            $mymodel->setOraInizio($result['ora_inizio']);
            $mymodel->setOraFine($result['ora_fine']);
            $mymodel->setContenuto($result['contenuto']);
            
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
        $results = NewsPersistence::retrieveOldest3();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            
            $mymodel->setId($result['id']);
            $mymodel->setCategoria($result['categoria']);
            $mymodel->setTitolo($result['titolo']);
            $mymodel->setAutore($result['autore']);
            $mymodel->setUrlImmagine($result['url_immagine']);
            $mymodel->setLocation($result['location']);
            $mymodel->setData($result['data']);
            $mymodel->setOraInizio($result['ora_inizio']);
            $mymodel->setOraFine($result['ora_fine']);
            $mymodel->setContenuto($result['contenuto']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
        
}
