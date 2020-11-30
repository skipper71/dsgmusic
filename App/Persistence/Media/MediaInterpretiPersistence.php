<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Persistence\Media;

use PDO;
use Core\Persistence;
use App\Config;

use App\Helpers\CommonFunctions;

/**
 * Description of SongPersistence
 *
 * @author Utente
 */
class MediaInterpretiPersistence extends Persistence {
    //put your code here
    
    public static function retrieveAllByCatalogoDS($catalogo_ds){
        $results = [];

        try {
            $db = static::getDB();
            $query = self::getMainQuery("catalogo_ds = :catalogo_ds");

            // $stmt = $db->query($query);                  // SQL statico
            $stmt = $db->prepare($query);
            $stmt->bindValue(':catalogo_ds', $catalogo_ds, PDO::PARAM_STR);

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
                dsgm_media_interpreti
            $where_cond
            
SQL;
     
        return $mainQuery;
    }
    
}
