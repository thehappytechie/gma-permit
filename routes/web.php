<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\BrandSettingController;
use App\Http\Controllers\LoginAttemptController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportUploadController;
use App\Http\Controllers\TicketDatatableController;
use App\Http\Controllers\ForcePasswordChangeController;
use App\Http\Controllers\Datatables\RoleDatatableController;
use App\Http\Controllers\Datatables\UserDatatableController;
use App\Http\Controllers\Datatables\AuditDatatableController;
use App\Http\Controllers\Datatables\CompanyDatatableController;
use App\Http\Controllers\Datatables\CategoryDatatableController;
use App\Http\Controllers\Datatables\ContractDatatableController;
use App\Http\Controllers\Datatables\LocationDatatableController;
use App\Http\Controllers\Datatables\DepartmentDatatableController;
use App\Http\Controllers\Datatables\PermissionDatatableController;
use App\Http\Controllers\Datatables\ContractReportDatatableController;
use App\Http\Controllers\Datatables\VesselDatatableController;

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

/*
|--------------------------------------------------------------------------
| Public Controllers
|--------------------------------------------------------------------------
*/

Route::controller(PageController::class)->group(function () {
    Route::get('privacy', 'privacy')
        ->name('privacy');
    Route::get('terms', 'terms')
        ->name('terms');
});

Route::middleware(['auth', 'verified', 'force.password.change', 'prevent.back.history', 'disable.login'])->group(function () {


    /*
|--------------------------------------------------------------------------
| Resource Controllers
|--------------------------------------------------------------------------
*/
    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionsController::class,
        'location' => LocationController::class,
        'department' => DepartmentController::class,
        'ticket' => TicketController::class,
        'report' => ReportController::class,
        'permissions' => PermissionsController::class,

        'vessels' => VesselController::class,
        'certificates' => CertificateController::class,
    ]);
    Route::resource('profile', UserProfileController::class)->only(['edit', 'update'])->middleware('profile.owner');;
    Route::resource('brand-setting', BrandSettingController::class)->only(['edit', 'update']);


    /*
|--------------------------------------------------------------------------
| Livewire Controllers
|--------------------------------------------------------------------------
*/
    Route::get('upload-report', \App\Http\Livewire\UploadReport::class)->name('upload-report');
    Route::get('company/create', \App\Http\Livewire\Company\Create::class)->name('companyCreate');
    Route::get('company/{company}/edit', \App\Http\Livewire\Company\Edit::class)->name('companyEdit');
    Route::get('company/{company}/show', \App\Http\Livewire\Company\Show::class)->name('companyShow');
    Route::get('contract/create', \App\Http\Livewire\Contract\Create::class)->name('contractCreate');
    Route::get('contract/{contract}/edit', \App\Http\Livewire\Contract\Edit::class)->name('contractEdit');
    Route::get('category/create', \App\Http\Livewire\Category\Create::class)->name('categoryCreate');
    Route::get('category/{category}/edit', \App\Http\Livewire\Category\Edit::class)->name('categoryEdit');

    /*
|--------------------------------------------------------------------------
| Group Controllers
|--------------------------------------------------------------------------
*/
    Route::controller(PageController::class)->group(function () {
        Route::get('my-activity', 'myActivity')
            ->name('myActivity');
    });

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('profile/change-password', 'changePassword')
            ->name('changePassword');
        Route::get('profile/security', 'security')
            ->name('security')->middleware('password.confirm');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('users/restore/{id}', 'restore')
            ->name('users.restore');
        Route::get('users/delete/{id}', 'delete')
            ->name('users.delete');
        Route::get('restoreAll', 'restoreAll')
            ->name('users.restore.all');
    });


    /*
|--------------------------------------------------------------------------
| Single Action Controllers
|--------------------------------------------------------------------------
*/
    Route::get('report', [ReportUploadController::class, 'reportUploads'])->name('reportUploads');
    Route::get('login-attempt', [LoginAttemptController::class, 'loginAttempt'])->name('loginAttempt');
    Route::get('admin/settings', [AdminController::class, 'settings'])
        ->name('settings');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('notifications', [NotificationController::class, 'notification'])->name('notification');
    Route::resource('password-change', ForcePasswordChangeController::class)
        ->only(['edit', 'update'])
        ->withoutMiddleware(['force.password.change']);
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('signout')->withoutMiddleware(['force.password.change']);
});


/*
|--------------------------------------------------------------------------
| Datatable Controllers
|--------------------------------------------------------------------------
*/
Route::controller(UserDatatableController::class)->group(function () {
    Route::get('users', 'userDatatable')
        ->name('userDatatable');
    Route::get('trashed-users', 'trashedUserDatatable')
        ->name('trashedUserDatatable');
});

Route::controller(ContractDatatableController::class)->group(function () {
    Route::get('contract/all', 'contractDatatable')
        ->name('contractDatatable');
    Route::get('category/edit', 'contractEditDatatable')
        ->name('contractEditDatatable');
});

Route::controller(TicketDatatableController::class)->group(function () {
    Route::get('tickets/logged', 'loggedTicket')
        ->name('loggedTicket');
    Route::get('tickets', 'ticketDatatable')
        ->name('ticketDatatable');
});


Route::get('vessels', [VesselDatatableController::class, 'vesselDatatable'])->name('vesselDatatable');


Route::get('company/all', [CompanyDatatableController::class, 'companyDatatable'])->name('companyDatatable');
Route::get('company/contracts', [CompanyDatatableController::class, 'companyContractDatatable'])->name('companyContractDatatable');
Route::get('category/all', [CategoryDatatableController::class, 'categoryDatatable'])->name('categoryDatatable');
Route::get('contract/reports', [ContractReportDatatableController::class, 'contractReportDatatable'])->name('contractReportDatatable');
Route::get('locations', [LocationDatatableController::class, 'locationDatatable'])->name('locationDatatable');
Route::get('roles', [RoleDatatableController::class, 'roleDatatable'])->name('roleDatatable');
Route::get('departments', [DepartmentDatatableController::class, 'departmentDatatable'])->name('departmentDatatable');
Route::get('', [DatatableController::class, 'dashboardReportDatatable'])->name('dashboardReportDatatable');
Route::get('permissions', [PermissionDatatableController::class, 'permissionDatatable'])->name('permissionDatatable');
Route::get('admin/audits', [AuditDatatableController::class, 'audit'])->name('auditDatatable');
