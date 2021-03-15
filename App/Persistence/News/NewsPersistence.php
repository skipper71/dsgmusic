<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Persistence\News;

use PDO;
use Core\Persistence;
use App\Config;

use App\Helpers\CommonFunctions;

/**
 * Description of SongPersistence
 *
 * @author Utente
 */
class NewsPersistence extends Persistence {
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

    public static function retrieveOldest3(){
        $results = [];

        try {
            $db = static::getDB();
            $query = self::getOrderLimitQuery(null, "id ASC", 3);

            // $stmt = $db->query($query);                  // SQL statico
            $stmt = $db->prepare($query);
            // $stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
                dsgm_news                
            $where_cond
            
SQL;
     
        return $mainQuery;
    }
                
    private static function getOrderLimitQuery($where = null, $order = null, $limit = null) {
        
        $table_prefix = Config::DB_TABLE_PREFIX;
        
        $where_cond = ($where == null ? "" : "WHERE ".$where);
        $order_cond = ($order == null ? "" : "ORDER BY ".$order);
        $limit_cond = ($limit == null ? "" : "LIMIT ".$limit);
        
        $mainQuery = <<< SQL
            SELECT 
                *
            FROM 
                dsgm_news                
            $where_cond
            $order_cond
            $limit_cond
            
SQL;
     
        return $mainQuery;
    }
                
    
}
