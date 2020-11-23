<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;
use App\Models\Media\MediaModel;
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
        
        $media = MediaModel::retrieveOne($id);
        View::renderTemplate('MediaListings/one.twig', [
            "sh" => $sh,
            "media" => $media,
        ]);
    }
    
}
