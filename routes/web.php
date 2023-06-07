<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
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
use App\Http\Controllers\Datatables\VesselDatatableController;
use App\Http\Controllers\Datatables\CompanyDatatableController;
use App\Http\Controllers\Datatables\CategoryDatatableController;
use App\Http\Controllers\Datatables\LocationDatatableController;
use App\Http\Controllers\Datatables\DepartmentDatatableController;
use App\Http\Controllers\Datatables\PermissionDatatableController;
use App\Http\Controllers\Datatables\CertificateDatatableController;
use App\Http\Controllers\Datatables\PermitDatatableController;
use App\Http\Controllers\Datatables\PermitUnitDatatableController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\PermitUnitController;

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

/*
|--------------------------------------------------------------------------
| Routes Middleware
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','web', 'verified', 'force.password.change', 'prevent.back.history', 'disable.login'])->group(function () {

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
        'permit' => PermitController::class,
        'permissions' => PermissionsController::class,
        'permit-unit' => PermitUnitController::class,
        'vessels' => VesselController::class,
        'company' => CompanyController::class,
        'certificate' => CertificateController::class,

    ]);
    Route::resource('profile', UserProfileController::class)->only(['edit', 'update'])->middleware('profile.owner');;
    Route::resource('brand-setting', BrandSettingController::class)->only(['edit', 'update']);

    /*
|--------------------------------------------------------------------------
| Livewire Controllers
|--------------------------------------------------------------------------
*/

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

    Route::post('company/import', [CompanyController::class, 'importCompany'])->name('importCompany');
    Route::post('vessel/import', [VesselController::class, 'importVessel'])->name('importVessel');
    Route::post('permit-unit/import', [PermitUnitController::class, 'importPermitUnit'])->name('importPermitUnit');

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

Route::controller(TicketDatatableController::class)->group(function () {
    Route::get('tickets/logged', 'loggedTicket')
        ->name('loggedTicket');
    Route::get('tickets', 'ticketDatatable')
        ->name('ticketDatatable');
});

Route::controller(PermitDatatableController::class)->group(function () {
    Route::get('permit', 'permitDatatable')
        ->name('permitDatatable');
    Route::get('operating-permits', 'operatingPermitDatatable')
        ->name('operatingPermitDatatable');
    Route::get('safety-permits', 'safetyPermitDatatable')
        ->name('safetyPermitDatatable');
});

Route::get('vessels', [VesselDatatableController::class, 'vesselDatatable'])->name('vesselDatatable');
Route::get('permit-unit', [PermitUnitDatatableController::class, 'permitUnitDatatable'])->name('permitUnitDatatable');
Route::get('company', [CompanyDatatableController::class, 'companyDatatable'])->name('companyDatatable');
Route::get('certificate', [CertificateDatatableController::class, 'certificateDatatable'])->name('certificateDatatable');
Route::get('category/all', [CategoryDatatableController::class, 'categoryDatatable'])->name('categoryDatatable');
Route::get('locations', [LocationDatatableController::class, 'locationDatatable'])->name('locationDatatable');
Route::get('roles', [RoleDatatableController::class, 'roleDatatable'])->name('roleDatatable');
Route::get('departments', [DepartmentDatatableController::class, 'departmentDatatable'])->name('departmentDatatable');
Route::get('permissions', [PermissionDatatableController::class, 'permissionDatatable'])->name('permissionDatatable');
Route::get('admin/audits', [AuditDatatableController::class, 'audit'])->name('auditDatatable');
