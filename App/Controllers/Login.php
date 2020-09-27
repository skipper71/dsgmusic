<?php

namespace App\Controllers;

use \Core\View;
use Google_Client;

use App\Config;
use App\Helpers\SessionHelper;
use App\Models\Session\GoogleUserModel;

use App\Helpers\CommonFunctions;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        $sh = new SessionHelper();
        
        View::renderTemplate('Login/index.twig', [
            "sh" => $sh,
        ]);
    }        
    
    public function logoutAction(){
        $sh = new SessionHelper();
        
        SessionHelper::logoutGoogleUser();
        
        View::renderTemplate('Login/index.twig', [
            "sh" => $sh,
        ]);
    }        
    
    public function tokenAction(){
        $sh = new SessionHelper();
        
        $NEW_LINE = "\n";
        $CLIENT_ID = "74263314662-02c3kue0uvnsnunii0r9j705r3v2diec.apps.googleusercontent.com";
        $idtoken = $_POST['idtoken'];

        // $logfile = dirname(dirname(__DIR__)) . '/logs/' . 'login-' . date('Y-m-d') . '.log';
        $logfile = Config::LOGS_DIR . '/' . 'login-' . date('Y-m-d') . '.log';
        
        try {

            if (isset($idtoken)){
                CommonFunctions::writeLog("Token ID = ".$idtoken, 'login');

            } else {
                CommonFunctions::writeLog("No token", 'login');
            }

            $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
            $payload = $client->verifyIdToken($idtoken);

            if ($payload) {
              // $userid = $payload['sub'];
                
                $googleUser = new GoogleUserModel();
                $googleUser->arrayToModel($payload);
                $sh->setGoogleUser($googleUser);
                
                echo($googleUser->getName());           // only needed to echo something in JS
                
              foreach ($payload as $key => $value){
                // If request specified a G Suite domain:
                //$domain = $payload['hd'];
                CommonFunctions::writeLog($key." => ".$value, 'login');
              }
            } else {
                // Invalid ID token
                CommonFunctions::writeLog("Invalid ID token", 'login');
            }

        } catch (Exception $e){
            // general error
            CommonFunctions::writeLog("Error : ".$e->getMessage(), 'login');
        }

    }
}
