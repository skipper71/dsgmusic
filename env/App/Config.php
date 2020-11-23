<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database configuration
     */
    const DB_HOST = 'localhost';
    const DB_NAME = 'gsukvfnu_dsgm1';
    const DB_USER = 'gsukvfnu_dsgm1';
    const DB_PASSWORD = 'Lq;^WLUBkR^v';
    
    const DB_TABLE_PREFIX = 'dsgm';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    // const SHOW_ERRORS = true;    // raw error message
    const SHOW_ERRORS = false;      // courtesy page
    
    // Work Directories
    const SESSIONS_DIR = __DIR__ . '/..' . '/sessions';
    const LOGS_DIR = __DIR__ . '/..' . '/logs';
    
    const MP3_DIR = __DIR__ . '/..' . '/..' .'/media/mp3';
    
}
