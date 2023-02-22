<?php

    // $router->signup ([
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

    $router->get("", [PagesController::class, "index"]);
    $router->get("admin", [PagesController::class, "admin"]);
    $router->get("signin", [PagesController::class, "signin"]);
    $router->get("signup", [PagesController::class, "signup"]);
    $router->get("home", [PagesController::class, "home"]);
    $router->get("model", [PagesController::class, "model"]);
    $router->get("detail", [PagesController::class, "detail"]);
    $router->get("profile", [PagesController::class, "profile"]);
    $router->get("about", [PagesController::class, "about"]);
    $router->get("contact", [PagesController::class, "contact"]);
    $router->get("edit", [PagesController::class, "edit"]);

    $router->post("admin", [PagesController::class, "admin"]);
    $router->post("signin", [PagesController::class, "signin"]);
    $router->post("signup", [PagesController::class, "signup"]);
    $router->post("home", [PagesController::class, "home"]);
    $router->post("model", [PagesController::class, "model"]);
    $router->post("detail", [PagesController::class, "detail"]);
    $router->post("profile", [PagesController::class, "profile"]);
    $router->post("contact", [PagesController::class, "contact"]);
    $router->post("edit", [PagesController::class, "edit"]);