<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;
use App\Models\Song\SongModel;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class SongListings extends \Core\Controller {
    
    public function listAllAction(){
        $sh = new SessionHelper();
        $songs = SongModel::retrieveAll();
        
        View::renderTemplate('SongListings/listall.twig', [
            "sh" => $sh,
            "songs" => $songs,
        ]);
    }
    
    public function listCategoryAction(){
        $sh = new SessionHelper();
        $song_cat_id = filter_input(INPUT_GET, 'songcatid', FILTER_SANITIZE_SPECIAL_CHARS);
        $songs = SongModel::retrieveCategory($song_cat_id);
        
        View::renderTemplate('SongListings/listcategory.twig', [
            "sh" => $sh,
            "songs" => $songs,
        ]);
    }
    
    public function oneSongAction(){
        $sh = new SessionHelper();
        $song_id = filter_input(INPUT_GET, 'songid', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $song = SongModel::retrieveOne($song_id);
        View::renderTemplate('SongListings/onesong.twig', [
            "sh" => $sh,
            "song" => $song,
        ]);
    }
    
}
