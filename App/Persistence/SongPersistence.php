<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Persistence;

use PDO;
use Core\Persistence;
use App\Config;

/**
 * Description of SongPersistence
 *
 * @author Utente
 */
class SongPersistence extends Persistence {
    //put your code here
    
    CONST SONGS = [
        [
            'id' => 1,
            'title' => 'Liberi Liberi',
            'filename' => 'vasco.mp3',
            'comments' => 'Note sul brano di Vasco',
            'categories' => 'Rock,Pop,90s',
        ],
        [
            'id' => 2,
            'title' => "L'isola che non c'è",
            'filename' => 'edo.mp3',
            'comments' => 'Note sul brano di Bennato',
            'categories' => 'Rock,Pop,80s',
        ],
    ];
    
    public static function retrieveAll() {
        
        $results = [];
        
        foreach (self::SONGS as $song){
            $results[] = $song;
        }
        
        return $results;
    }
    
    public static function retrieveCategory($category_id){
        $results = [];

        foreach (self::SONGS as $song){
            $my_categories = explode(',', $song['categories']);
            if (in_array($category_id, $my_categories)) {
                $results[] = $song;
            }
        }
        
        return $results;
    }

    public static function retrieveOne($song_id){
        $results = [];

        foreach (self::SONGS as $song){
            if ($song['id']==$song_id) {
                $results[] = $song;
            }
        }
        
        return $results;
    }

    public static function retrieveAll_next() {
        
        $results = null;
        
        try {
            $db = static::getDB();
            $query = self::getMainQuery();

            $stmt = $db->query($query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
        
        return $results;
        
    }

    private static function getMainQuery() {
        
        $table_prefix = Config::DB_TABLE_PREFIX;
        
        $mainQuery = <<< SQL
            SELECT 
                *
            FROM 
                $table_prefix.'songs'
SQL;
     
        return $mainQuery;
    }
                
    
}
