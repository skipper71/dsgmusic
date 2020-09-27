<?php

namespace App\Controllers;

use \Core\View;
use Google_Client;
use App\Config;
use App\Helpers\SessionHelper;
use App\Helpers\CommonFunctions;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Music extends \Core\Controller{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        $sh = new SessionHelper();
        // CommonFunctions::writeLog("Music->indexAction()", 'music');
        
        $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if(!isset($token)){
            //No token? They tried to view the file
            // die('access denied');
            throw new \Exception('Access denied', 403);
        } 

        $key = filter_input(INPUT_GET, 'key', FILTER_SANITIZE_SPECIAL_CHARS);
        if(!isset($key)){
            //No token? They tried to view the file
            // die('access denied');
            throw new \Exception('Access denied', 403);
        } 

        // CommonFunctions::writeLog("Key = ".$key." - Session Token = ".$token, 'music');
        if($token == $sh->getSecurity()->getToken()){
        // The one time token hasn't been used yet
        // Go ahead and mimic an MP3 and play the music

            // Invalidate old session token
            // CommonFunctions::writeLog("old session token = ".$sh->getSecurity()->getToken(), 'music');
            $sh->renewSecurityToken();
            // CommonFunctions::writeLog("new session token = ".$sh->getSecurity()->getToken(), 'music');
            
            $file = Config::MP3_DIR . '/' . $key . '.mp3';
            // CommonFunctions::writeLog($file, 'music');

            if (file_exists($file)) {
                // CommonFunctions::writeLog("$file exists", 'music');
                /* KO
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                 * 
                 */
                $mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";
                header('Content-type: {$mime_type}');
                header('Content-length: ' . filesize($file));
                header('Content-Disposition: filename="' . basename($file) . '"');
                header('Content-Transfer-Encoding: binary');    //
                header('Expires: 0');                           //
                header('X-Pad: avoid browser bug');
                // header('Cache-Control: no-cache');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                readfile($file);
                
                exit;
            } else {
                CommonFunctions::writeLog("$file does not exist", 'music');
                // header("HTTP/1.0 404 Not Found");
                throw new \Exception('File does not exist', 404);
            }

          //Here is where you'll want to invalidate the current token and get a new one

        } else {
          //The tokens don't match meaning you got a new one and the old one cant be used anymore
            // die('access denied');
            throw new \Exception('Access denied', 403);
        }
        
    }        
    
}
