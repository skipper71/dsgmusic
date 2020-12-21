<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;
use App\Models\Media\MediaModel;
use App\Models\Media\MediaInterpretiModel;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class MediaListings extends \Core\Controller {
    
    public function listAllAction(){
        $sh = new SessionHelper();
        $medias = MediaModel::retrieveAll();
        
        View::renderTemplate('MediaListings/listall.twig', [
            "sh" => $sh,
            "medias" => $medias,
        ]);
    }
        
    public function listOneAction(){
        $sh = new SessionHelper();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $media = new MediaModel();
        $interpreti = array();
        
        $media = MediaModel::retrieveOne($id);
        if (isset($media)){
            $catalogo_ds = $media->getCatalogoDs();
            $interpreti = MediaInterpretiModel::retrieveAllByCatalogoDS($catalogo_ds);
        }
        
        View::renderTemplate('MediaListings/one.twig', [
            "sh" => $sh,
            "media" => $media,
            "interpreti" => $interpreti,
        ]);
    }
    
    public function searchAction(){
        $sh = new SessionHelper();
        $medias = array();
        
        if(isset($_GET['search_query'])){
            $search_query = $_GET['search_query'];            
        } else {
            $search_query = null;
        }
        
        View::renderTemplate('MediaListings/search.twig', [
            "sh" => $sh,
            "search_query" =>$search_query,
            "medias" => $medias,
        ]);
    }
    
}
