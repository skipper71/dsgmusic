<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Persistence\Staff;

use PDO;
use Core\Persistence;
use App\Config;

use App\Helpers\CommonFunctions;

/**
 * Description of SongPersistence
 *
 * @author Utente
 */
class StaffPersistence extends Persistence {
    //put your code here
        
    public static function retrieveAll() {
        
        $results = [];
        
        try {
            $db = static::getDB();
            $query = self::getMainQuery();

            $stmt = $db->query($query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            CommonFunctions::writeLog("Error : ".$e->getMessage());
            echo $e->getMessage();
        }
                    
        return $results;
        
    }
    
    public static function retrieveOne($id){
        $results = [];

        try {
            $db = static::getDB();
            $query = self::getMainQuery("id = :id");

            // $stmt = $db->query($query);                  // SQL statico
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // SQL statico
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $results = $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        return $results;
    }

    public static function retrieveSimpleSearch($searchkey){
        $results = [];

        try {
            $db = static::getDB();
            // $query = self::getMainQuery("id = :id");
            $table_prefix = Config::DB_TABLE_PREFIX;

            $searchkey = strtoupper($searchkey);
            
            $query = <<< SQL
                SELECT 
                    *
                FROM 
                    dsgm_media                
                WHERE
                    UPPER(autore) LIKE :key_autore
                OR
                    UPPER(opera) LIKE :key_opera
                OR
                    UPPER(etichetta) LIKE :key_etichetta            
SQL;
            

            // $stmt = $db->query($query);                  // SQL statico
            $stmt = $db->prepare($query);
            $stmt->bindValue(':key_autore', '%'.$searchkey.'%', PDO::PARAM_STR);
            $stmt->bindValue(':key_opera', '%'.$searchkey.'%', PDO::PARAM_STR);
            $stmt->bindValue(':key_etichetta', '%'.$searchkey.'%', PDO::PARAM_STR);

            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // SQL statico
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $results = $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        return $results;
    }

    private static function getMainQuery($where = null) {
        
        $table_prefix = Config::DB_TABLE_PREFIX;
        
        $where_cond = ($where == null ? "" : "WHERE ".$where);
        
        $mainQuery = <<< SQL
            SELECT 
                *
            FROM 
                dsgm_media                
            $where_cond
            
SQL;
     
        return $mainQuery;
    }
                
    
}
