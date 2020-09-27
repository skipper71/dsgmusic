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
    const DB_HOST = 'your-database-host';
    const DB_NAME = 'your-database-name';
    const DB_USER = 'your-database-user';
    const DB_PASSWORD = 'your-database-password';
    
    const DB_TABLE_PREFIX = 'dsgm_';

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
