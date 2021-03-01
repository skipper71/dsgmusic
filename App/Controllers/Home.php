<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;
use App\Models\Staff\StaffModel;

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
        
        $staffs = StaffModel::retrieveAll();
        
        View::renderTemplate('startpage.twig', [
            "sh" => $sh,
            "title" => $title,
            "staffs" => $staffs,
            
        ]);
    }
}
