<?php


namespace App\Controllers\Admin;


use App\BaseController;

abstract class BaseAdminController extends BaseController
{
    protected function auth()
    {
        return true;
    }
}