<?php

class DashboardController
{
    public function defaultAction()
    {
        $myView = new View("dashboard");
    }

    public function profileAction()
    {
        $myView = new View("profile");
    }

    public function permissionsAction()
    {
        $myView = new View("permissions");
    }
}
