<?php

    // $router->register ([
    //     ""=>"controllers/indexController.php",
    //     "about"=>"controllers/aboutController.php",
    //     "contact"=>"controllers/contactController.php",
    //     "names"=>"controllers/addNameController.php",
    // ]);
    
    // $router->get("", "PagesController@home");
    // $router->get("about", "PagesController@about");
    // $router->get("contact", "PagesController@contact");
    // $router->post("names", "PagesController@names");

    use controllers\PagesController;

    $router->get('', [PagesController::class, "index"]);
    $router->get('about', [PagesController::class, "about"]);
    $router->get('login', [PagesController::class, "login"]);
    $router->post('login', [PagesController::class, "login"]);
?>


