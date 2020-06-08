<?php


class HomeController
{
    public function defaultAction()
    {

        //Récupéré depuis la bdd
        $message = "Bienvenue tout le monde";

        //View dashboard sur le template back
        $myView = new View("home");
        $myView->assign("message", $message);
    }
}
