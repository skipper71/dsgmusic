<?php

namespace App\Controllers;

use \Core\View;
use App\Helpers\SessionHelper;

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
}
