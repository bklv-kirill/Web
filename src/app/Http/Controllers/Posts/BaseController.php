<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Services\Posts\IndexService;
use App\Services\PostTags\{StoreService as postTagsStoreService};

class BaseController extends Controller
{
    public $indexService;

    public $postTagsStoreService;

    public function __construct(IndexService $indexService, postTagsStoreService $postTagsStoreService)
    {
        $this->indexService = $indexService;
        $this->postTagsStoreService = $postTagsStoreService;
    }
}
