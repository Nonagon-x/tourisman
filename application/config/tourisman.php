<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Site Title
|--------------------------------------------------------------------------
|
| The title of website.
|
*/

$config['site_title'] = 'Tourisman';

// Skip CSRF on API request.
if (isset($_SERVER["REQUEST_URI"]) &&
   (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'POST') ))
{
    if (stripos($_SERVER["REQUEST_URI"],'/api/') === TRUE )
    {
        $config['csrf_protection'] = FALSE;
    }
} 