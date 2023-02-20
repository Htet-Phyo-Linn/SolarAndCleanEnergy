<?php
    function dd($data) {
        echo "<pre>";
        die(var_dump($data));
    }

    function view($name, $data=[]){
        extract(
            $data
        );
        return require_once "views/$name.view.php";
    }

    function redirect($uri) {
        header("Location: $uri");
    }

    function request($name) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            return ($_POST["$name"]);
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            return ($_GET["$name"]);
        }
    }
    
    function passwordValidation($input) {
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
        return preg_match($password_regex, $input);
    }

    function checkInput($input) {
        $input = strip_tags($input);
        $input = str_replace("'", "''", $input);
        $input = htmlentities($input, ENT_QUOTES, "UTF-8");
        return $input;
    }

    function sessionCheck() {
        if (!isset($_SESSION["user_id"])) {
            redirect("signin");
            exit();
        }
    }

    function sessionDestory() {
        if (isset($_POST["logout"])){
            session_destroy();
            redirect("signin");
            exit();
        }
        
    }
?>