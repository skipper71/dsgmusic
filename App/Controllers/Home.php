<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;
use App\Models\Staff\StaffModel;
use App\Models\News\NewsModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller {

    /**
     * Show the index page
     *
     * @return void
     */
    
    public function indexAction(){
        $sh = new SessionHelper();
        
        View::renderTemplate('Home/index.twig', [
            "sh" => $sh,
        ]);
    }
    
    public function demoAction(){
        $sh = new SessionHelper();
        $title = "Pagina di TEST";
        
        //$staffs = StaffModel::retrieveAll();
        $staffs = StaffModel::retrieveOldest3();
        //$newsevents = NewsModel::retrieveAll();
        $newsevents = NewsModel::retrieveOldest3();
        
        View::renderTemplate('startpage.twig', [
            "sh" => $sh,
            "title" => $title,
            "staffs" => $staffs,
            "newsevents" => $newsevents,
            
        ]);
    }
}
