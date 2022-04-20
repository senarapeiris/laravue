<?php

use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);


// Main Page Route
Route::get('/', 'AuthController@loginPage')->name('loginPage');
Route::post('register', 'AuthController@register')->name('register');

Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');


/* Route Dashboard */
Route::group(['prefix' => 'dashboard'], function () {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');
  Route::get('user-dashboard', 'DashboardController@userDashboard')->name('user-dashboard');
});


Route::group(['middleware' => ['role:super-admin']], function () {
  //
});

/* Country */
Route::group(['prefix' => 'masters'], function () {
  // Route::group(['middleware' => ['role:admin']], function () {
  Route::get('country', 'CountryController@index')->name('country');
  Route::get('add-country', 'CountryController@addCountry')->name('add-country');
  Route::post('create-country', 'CountryController@createCountry')->name('create-country');
  Route::get('edit-country/{id}', 'CountryController@editCountry')->name('edit-country');
  Route::post('update-country', 'CountryController@updateCountry')->name('update-country');
  Route::get('inactivate-country/{id}', 'CountryController@inactivateCountry')->name('inactivate-country');
  Route::get('activate-country/{id}', 'CountryController@activateCountry')->name('activate-country');
  // });
});


/* Category */
Route::group(['prefix' => 'masters'], function () {
  Route::get('category', 'CategoryController@index')->name('category');
  Route::get('add-category', 'CategoryController@addCategory')->name('add-category');
  Route::post('create-category', 'CategoryController@createCategory')->name('create-category');
  Route::get('edit-category/{id}', 'CategoryController@editCategory')->name('edit-category');
  Route::post('update-category', 'CategoryController@updateCategory')->name('update-category');
  Route::get('inactivate-category/{id}', 'CategoryController@inactivateCategory')->name('inactivate-category');
  Route::get('activate-category/{id}', 'CategoryController@activateCategory')->name('activate-category');
});


/* Job Vacancy */
Route::group(['prefix' => 'masters'], function () {
  Route::get('job-vacancy', 'JobVacancyController@index')->name('job-vacancy');
  Route::get('add-job-vacancy', 'JobVacancyController@addJobVacancy')->name('add-job-vacancy');
  Route::post('create-job-vacancy', 'JobVacancyController@createJobVacancy')->name('create-job-vacancy');
  Route::get('edit-job-vacancy/{id}', 'JobVacancyController@editJobVacancy')->name('edit-job-vacancy');
  Route::post('update-job-vacancy', 'JobVacancyController@updateJobVacancy')->name('update-job-vacancy');
  Route::get('inactivate-job-vacancy/{id}', 'JobVacancyController@inactivateJobVacancy')->name('inactivate-job-vacancy');
  Route::get('activate-job-vacancy/{id}', 'JobVacancyController@activateJobVacancy')->name('activate-job-vacancy');
});


/* Applicant */
Route::group(['prefix' => 'job-vacancy-info'], function () {
  Route::get('applicant', 'ApplicantController@index')->name('applicant');
  Route::get('edit-applicant/{id}', 'ApplicantController@editApplicant')->name('edit-applicant');
  Route::post('update-applicant', 'ApplicantController@updateApplicant')->name('update-applicant');
  Route::get('inactivate-applicant/{id}', 'ApplicantController@inactivateApplicant')->name('inactivate-applicant');
  Route::get('activate-applicant/{id}', 'ApplicantController@activateApplicant')->name('activate-applicant');
});


/* Application */
Route::group(['prefix' => 'job-vacancy-info'], function () {
  Route::get('new-application', 'ApplicationController@newApplication')->name('new-application');
  Route::post('assign-new-application', 'ApplicationController@assignNewApplication')->name('assign-new-application');
  Route::get('reject-application/{id}', 'ApplicationController@rejectApplication')->name('reject-application');
  Route::get('assigned-application', 'ApplicationController@assignedApplication')->name('assigned-application');
  Route::get('selected-application', 'ApplicationController@selectedApplication')->name('selected-application');
  Route::get('waiting-application', 'ApplicationController@waitingApplication')->name('waiting-application');
  Route::get('completed-application', 'ApplicationController@completedApplication')->name('completed-application');
  Route::get('rejected-application', 'ApplicationController@rejectedApplication')->name('rejected-application');


  // Route::get('new-application', 'ApplicationController@newApplication')->name('new-application');
  // Route::post('user-assign-new-application', 'UserApplicationController@assignNewApplication')->name('user-assign-new-application');
  // Route::get('reject-application/{id}','UserApplicationController@rejectApplication')->name('reject-application');

  Route::get('user-assigned-application', 'UserApplicationController@userassignedApplication')->name('user-assigned-application');
  Route::post('comment', 'UserApplicationController@commentNewApplication')->name('comment');
  Route::get('selected-application', 'ApplicationController@selectedApplication')->name('selected-application');
  Route::get('waiting-application', 'ApplicationController@waitingApplication')->name('waiting-application');
  Route::get('completed-application', 'ApplicationController@completedApplication')->name('completed-application');
  Route::get('rejected-application', 'ApplicationController@rejectedApplication')->name('rejected-application');
});



/* Route Users */
Route::group(['prefix' => 'users'], function () {
  Route::get('users', 'UsersController@users')->name('users');
  Route::get('users/create', 'UsersController@create')->name('users-create');
  Route::post('users/store', 'UsersController@store')->name('users-store');
  Route::get('users/edit/{id}', 'UsersController@edit')->name('users-edit');
  Route::post('users/update', 'UsersController@update')->name('users-update');
  Route::get('users/delete/{id}', 'UsersController@destroy')->name('users-delete');
});
/* Route Users */



/*  Permission */
Route::group(['prefix' => 'setting'], function () {
  Route::get('permission', 'PermissionController@index')->name('permission');
  Route::get('add-permission', 'PermissionController@addPermission')->name('add-permission');
  Route::post('create-permission', 'PermissionController@createPermission')->name('create-permission');
  Route::get('edit-permission/{id}', 'PermissionController@editPermission')->name('edit-permission');
  Route::post('update-permission', 'PermissionController@updatePermission')->name('update-permission');
});




/* Route Apps */
Route::group(['prefix' => 'app'], function () {
  Route::get('file-manager', 'AppsController@file_manager')->name('app-file-manager');
  Route::get('user/list', 'AppsController@user_list')->name('app-user-list');
  Route::get('user/view', 'AppsController@user_view')->name('app-user-view');
  Route::get('user/edit', 'AppsController@user_edit')->name('app-user-edit');
});
/* Route Apps */

/* Route UI */
Route::group(['prefix' => 'ui'], function () {
  Route::get('typography', 'UserInterfaceController@typography')->name('ui-typography');
  Route::get('colors', 'UserInterfaceController@colors')->name('ui-colors');
});
/* Route UI */


/* Route Cards */
Route::group(['prefix' => 'card'], function () {
  Route::get('basic', 'CardsController@card_basic')->name('card-basic');
  Route::get('advance', 'CardsController@card_advance')->name('card-advance');
  Route::get('statistics', 'CardsController@card_statistics')->name('card-statistics');
  Route::get('analytics', 'CardsController@card_analytics')->name('card-analytics');
  Route::get('actions', 'CardsController@card_actions')->name('card-actions');
});
/* Route Cards */

/* Route Components */
Route::group(['prefix' => 'component'], function () {
  Route::get('alert', 'ComponentsController@alert')->name('component-alert');
  Route::get('avatar', 'ComponentsController@avatar')->name('component-avatar');
  Route::get('badges', 'ComponentsController@badges')->name('component-badges');
  Route::get('breadcrumbs', 'ComponentsController@breadcrumbs')->name('component-breadcrumbs');
  Route::get('buttons', 'ComponentsController@buttons')->name('component-buttons');
  Route::get('carousel', 'ComponentsController@carousel')->name('component-carousel');
  Route::get('collapse', 'ComponentsController@collapse')->name('component-collapse');
  Route::get('divider', 'ComponentsController@divider')->name('component-divider');
  Route::get('dropdowns', 'ComponentsController@dropdowns')->name('component-dropdowns');
  Route::get('list-group', 'ComponentsController@list_group')->name('component-list-group');
  Route::get('modals', 'ComponentsController@modals')->name('component-modals');
  Route::get('pagination', 'ComponentsController@pagination')->name('component-pagination');
  Route::get('navs', 'ComponentsController@navs')->name('component-navs');
  Route::get('tabs', 'ComponentsController@tabs')->name('component-tabs');
  Route::get('timeline', 'ComponentsController@timeline')->name('component-timeline');
  Route::get('pills', 'ComponentsController@pills')->name('component-pills');
  Route::get('tooltips', 'ComponentsController@tooltips')->name('component-tooltips');
  Route::get('popovers', 'ComponentsController@popovers')->name('component-popovers');
  Route::get('pill-badges', 'ComponentsController@pill_badges')->name('component-pill-badges');
  Route::get('progress', 'ComponentsController@progress')->name('component-progress');
  Route::get('media-objects', 'ComponentsController@media_objects')->name('component-media-objects');
  Route::get('spinner', 'ComponentsController@spinner')->name('component-spinner');
  Route::get('toast', 'ComponentsController@toast')->name('component-toast');
});


/* Route Extensions */
Route::group(['prefix' => 'ext-component'], function () {
  Route::get('sweet-alerts', 'ExtensionController@sweet_alert')->name('ext-component-sweet-alerts');
  Route::get('block-ui', 'ExtensionController@block_ui')->name('ext-component-block-ui');
  Route::get('toastr', 'ExtensionController@toastr')->name('ext-component-toastr');
  Route::get('slider', 'ExtensionController@slider')->name('ext-component-slider');
  Route::get('drag-drop', 'ExtensionController@drag_drop')->name('ext-component-drag-drop');
  Route::get('tour', 'ExtensionController@tour')->name('ext-component-tour');
  Route::get('clipboard', 'ExtensionController@clipboard')->name('ext-component-clipboard');
  Route::get('plyr', 'ExtensionController@plyr')->name('ext-component-plyr');
  Route::get('context-menu', 'ExtensionController@context_menu')->name('ext-component-context-menu');
  Route::get('swiper', 'ExtensionController@swiper')->name('ext-component-swiper');
  Route::get('tree', 'ExtensionController@tree')->name('ext-component-tree');
  Route::get('ratings', 'ExtensionController@ratings')->name('ext-component-ratings');
  Route::get('locale', 'ExtensionController@locale')->name('ext-component-locale');
});
/* Route Extensions */

/* Route Page Layouts */
Route::group(['prefix' => 'page-layouts'], function () {
  Route::get('collapsed-menu', 'PageLayoutController@layout_collapsed_menu')->name('layout-collapsed-menu');
  Route::get('boxed', 'PageLayoutController@layout_boxed')->name('layout-boxed');
  Route::get('without-menu', 'PageLayoutController@layout_without_menu')->name('layout-without-menu');
  Route::get('empty', 'PageLayoutController@layout_empty')->name('layout-empty');
  Route::get('blank', 'PageLayoutController@layout_blank')->name('layout-blank');
});
/* Route Page Layouts */

/* Route Forms */
Route::group(['prefix' => 'form'], function () {
  Route::get('input', 'FormsController@input')->name('form-input');
  Route::get('input-groups', 'FormsController@input_groups')->name('form-input-groups');
  Route::get('input-mask', 'FormsController@input_mask')->name('form-input-mask');
  Route::get('textarea', 'FormsController@textarea')->name('form-textarea');
  Route::get('checkbox', 'FormsController@checkbox')->name('form-checkbox');
  Route::get('radio', 'FormsController@radio')->name('form-radio');
  Route::get('switch', 'FormsController@switch')->name('form-switch');
  Route::get('select', 'FormsController@select')->name('form-select');
  Route::get('number-input', 'FormsController@number_input')->name('form-number-input');
  Route::get('file-uploader', 'FormsController@file_uploader')->name('form-file-uploader');
  Route::get('quill-editor', 'FormsController@quill_editor')->name('form-quill-editor');
  Route::get('date-time-picker', 'FormsController@date_time_picker')->name('form-date-time-picker');
  Route::get('layout', 'FormsController@layouts')->name('form-layout');
  Route::get('wizard', 'FormsController@wizard')->name('form-wizard');
  Route::get('validation', 'FormsController@validation')->name('form-validation');
  Route::get('repeater', 'FormsController@form_repeater')->name('form-repeater');
});
/* Route Forms */

/* Route Tables */
Route::group(['prefix' => 'table'], function () {
  Route::get('', 'TableController@table')->name('table');
  Route::get('datatable/basic', 'TableController@datatable_basic')->name('datatable-basic');
  Route::get('datatable/advance', 'TableController@datatable_advance')->name('datatable-advance');
  Route::get('ag-grid', 'TableController@ag_grid')->name('ag-grid');
});
/* Route Tables */

/* Route Pages */
Route::group(['prefix' => 'page'], function () {
  Route::get('account-settings', 'PagesController@account_settings')->name('page-account-settings');
  Route::get('profile', 'PagesController@profile')->name('page-profile');
  Route::get('faq', 'PagesController@faq')->name('page-faq');
  Route::get('knowledge-base', 'PagesController@knowledge_base')->name('page-knowledge-base');
  Route::get('knowledge-base/category', 'PagesController@kb_category')->name('page-knowledge-base');
  Route::get('knowledge-base/category/question', 'PagesController@kb_question')->name('page-knowledge-base');
  Route::get('pricing', 'PagesController@pricing')->name('page-pricing');
  Route::get('blog/list', 'PagesController@blog_list')->name('page-blog-list');
  Route::get('blog/detail', 'PagesController@blog_detail')->name('page-blog-detail');
  Route::get('blog/edit', 'PagesController@blog_edit')->name('page-blog-edit');

  // Miscellaneous Pages With Page Prefix
  Route::get('coming-soon', 'MiscellaneousController@coming_soon')->name('misc-coming-soon');
  Route::get('not-authorized', 'MiscellaneousController@not_authorized')->name('misc-not-authorized');
  Route::get('maintenance', 'MiscellaneousController@maintenance')->name('misc-maintenance');
});
/* Route Pages */
Route::get('/error', 'MiscellaneousController@error')->name('error');

/* Route Authentication Pages */
Route::group(['prefix' => 'auth'], function () {
  Route::get('login-v1', 'AuthenticationController@login_v1')->name('auth-login-v1');
  Route::get('login-v2', 'AuthenticationController@login_v2')->name('auth-login-v2');
  Route::get('register-v1', 'AuthenticationController@register_v1')->name('auth-register-v1');
  Route::get('register-v2', 'AuthenticationController@register_v2')->name('auth-register-v2');
  Route::get('forgot-password-v1', 'AuthenticationController@forgot_password_v1')->name('auth-forgot-password-v1');
  Route::get('forgot-password-v2', 'AuthenticationController@forgot_password_v2')->name('auth-forgot-password-v2');
  Route::get('reset-password-v1', 'AuthenticationController@reset_password_v1')->name('auth-reset-password-v1');
  Route::get('reset-password-v2', 'AuthenticationController@reset_password_v2')->name('auth-reset-password-v2');
  Route::get('lock-screen', 'AuthenticationController@lock_screen')->name('auth-lock_screen');
});
/* Route Authentication Pages */

/* Route Charts */
Route::group(['prefix' => 'chart'], function () {
  Route::get('apex', 'ChartsController@apex')->name('chart-apex');
  Route::get('chartjs', 'ChartsController@chartjs')->name('chart-chartjs');
  Route::get('echarts', 'ChartsController@echarts')->name('chart-echarts');
});
/* Route Charts */

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');