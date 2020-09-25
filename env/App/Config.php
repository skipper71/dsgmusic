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

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
    
    // Work Directories
    const SESSIONS_DIR = __DIR__ . '/..' . '/sessions';
    const LOGS_DIR = __DIR__ . '/..' . '/logs';
    
    const MP3_DIR = __DIR__ . '/..' . '/..' .'/media/mp3';
    
}
