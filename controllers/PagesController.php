<?php

    namespace controllers;
    use core\App;

    class PagesController{
        public function index() {
            // $tasks = App::get("database")->selectAll("tasks");
            // view("Index", [
            //     "tasks"=>$tasks
            // ]);
            view("Index");
        }

        public function home() {
            $users = App::get("database")->selectAll("users");
            view("Home", [
                "users"=>$users
            ]);
        }

        public function about() {
            view("About");
            $users = App::get("database")->selectAll("tasks");
            view("About", [
                "tasks"=>$users
            ]);
        }

        public function contact() {
            view("Contact");
        }
        
        public function signup() {
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = request("password");
                if (passwordValidation($password) == 1) {

                    $emailList = App::get("database")->selectAll("users");
                    foreach ($emailList as $mail) {
                        if ($mail->email == request("email")) {
                            App::bind("email", "exist");
                            die(view("Signup"));                            
                        } 
                    }

                    App::get("database")->insert([
                        "userName"=>checkInput(request("userName")),
                        "password"=>checkInput($password),
                        "email"=>checkInput(request("email")),
                        "phNo"=>checkInput(request("phNo")),
                        "userRole"=>2,
                    ], "users");
                    redirect("home");
                } else {
                    view("Signup");
                }
            } else {
                view("Signup");
            }
        }

        public function admin(){
            $users = App::get("database")->selectAll("users");
            view("Admin", [
                "users"=>$users
            ]);
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                sessionDestory();
            }
 
        }

        public function signin() {
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $userInfo = App::get("database")->loginCheck([
                    "userName"=> $userName = checkInput(request("userName")),
                    "password"=> checkInput(request("password"))
                ], "users");

                if($userInfo["rowCount"] == 1) {
    
                    $_SESSION["user_id"] = $userInfo["uInfo"][0]["uid"];

                    if($userInfo["uInfo"][0]["userRole"] == 1) {
                        redirect("admin");
                        exit();
                    } else {
                        redirect("home");
                        exit();
                    }

                } else {
                    App::bind("status", "failed");
                    view("Signin");
                }
            } else {
                view("Signin");
            }
        }
       
    }
?>