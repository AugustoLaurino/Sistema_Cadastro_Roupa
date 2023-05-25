<?php 

function siteHeader($title) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    $BASE = "http://localhost:80/sisroupas/";
    return <<<HTML
        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
                
                
                <title>{$title}</title>
            </head>
            <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
                <div class="container-fluid">
                    <a class="navbar-brand text-primary fs-2 me-5" href="/">Sistema de Roupas</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-primary fs-5" href="{$BASE}marca">Marca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary fs-5" href="{$BASE}roupa">Roupa</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
    HTML;
    }


?>
