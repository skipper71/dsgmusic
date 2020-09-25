<?php

namespace App\Controllers;

use \Core\View;
use Google_Client;
use App\Config;
use App\Helpers\SessionHelper;

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
    
    public function tokenAction(){
        $NEW_LINE = "\n";
        $CLIENT_ID = "74263314662-02c3kue0uvnsnunii0r9j705r3v2diec.apps.googleusercontent.com";
        $idtoken = $_POST['idtoken'];

        // $logfile = dirname(dirname(__DIR__)) . '/logs/' . 'login-' . date('Y-m-d') . '.log';
        $logfile = Config::LOGS_DIR . '/' . 'login-' . date('Y-m-d') . '.log';
        
        $fp = fopen($logfile, 'a');
        
        try {

            if (isset($idtoken)){
                $write = "Token ID = ".$idtoken.$NEW_LINE;
                fwrite($fp, $write);

            } else {
                $write = "No token".$NEW_LINE;
                fwrite($fp, $write);
            }

            $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
            $payload = $client->verifyIdToken($idtoken);

            if ($payload) {
              // $userid = $payload['sub'];
              foreach ($payload as $key => $value){
                // If request specified a G Suite domain:
                //$domain = $payload['hd'];
                $write = $key." => ".$value.$NEW_LINE;
                fwrite($fp, $write);
              }
            } else {
              // Invalid ID token
                fwrite($fp, "Invalid ID token".$NEW_LINE);
            }

        } catch (Exception $e){
            $write = "Error : ".$e->getMessage().$NEW_LINE;
            fwrite($fp, $write);

        }
        
        fclose($fp);        

    }
}
