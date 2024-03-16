<?php

namespace App\Views;

class ViewManager
{
    /** fill required call specific template  */
    public static function renderView(string $templatePath, array $params = [])
    {
        /**
         * 'home/home.php',
         * ['best_seller' => json_decode($bestSeller, true)]
         */
        foreach ($params as $key => $param) {
            $_GET[$key] = $param; // $_GET['best_seller'] = json_decode($bestSeller, true);
        }

        if (file_exists(__DIR__.'/'.$templatePath)) {
            require_once $templatePath;
        } else {
            echo sprintf(
                '<span style="color: red">Template <b>%s</b> does not exists in <b>%s</b></span>',
                $templatePath,
                __DIR__
            );
        }
    }
}
