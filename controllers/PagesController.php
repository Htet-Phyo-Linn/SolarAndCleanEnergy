<?php

    namespace controllers;
    use core\App;

    class PagesController{
        public function index() {
            // $tasks = App::get("database")->selectAll("tasks");
            // view('Index', [
            //     "tasks"=>$tasks
            // ]);
            view('Index');
        }

        public function home() {
            $users = App::get("database")->selectAll("users");
            view('Home', [
                "users"=>$users
            ]);
        }

        public function about() {
            view("About");
            // $tasks = App::get("database")->selectAll("tasks");
            // view('About', [
            //     "tasks"=>$tasks
            // ]);
        }

        public function contact() {
            view("Contact");
        }

        public function names() {
            App::get("database")->insert([
                'name'=>request('name')
            ], "users");
            
            redirect("/");
        }

        public function login() {
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // $userName = checkInput(request("userName"));
                // $password = checkInput(request("password"));

                $userInfo = App::get("database")->loginCheck([
                    'userName'=> $userName = checkInput(request("userName")),
                    'password'=> checkInput(request("password"))
                ], "users");

                if($userInfo["rowCount"] == 0) {
                    $_SESSION["user_id"] = $userInfo['uInfo'][0]['uid'];

                    if($userInfo['uInfo'][0]['userRole'] == 1) {
                        redirect("about");
                    } else {
                        redirect("/");
                    }
                    exit();

                } else {
                    App::bind("status", "failed");
                    view("Login");
                }

            } else {
                view("Login");
            }
        }
       
    }
?>