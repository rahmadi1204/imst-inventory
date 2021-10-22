<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PibController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Data\RawController;
use App\Http\Controllers\ImportirController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Data\DataController;
use App\Http\Controllers\NcrVendorController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NcrCustomerController;
use App\Http\Controllers\Data\FinishedController;
use App\Http\Controllers\Data\AuxiliaryController;
use App\Http\Controllers\ReportDocumentController;
use App\Http\Controllers\Data\DataProductController;
use App\Http\Controllers\Data\MasterProductController;
use App\Http\Controllers\Data\HistoryProductController;
use App\Http\Controllers\MutationDocumentController;
use App\Http\Controllers\poProductController;
use App\Models\PoProduct;

// Route Buelum Login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});
// Route Jika Login
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/it-inventory');
    });
    // Menyesuaikan Link Url dengan prefix it-inventory
    Route::prefix('it-inventory')->group(function () {

        Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
        Route::get('/', [AppController::class, 'index'])->name('home');

        Route::get('/users', [UserController::class, 'index'])->name('user');
        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/users/pdf', [UserController::class, 'createPdf'])->name('user.pdf');

        #produk
        #master
        Route::get('/products/master', [MasterProductController::class, 'index'])->name('master.data');
        Route::post('/products/master/add', [MasterProductController::class, 'store'])->name('master.store');
        Route::post('/products/master/update/', [MasterProductController::class, 'update'])->name('master.update');
        Route::post('/products/master/delete', [MasterProductController::class, 'destroy'])->name('master.destroy');

        #data produk
        Route::get('/products/data', [DataProductController::class, 'index'])->name('data');
        Route::get('/products/data/add', [DataProductController::class, 'create'])->name('data.create');
        Route::post('/products/data/add', [DataProductController::class, 'store'])->name('data.store');
        Route::get('/products/data/update/{id}', [DataProductController::class, 'edit'])->name('data.edit');
        Route::post('/products/data/update/{id}', [DataProductController::class, 'update'])->name('data.update');
        Route::post('/products/data/delete', [DataProductController::class, 'destroy'])->name('data.destroy');

        #history produk
        Route::get('/products/history', [HistoryProductController::class, 'index'])->name('history');
        Route::get('/products/history/add', [HistoryProductController::class, 'create'])->name('history.create');
        Route::post('/products/history/add', [HistoryProductController::class, 'store'])->name('history.store');
        Route::get('/products/history/update/{id}', [HistoryProductController::class, 'edit'])->name('history.edit');
        Route::post('/products/history/update/{id}', [HistoryProductController::class, 'update'])->name('history.update');
        Route::post('/products/history/delete', [HistoryProductController::class, 'destroy'])->name('history.destroy');

        #supplier
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
        Route::get('/supplier/add', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/supplier/add', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/supplier/update/{supplier:id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('/supplier/update/{supplier:id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::post('/supplier/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');

        #importir
        Route::get('/importir', [ImportirController::class, 'index'])->name('importir');
        Route::get('/importir/add', [ImportirController::class, 'create'])->name('importir.create');
        Route::post('/importir/add', [ImportirController::class, 'store'])->name('importir.store');
        Route::get('/importir/update/{importir:id}', [ImportirController::class, 'edit'])->name('importir.edit');
        Route::post('/importir/update/{importir:id}', [ImportirController::class, 'update'])->name('importir.update');
        Route::post('/importir/delete', [ImportirController::class, 'destroy'])->name('importir.destroy');

        #customer
        Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
        Route::get('/customer/add', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customer/add', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/customer/update/{customer:id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/customer/update/{customer:id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::post('/customer/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');

        #warehouse
        Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse');
        Route::get('/warehouse/add', [WarehouseController::class, 'create'])->name('warehouse.create');
        Route::post('/warehouse/add', [WarehouseController::class, 'store'])->name('warehouse.store');
        Route::get('/warehouse/update/{warehouse:id}', [WarehouseController::class, 'edit'])->name('warehouse.edit');
        Route::post('/warehouse/update/{warehouse:id}', [WarehouseController::class, 'update'])->name('warehouse.update');
        Route::post('/warehouse/delete', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

        #po
        Route::get('/po', [PoController::class, 'index'])->name('po');
        Route::get('/po/add', [PoController::class, 'create'])->name('po.create');
        Route::post('/po/add', [PoController::class, 'store'])->name('po.store');
        Route::get('/po/update/{po:id}', [PoController::class, 'edit'])->name('po.edit');
        Route::post('/po/update/{po:id}', [PoController::class, 'update'])->name('po.update');
        Route::post('/po/delete', [PoController::class, 'destroy'])->name('po.destroy');

        #poProduct
        Route::post('/po/update/product', [poProductController::class, 'update'])->name('poProduct.update');
        Route::post('/po/delete/product/{id}', [poProductController::class, 'destroy'])->name('poProduct.destroy');

        #pib
        Route::get('/pib', [PibController::class, 'index'])->name('pib');
        Route::get('/pib/add', [PibController::class, 'create'])->name('pib.create');
        Route::post('/pib/add', [PibController::class, 'store'])->name('pib.store');
        Route::get('/pib/update/{pib:id}', [PibController::class, 'edit'])->name('pib.edit');
        Route::post('/pib/update/{pib:id}', [PibController::class, 'update'])->name('pib.update');
        Route::post('/pib/delete', [PibController::class, 'destroy'])->name('pib.destroy');
        Route::get('/pib/list-po-product/{no_po}', [PibController::class, 'getProduct'])->name('pib.get');


        Route::post('/pib/update/container/{pib:id}', [PibController::class, 'updateContainer'])->name('container.update');
        Route::post('/pib/update/product-pib/{pib:id}', [PibController::class, 'updateProductPib'])->name('product_pib.update');

        #ncr_customer
        Route::get('/ncr_customer', [NcrCustomerController::class, 'index'])->name('ncr_customer');
        Route::get('/ncr_customer/add', [NcrCustomerController::class, 'create'])->name('ncr_customer.create');
        Route::post('/ncr_customer/add', [NcrCustomerController::class, 'store'])->name('ncr_customer.store');
        Route::post('/ncr_customer/add_return', [NcrCustomerController::class, 'storeCustomer'])->name('ncr_customer_return.store');
        Route::get('/ncr_customer/update/{po:id}', [NcrCustomerController::class, 'edit'])->name('ncr_customer.edit');
        Route::post('/ncr_customer/update/{po:id}', [NcrCustomerController::class, 'update'])->name('ncr_customer.update');
        Route::post('/ncr_customer/delete', [NcrCustomerController::class, 'destroy'])->name('ncr_customer.destroy');

        #ncr_vendor
        Route::get('/ncr_vendor', [NcrVendorController::class, 'index'])->name('ncr_vendor');
        Route::get('/ncr_vendor/add', [NcrVendorController::class, 'create'])->name('ncr_vendor.create');
        Route::post('/ncr_vendor/add', [NcrVendorController::class, 'store'])->name('ncr_vendor.store');
        Route::post('/ncr_vendor/add_return', [NcrVendorController::class, 'storeVendor'])->name('ncr_vendor_return.store');
        Route::get('/ncr_vendor/update/{po:id}', [NcrVendorController::class, 'edit'])->name('ncr_vendor.edit');
        Route::post('/ncr_vendor/update/{po:id}', [NcrVendorController::class, 'update'])->name('ncr_vendor.update');
        Route::post('/ncr_vendor/delete', [NcrVendorController::class, 'destroy'])->name('ncr_vendor.destroy');

        #report
        #barang perdokumen
        Route::get('/report_document/all', [ReportDocumentController::class, 'index'])->name('report_document');
        Route::get('/report_document/pdf/{id}', [ReportDocumentController::class, 'createPDF'])->name('report_document.pdf');
        Route::get('/report_document/filter', [ReportDocumentController::class, 'docFilter'])->name('report_document.filter');
        Route::get('/report_document/periode', [ReportDocumentController::class, 'docPeriode'])->name('report_document.periode');

        #barang mutasi
        Route::get('/report_mutasi', [MutationDocumentController::class, 'index'])->name('report_mutasi');
    });
});
