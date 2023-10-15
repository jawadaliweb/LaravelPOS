<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\AttendanceController;

use Illuminate\Support\Facades\Route;
 
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

Route::get('/', function () {
    return view('welcome');
});

Route::fallback( function(){
 return redirect('login');
});


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    Route::get('admin/change/password', [AdminController::class, 'ChangePassword'])->name('change.paswword');
    Route::post('change/password', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

//employee Routes
Route::controller(EmployeeController::class)->group(function () {
    Route::get('/view/Employee', 'ViewEmployee')->name('view.employee');
    Route::get('/add/Employee', 'AddEmployeeForm')->name('employee.add');
    Route::post('/adding/Employee', 'AddingEmployee')->name('employee.adding');
    Route::get('/employee/update/{id}', 'UpdateEmployee')->name('update.employee');
    Route::post('/updating/Employee/{id}', 'UpdatingEmployee')->name('updating.employee');

    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');

});

//customer Routes
Route::controller(CustomerController::class)->group(function () {
    Route::get('/view/customer', 'ViewCustomer')->name('view.customer');

    Route::get('/add/customer', function () {
        return view('backend.customer.Add_customer');
    })->name('customer_add_form');

    // Route::get('/add/Employee', 'AddEmployeeForm')->name('employee.add');
    Route::post('/adding/customer', 'AddingCustomer')->name('customer.adding');
    Route::get('/customer/update/{id}', 'UpdateCustomer')->name('update.customer');
    Route::post('/updating/customer/{id}', 'UpdatingCustomer')->name('updating.customer');

    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');

});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/view/suppliers', 'ViewSuppliers')->name('view.suppliers');

    Route::get('/add/supplier', function () {
        return view('backend.supplier.Add_supplier');
    })->name('supplier_add_form');

    // Route::get('/add/supplier', 'AddSupplierForm')->name('employee.add');
    Route::post('/adding/supplier', 'AddingSupplier')->name('supplier.adding');
    Route::get('/supplier/update/{id}', 'UpdateSupplier')->name('update.supplier');
    Route::post('/updating/supplier/{id}', 'UpdatingSupplier')->name('updating.supplier');

    Route::get('/supplier/details/{id}', 'SupplierDetails')->name('details.supplier');

    Route::get('/delete/supplier/{id}','DeleteSupplier')->name('delete.supplier');

});

});

Route::controller(SalaryController::class)->group(function () {
    Route::get('/add/advanceSalary', 'AddAdvanceSalary')->name('add.advance.salary');
    Route::post('/store/advanceSalary', 'StoreAdvanceSalary')->name('advance.salary.store');
    Route::get('/all/advanceSalary', 'AllAdvanceSalary')->name('all.advance.salary');
    Route::get('/advance/update/{id}', 'UpdateAdvance')->name('update.advance');
    Route::post('/updating/Advance/{id}', 'UpdatingAdvance')->name('updating.Advance');

    Route::get('/delete/AdvanceSalary/{id}','DeleteAdvance')->name('delete.advance');

    
});


Route::controller(SalaryController::class)->group(function () {
    Route::get('/pay/salary', 'PaySalary')->name('PaySalary');
    Route::get('/pay/salary/{id}', 'PayNowSalary')->name('pay.salary');
    Route::get('/paiad/salaries', 'PaidSalaries')->name('PaidSalaries');
    Route::post('/store/salary', 'StoreSalary')->name('store.salary');
});

Route::controller(AttendanceController::class)->group(function () {
    Route::get('/employee/attendance', 'EmployeeAttendanceList')->name('employee.attendance.list');
    Route::get('/attendance/add', 'attendanceform')->name('attendanceadd');
    
    // Route::get('/pay/salary/{id}', 'PayNowSalary')->name('pay.salary');
    // Route::get('/paiad/salaries', 'PaidSalaries')->name('PaidSalaries');
    Route::post('/store/attendance', 'AddAttendance')->name('attendance.store');
    Route::get('/attendance/list', 'EmployeeAttendanceList')->name('attendance.list');

});

require __DIR__.'/auth.php';
