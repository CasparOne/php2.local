<?php

namespace App\Controllers\Admin;

use App\BaseController;

/**
 * Class BaseAdminController
 * @package App\Controllers\Admin
 */
abstract class BaseAdminController extends BaseController
{
    protected $redirectUri = '/admin';

    /**
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }
}