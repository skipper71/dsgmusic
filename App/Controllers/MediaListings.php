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
        
    public function demoListAction(){
        $sh = new SessionHelper();
        $medias = MediaModel::retrieveAll();
        
        View::renderTemplate('MediaListings/grid-v2.twig', [
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
            $media_tipo = $media->getMediaTipo();
            $interpreti = MediaInterpretiModel::retrieveAllByCatalogoDS($media_tipo, $catalogo_ds);
        }
        
        View::renderTemplate('MediaListings/one.twig', [
            "sh" => $sh,
            "media" => $media,
            "interpreti" => $interpreti,
        ]);
    }
    
    public function demoOneAction(){
        $sh = new SessionHelper();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $media = new MediaModel();
        $interpreti = array();
        
        if (!empty($id) && is_numeric($id)){            
            $media = MediaModel::retrieveOne($id);            
        } else {
            $media = MediaModel::retrieveRandom();
        }        
        
        if (isset($media)){
            $catalogo_ds = $media->getCatalogoDs();
            $media_tipo = $media->getMediaTipo();
            $interpreti = MediaInterpretiModel::retrieveAllByCatalogoDS($media_tipo, $catalogo_ds);
        }
        
        View::renderTemplate('MediaListings/detail-v2.twig', [
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
        
        $medias = MediaModel::retrieveSimpleSearch($search_query);
        
        View::renderTemplate('MediaListings/search.twig', [
            "sh" => $sh,
            "search_query" =>$search_query,
            "medias" => $medias,
        ]);
    }
    
}
