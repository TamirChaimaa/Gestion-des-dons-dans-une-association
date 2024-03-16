<?php

namespace App\Router;
use App\Controller\HomeController;
use App\Controller\DonneurController;
use App\Controller\DonController;


class Router
{

    /** @var array list of registered routes */
    private const ROUTES = [
    
    
        '/\/ajoutdonneur.php/'=> [DonneurController::class, 'pagedonneur'],
        '/\/ajoutdon.php/'=> [DonController::class, 'pagedon'],
        '/\/adddonneur.php/'=> [DonneurController::class, 'adddonneur'],
        '/\/adddon.php/'=> [DonController::class, 'adddon'],
        '/\/afficherdons.php/'=> [HomeController::class, 'afficherdons'],
        
        '/\//' => [HomeController::class, 'homeAction'], // keep this line last
    ];

    /** call the appropriate controller method of the requested uri */
    public static function handleRequest()
    {
        foreach (self::ROUTES as $url => $action) {
            $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);
            if ($matches > 0) {
                $controller = new $action[0];
                $controller->{$action[1]}($params);
                break;
            }
        }
    }
}
