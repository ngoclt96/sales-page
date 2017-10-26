<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AppController extends BaseController
{
    protected $layout = 'default';

    protected $view;

    public function __construct()
    {
        $route = Route::getCurrentRoute()->getActionName();
        list($controller, $view) = explode('@', $route);
        $viewDir = str_replace('controller', '', strtolower(class_basename($controller)));
        $this->view = $viewDir . '.' . $view;
    }

    protected function view($data = null)
    {
        echo view($this->view)->with($data);
    }
}
