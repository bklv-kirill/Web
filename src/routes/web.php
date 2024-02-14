<?php

use App\Http\Controllers\Admin\{ActiveToggleController, AdminPanelController};
use App\Http\Controllers\Comments\{
    DeleteController as CommentsDeleteController,
    StoreController as CommentsStoreController,
};
use App\Http\Controllers\Likes\{DisLikeController, LikeController,};
use App\Http\Controllers\Posts\{
    CreateController as PostsCreateController,
    DeleteController as PostsDeleteController,
    EditController as PostsEditController,
    IndexController as PostsIndexController,
    ShowController as PostsShowController,
    StoreController as PostsStoreController,
    UpdateController as PostUpdateController,
};
use App\Http\Controllers\User\{
    AuthController,
    LoginController,
    LogOutController,
    RegisterController,
    StoreController as UserStoreController,
    UserPostsIndexController,
};
use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function () {
    Route::view("/", "main");

    Route::name("user.")->group(function () {
        Route::get("/logout", LogOutController::class)->name("logout");
        Route::get("/myPosts", UserPostsIndexController::class)->name("postsIndex");
    });

    Route::name("posts.")->group(function () {
        Route::get("/posts", PostsIndexController::class)->name("index");
        Route::get("/posts/{post}/edit", PostsEditController::class)->name("edit");
        Route::get("/posts/create", PostsCreateController::class)->name("create");
        Route::patch("/posts/{post}", PostUpdateController::class)->name("update");
        Route::post("/posts", PostsStoreController::class)->name("store");
        Route::get("/posts/{post}", PostsShowController::class)->name("show");
        Route::delete("/posts/{post}", PostsDeleteController::class)->name("delete");
    });

    Route::name("likes.")->group(function () {
        Route::post("posts/{post}/likes", LikeController::class)->name("like");
        Route::delete("posts/{post}/likes", DisLikeController::class)->name("dislike");
    });

    Route::name("comments.")->group(function () {
        Route::post("posts/{post}/comments", CommentsStoreController::class)->name("store");
        Route::delete("posts/{post}/comments/{comment}", CommentsDeleteController::class)->name("delete");
    });

    Route::middleware("is.admin")->name("admin.")->group(function () {
        Route::get("/admin", AdminPanelController::class)->name("admin-panel");
        Route::patch("/admin/{user}", ActiveToggleController::class)->name("active-toggle");
        Route::get("/admin/{user}/roles", \App\Http\Controllers\Admin\UserRolesController::class)->name("roles");
        Route::post("/admin/{user}/roles", \App\Http\Controllers\ChangeRoleController::class)->name("change-role");
    });
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */
});

Route::middleware("guest")->group(function () {

    Route::name("user.")->group(function () {
        Route::get("/login", LoginController::class)->name("login");
        Route::post("/login", AuthController::class)->name("auth");

        Route::get("/register", RegisterController::class)->name("register");
        Route::post("/register", UserStoreController::class)->name("store");
    });
});


Route::fallback(fn () => abort(404));
