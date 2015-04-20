<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
    // Setup & Update Controllers
    'setup' => 'SetupController',
    'update' => 'UpdateController',
]);

Route::group(['middleware' => 'ip.start'], function () {
    Route::get('/', function () {
        redirect('dashboard');
    });

    Route::controllers([
        // Session Controllers
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',

        // Basic controllers
        'dashboard' => 'Basic\DashboardController',
        'clients' => 'Basic\ClientsController',
        'quotes' => 'Basic\QuotesController',
        'invoices' => 'Basic\InvoicesController',
        'items' => 'Basic\ItemsController',
        'payments' => 'Basic\PaymentsController',

        // Project Controllers
        'projects' => 'Projects\ProjectsController',
        'messages' => 'Projects\MessagesController',

        // Settings & Administration Controllers
        'users' => 'Admin\UsersController',
        'settings' => 'Admin\SettingsController',
    ]);
});


