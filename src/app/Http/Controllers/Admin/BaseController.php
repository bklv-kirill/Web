<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\IndexService;

class BaseController extends Controller
{
    public $indexService;

    public function __construct(IndexService $indexRequest)
    {
        $this->indexService = $indexRequest;
    }
}
