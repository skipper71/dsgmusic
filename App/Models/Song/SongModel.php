<?php

namespace App\Models\Song;

use App\Helpers\CommonFunctions;
use Core\Model;

use App\Persistence\SongPersistence;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class SongModel extends Model{

    protected $id;
    protected $title;
    protected $filename;
    protected $comments;
    protected $categories;

    // GETTERS
    public function getId(){
        return $this->id;
    }    
    public function getTitle(){
        return $this->title;
    }
    public function getFilename(){
        return $this->filename;
    }
    public function getComments(){
        return $this->comments;
    }
    public function getCategories(){
        return $this->categories;
    }
    
    // SETTERS
    public function setId($value){
        $this->id = $value;
    }
    public function setTitle($value){
        $this->title = $value;
    }    
    public function setFilename($value){
        $this->filename = $value;
    }    
    public function setComments($value){
        $this->comments = $value;
    }
    public function setCategories($value){
        $this->categories = $value;
    }
    
    // FUNCTIONS
    public static function retrieveAll(){
        $models = [];
        $results = SongPersistence::retrieveAll();
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setTitle($result['title']);
            $mymodel->setFilename($result['filename']);
            $mymodel->setComments($result['comments']);
            $mymodel->setCategories($result['categories']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
    
    public static function retrieveCategory($category_id){
        $models = [];
        $results = SongPersistence::retrieveCategory($category_id);
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setTitle($result['title']);
            $mymodel->setFilename($result['filename']);
            $mymodel->setComments($result['comments']);
            $mymodel->setCategories($result['categories']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        
        return $models;
    }
    
    public static function retrieveOne($song_id){
        $model = false;        
        $results = SongPersistence::retrieveOne($song_id);
        
        foreach ($results as $result) {
            $mymodel = new static();            
            $mymodel->setId($result['id']);
            $mymodel->setTitle($result['title']);
            $mymodel->setFilename($result['filename']);
            $mymodel->setComments($result['comments']);
            $mymodel->setCategories($result['categories']);
            
            $models[$mymodel->getId()] = $mymodel;
        }
        // reset() gives you the first value of the array if you have an element inside the array:
        // It also gives you FALSE in case the array is empty.
        // See : https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
        
        $model = reset($models);
        
        return $model;
    }
    
}
