<?php

use App\Http\Controllers\Admin\AccountsCategories;
use App\Http\Controllers\Admin\AccountsCategoriesController;
use App\Http\Controllers\Admin\AccountsTypesController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\RepositoriesController;
use App\Http\Controllers\admin\StoresController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ReceiptsController;
use App\Http\Controllers\Admin\ReceiptEntriesController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\TreasuriesController;
use App\Http\Controllers\Admin\SalesCategoriesController;
use App\Http\Controllers\Admin\DashboardSettingController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\ContractsController;
use App\Http\Controllers\Admin\TablesController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PermissionRolesController;
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
Route::group([
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'auth:admin'], function () {

    Route::get('dashboard',                                 [DasboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/',                                         [DasboardController::class, 'index']);
    Route::get('/logout',                                   [LoginController::class, 'logout']);
    Route::get('/dashboard/show',                           [DashboardSettingController::class, 'index'])->name('admin.dashboard.show');

    // Dashboard Rotes
    Route::get('/dashboard/edit',                           [DashboardSettingController::class, 'edit'])->name('admin.dashboard.edit');
    Route::post('/dashboard/update',                        [DashboardSettingController::class, 'update'])->name('admin.dashboard.update');

    // Treasuries Routes
    Route::get('/treasuries/index',                         [TreasuriesController::class, 'index'])->name('treasuries.home');
    Route::get('/treasuries/create',                        [TreasuriesController::class, 'create'])->name('treasuries.add');
    Route::get('/treasuries/edit/{id}',                     [TreasuriesController::class, 'edit'])->name('treasuries.edit');
    Route::get('treasuries/delete/{id}',                    [TreasuriesController::class, 'delete'])->name('treasuries.delete');
    Route::get('treasuries/view/{id}',                      [TreasuriesController::class, 'view'])->name('treasuries.view');
    Route::post('/treasuries/store',                        [TreasuriesController::class, 'store'])->name('treasuries.store');
    Route::post('/treasuries/addpull',                      [TreasuriesController::class, 'addSubTreasury'])->name('treasuries.addpull');
    Route::post('/treasuries/sit/{id}',                     [TreasuriesController::class, 'update'])->name('treasuries.update');
    Route::post('/treasuries/aj',                           [TreasuriesController::class, 'ajax_search'])->name('treasuries.aj');
    Route::post('/treasuries/addmpr/{id}',                  [TreasuriesController::class, 'addmpr'])->name('treasuries.addmpr');
    Route::get('/treasuries/remmpr/{id}',                   [TreasuriesController::class, 'remmpr'])->name('treasuries.remmpr');
    Route::get('/treasuries/test',                          [TreasuriesController::class, 'test'])->name('treasuries.test');
    Route::get('/treasuries/status/{id}',                   [TreasuriesController::class, 'status'])->name('treasuries.status');

    // Sales
    Route::get('/sales/home',                               [SalesController::class, 'index'])->name('sales.home');
    Route::get('/sales/cats/home',                          [SalesCategoriesController::class, 'index'])->name('sales.cats.home');
    Route::get('/sales/cats/create',                        [SalesCategoriesController::class, 'create'])->name('sales.cats.create');
    Route::post('/sales/cats/store',                        [SalesCategoriesController::class, 'store'])->name('sales.cats.store');
    Route::get('/sales/cats/view/{id}',                     [SalesCategoriesController::class, 'view'])->name('sales.cats.view');
    Route::get('/sales/cats/edit/{id}',                     [SalesCategoriesController::class, 'edit'])->name('sales.cats.edit');
    Route::post('/sales/cats/update/{id}',                  [SalesCategoriesController::class, 'update'])->name('sales.cats.update');
    Route::get('/sales/cats/delete/{id}',                   [SalesCategoriesController::class, 'delete'])->name('sales.cats.delete');
    Route::get('/sales/cats/status/{id}',                   [SalesCategoriesController::class, 'status'])->name('sales.cats.status');


    // Sales
    Route::get('/contracts/home',                                           [ContractsController::class, 'index'])->name('contracts.home');
    Route::get('/contract/create/{id}',                                     [ContractsController::class, 'create'])->name('contract.create');
    Route::post('/contract/store/{i}',                                      [ContractsController::class, 'store'])->name('contract.store');
    Route::get('/contract/view/{id}/{t}',                                   [ContractsController::class, 'view'])->name('contract.view');
    Route::get('/contract/edit/{id}/{t}',                                   [ContractsController::class, 'edit'])->name('contract.edit');
    Route::post('/contract/update',                                         [ContractsController::class, 'update'])->name('contract.update');
    Route::post('/contract/approve',                                        [ContractsController::class, 'approve'])->name('contract.approve');
    Route::post('/contract/park',                                           [ContractsController::class, 'park'])->name('contract.park');
    Route::post('/contract/setting',                                        [ContractsController::class, 'setting'])->name('contracts.setting');
    Route::get('/contract/delete/{id}',                                     [ContractsController::class, 'delete'])->name('contract.delete');
    Route::get('/contract/status/{id}',                                     [ContractsController::class, 'status'])->name('contract.status');
    Route::get('/contract/additems',                                        [ContractsController::class, 'additem'])->name('contract.additems');
    Route::get('/contract/receive/{id}',                                    [ContractsController::class, 'receive'])->name('contract.receive');
    Route::post('/contract/storeitems',                                     [ContractsController::class, 'storeContractItems'])->name('contract.items.store');
    Route::post('/contract/updateitem',                                     [ContractsController::class, 'updateContractItems'])->name('contract.items.update');
    Route::get('/contract/deleteitem/{id}',                                 [ContractsController::class, 'deleteContractItem'])->name('contract.item.delete');
    Route::post('/contract/payment/schedule/entry/store',                   [ContractsController::class, 'paymnetSchEntrystore'])->name('contract.payment.entry.store');
    Route::post('/contract/payment/schedule/entry/update',                  [ContractsController::class, 'paymnetSchEntryUpdate'])->name('contract.payment.entry.update');
    Route::get('/contract/payment/schedule/entry/delete/{id}',              [ContractsController::class, 'paymnetSchEntryDelete'])->name('contract.payment.entry.delete');
    Route::get('/contract/extend/{id}',                                     [ContractsController::class, 'extend'])->name('contract.extend');
    Route::get('/contract/receipt/create/{id}/{t}',                         [ContractsController::class, 'createReceipt'])->name('receipt.create');
    Route::post('/contract/receipt/store',                                  [ContractsController::class, 'storeReceipt'])->name('receipt.store');
    Route::get('/contract/delete/items/{id}',                               [ContractsController::class, 'deleteContractItem'])->name('contract.delete.item');
    
    //Services
    Route::get('/services/home',                            [salesController::class, 'services'])->name('services.home');
    Route::get('/services/create',                          [salesController::class, 'createService'])->name('services.create');
    Route::post('/services/store',                          [salesController::class, 'storeService'])->name('services.store');
    Route::get('/services/view/{id}',                       [salesController::class, 'viewService'])->name('services.view');
    Route::get('/services/edit/{id}',                       [salesController::class, 'editService'])->name('services.edit');
    Route::post('/services/update/{id}',                    [salesController::class, 'updateService'])->name('services.update');
    Route::get('/services/delete/{id}',                     [salesController::class, 'deleteService'])->name('services.delete');
    Route::post('/services/status/{id}',                    [salesController::class, 'statusService'])->name('services.status');

################################### MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS ######################################################################################################################################
    //Route::get('/receipts/home',                                    [ReceiptEntriesController::class, 'index'])->name('receipts.home');
    Route::get('/receipts/entries/create/{con}/{cl}',               [ReceiptEntriesController::class, 'create'])->name('receipt.entry.in');
    Route::get('/receipts/entries/out/{con}/{cl}',                  [ReceiptEntriesController::class, 'create_out'])->name('receipt.entry.out');
    Route::post('/receipts/entries/store',                          [ReceiptEntriesController::class, 'store'])->name('receipt.entry.store');
    Route::post('/receipts/entries/store/out',                      [ReceiptEntriesController::class, 'store_out'])->name('receipt.entry.store.out');
    Route::post('/receipts/table/contents',                         [ReceiptEntriesController::class, 'table_contents'])->name('receipt.entry.table.contents');
    Route::post('/receipts/table/item/qty',                         [ReceiptEntriesController::class, 'tableItemQty'])->name('receipt.entry.item.qty');
    Route::post('/receipts/table/item/box',                         [ReceiptEntriesController::class, 'tableItemBox'])->name('receipt.entry.item.box');
    Route::post('/receipts/entries/update',                         [ReceiptEntriesController::class, 'update'])->name('receipt.entry.update');
    Route::get('/receipts/entries/entry/delete/{id}',               [ReceiptEntriesController::class, 'destroy'])->name('receipt.entry.delete');
    Route::get('/receipts/entries/entry/view/{id}',                 [ReceiptEntriesController::class, 'view'])->name('receipt.entry.receipt.view');
    Route::post('/receipts/entries/check/table',                    [ReceiptEntriesController::class, 'checkTable'])->name('receipt.entry.check.table');
    Route::get('/receipts/entries/entry/print/{id}',                [ReceiptEntriesController::class, 'print'])->name('receipt.entry.print');

################################### MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS ######################################################################################################################################

################################### MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS ######################################################################################################################################
    Route::get('/receipts/home',                                    [ReceiptsController::class, 'home'])->name('receipts.home');    
    Route::get('/receipts/in/all',                                  [ReceiptsController::class, 'in_all'])->name('receipts.in.all');
    Route::get('/receipts/out/all',                                 [ReceiptsController::class, 'out_all'])->name('receipts.out.all');
    Route::get('/receipts/test',                                    [ReceiptsController::class, 'test'])->name('receipts.test');
    Route::get('/receipts/create/{id}',                             [ReceiptsController::class, 'create'])->name('receipt.create');
    Route::post('/receipts/store',                                  [ReceiptsController::class, 'store'])->name('receipt.store');
    Route::post('/receipts/edit/{id}',                              [ReceiptsController::class, 'edit'])->name('receipt.edit');
    Route::post('/receipts/update',                                 [ReceiptsController::class, 'update'])->name('receipt.update');
    Route::get('/receipts/destroy/{id}/{a}',                        [ReceiptsController::class, 'destroy'])->name('receipt.destroy');
    Route::get('/receipts/view/{id}',                               [ReceiptsController::class, 'view'])->name('receipt.view');
################################### MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS MOVEMENTS ######################################################################################################################################

################################### GENERAL SETTINGS GENERAL SETTINGS || GENERAL SETTINGS GENERAL SETTINGS ######################################################################################################################################
    //Route::get('/receipts/home',                                    [ReceiptEntriesController::class, 'index'])->name('receipts.home');
    Route::get('/users/home',                                    [UsersController::class, 'index'])->name('users.home');
    Route::get('/users/create',                                  [UsersController::class, 'create'])->name('user.create');
    

################################### GENERAL SETTINGS GENERAL SETTINGS || GENERAL SETTINGS GENERAL SETTINGS ######################################################################################################################################

################################### GENERAL SETTINGS GENERAL SETTINGS || GENERAL SETTINGS GENERAL SETTINGS ######################################################################################################################################
    //Route::get('/receipts/home',                                    [ReceiptEntriesController::class, 'index'])->name('receipts.home');
    Route::get('/permission/roles/home',                        [PermissionRolesController::class, 'index'])->name('permission.reles.home');
    

################################### GENERAL SETTINGS GENERAL SETTINGS || GENERAL SETTINGS GENERAL SETTINGS ######################################################################################################################################

    //Invoices
    Route::get('/sales/invoice/home',                       [InvoicesController::class, 'index'])->name('sales.invoice.home');
    Route::get('/sales/invoice/create',                     [InvoicesController::class, 'create'])->name('sales.invoice.create');
    Route::post('/sales/invoice/store',                     [InvoicesController::class, 'store'])->name('sales.invoice.store');
    Route::get('/sales/invoice/view/{id}',                  [InvoicesController::class, 'view'])->name('sales.invoice.view');
    Route::get('/sales/invoice/edit/{id}',                  [InvoicesController::class, 'edit'])->name('sales.invoice.edit');
    Route::post('/sales/invoice/update/{id}',               [InvoicesController::class, 'update'])->name('sales.invoice.update');
    Route::get('/sales/invoice/delete/{id}',                [InvoicesController::class, 'delete'])->name('sales.invoice.delete');
    Route::get('/sales/invoice/status/{id}',                [InvoicesController::class, 'status'])->name('sales.invoice.status');

    //Invoices
    Route::get('/accounts/home',                            [AccountsController::class, 'index'])->name('accounts.home');
    Route::get('/accounts/journal',                         [AccountsController::class, 'journal'])->name('accounts.journals');
    Route::get('/accounts/chart',                           [AccountsController::class, 'journal'])->name('accounts.chart');
    Route::get('/accounts/setting',                         [AccountsController::class, 'journal'])->name('accounts.setting');
    Route::get('/accounts/create/{t}',                      [AccountsController::class, 'create'])->name('accounts.create');
    Route::post('/accounts/store',                          [AccountsController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/view/{id}',                       [AccountsController::class, 'view'])->name('accounts.view');
    Route::get('/accounts/edit/{id}',                       [AccountsController::class, 'edit'])->name('accounts.edit');
    Route::post('/accounts/update/{id}',                    [AccountsController::class, 'update'])->name('accounts.update');
    Route::get('/accounts/delete/{id}',                     [AccountsController::class, 'delete'])->name('accounts.delete');
    Route::get('/accounts/status/{id}',                     [AccountsController::class, 'status'])->name('accounts.status');

//Invoices
    Route::get('/accounts/cats/home',                       [AccountsCategoriesController::class, 'index'])->name('accounts.cats.home');
    Route::post('/accounts/cats/store',                     [AccountsCategoriesController::class, 'store'])->name('accounts.cats.store');
    Route::get('/accounts/cats/edit/{id}',                  [AccountsCategoriesController::class, 'edit'])->name('accounts.cats.edit');
    Route::post('/accounts/cats/update',                    [AccountsCategoriesController::class, 'update'])->name('accounts.cats.update');
    Route::get('/accounts/cats/delete/{id}',                [AccountsCategoriesController::class, 'delete'])->name('accounts.cats.delete');

    //Account
    Route::get('/clients/home',                             [ClientsController::class, 'index'])->name('clients.home');
    Route::get('/clients/create',                           [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/clients/store',                           [ClientsController::class, 'store'])->name('clients.store');
    Route::get('/clients/view/{id}',                        [ClientsController::class, 'view'])->name('clients.view');
    Route::get('/clients/edit/{id}',                        [ClientsController::class, 'edit'])->name('clients.edit');
    Route::post('/clients/update',                          [ClientsController::class, 'update'])->name('clients.update');
    Route::get('/clients/delete/{id}',                      [ClientsController::class, 'delete'])->name('clients.delete');
    Route::get('/clients/status/{id}',                      [ClientsController::class, 'status'])->name('clients.status');

    // Tables
    Route::get('/tables/home',                              [TablesController::class, 'home'])->name('tables.home');
    Route::get('/table/create',                             [TablesController::class, 'create'])->name('table.create');
    Route::post('/table/store',                             [TablesController::class, 'store'])->name('table.store');
    Route::get('/table/edit/{id}',                          [TablesController::class, 'edit'])->name('table.edit');
    Route::post('/table/update',                            [TablesController::class, 'update'])->name('table.update');
    Route::get('/table/delete/{id}',                        [TablesController::class, 'delete'])->name('table.delete');
    Route::post('/table/search',                            [TablesController::class, 'store'])->name('table.store');
    Route::get('/table/view/{id}',                          [TablesController::class, 'view'])->name('table.view');
    Route::get('/tables/setting',                           [TablesController::class, 'setting'])->name('tables.setting');
    
    // Rooms
    // Tables
    Route::get('/rooms/home',                               [RoomsController::class, 'home'])->name('rooms.home');
    Route::get('/room/create',                              [RoomsController::class, 'create'])->name('room.create');
    Route::post('/room/store',                              [RoomsController::class, 'store'])->name('room.store');
    Route::get('/room/edit/{id}',                           [RoomsController::class, 'edit'])->name('room.edit');
    Route::post('/room/update',                             [RoomsController::class, 'update'])->name('room.update');
    Route::get('/room/delete/{id}',                         [RoomsController::class, 'delete'])->name('room.delete');
    Route::post('/rooms/search',                            [RoomsController::class, 'store'])->name('rooms.search');
    Route::get('/room/view/{id)',                           [RoomsController::class, 'view'])->name('room.view');
    
    //Store
    Route::get('/stores/home',                              [StoresController::class, 'home'])->name('store.home');
    Route::get('/store/create',                             [StoresController::class, 'create'])->name('store.create');
    Route::post('/store/store',                             [StoresController::class, 'store'])->name('store.store');
    Route::get('/store/edit/{id}',                          [StoresController::class, 'edit'])->name('store.edit');
    Route::post('/store/update',                            [StoresController::class, 'update'])->name('store.update');
    Route::get('/store/delete/{id}',                        [StoresController::class, 'delete'])->name('store.delete');
    Route::post('/store/search',                            [StoresController::class, 'store'])->name('store.search');
    Route::get('/store/view/{id}',                          [StoresController::class, 'view'])->name('store.view');
    Route::get('/store/items/home',                         [StoresController::class, 'itemsAndBoxes'])->name('store.items.home');
    Route::post('/store/item/add',                          [StoresController::class, 'addStoreItem'])->name('store.items.add');
    Route::get('/store/items/remove/{id}',                  [StoresController::class, 'removeStoreItem'])->name('store.items.remove');
    Route::post('/store/box/size/add',                      [StoresController::class, 'addBoxSize'])->name('store.box.size.add');
    Route::get('/store/box/size/remove/{id}',               [StoresController::class, 'removeBoxSize'])->name('store.box.size.remove');
    Route::get('/store/settings/{id)',                      [StoresController::class, 'view'])->name('store.settings');
   
    Route::get('/areas/home',                               [StoresController::class, 'areas'])->name('areas.home');
    Route::get('/repositories',                             [RepositoriesController::class, 'home']);
    Route::get('/repositories/home',                        [RepositoriesController::class, 'home'])->name('repositories.home');
    Route::get('/repositories/create',                      [RepositoriesController::class, 'create'])->name('repositories.create');
    Route::post('/repositories/store',                      [RepositoriesController::class, 'store'])->name('repositories.store');
    Route::get('/repositories/settings',                    [RepositoriesController::class, 'settings'])->name('repositories.settings');
    Route::get('/repositories/view/{id}',                   [RepositoriesController::class, 'view'])->name('repositories.view');
    Route::get('/repositories/edit/{id}',                   [RepositoriesController::class, 'edit'])->name('repositories.edit');
    Route::get('/repositories/delete/{id}',                 [RepositoriesController::class, 'delete'])->name('repositories.delete');
    
    // Items
    Route::get('/item/create',                              [ItemsController::class, 'create'])->name('item.create');
    Route::get('/item/copy/{id}',                           [ItemsController::class, 'copy'])->name('item.copy');
    Route::get('/item/view/{id}',                           [ItemsController::class, 'view'])->name('item.view');
    Route::get('/item/edit/{id}',                           [ItemsController::class, 'edit'])->name('item.show');
    Route::post('/item/store',                              [ItemsController::class, 'store'])->name('item.store');
    Route::post('/item/update',                             [ItemsController::class, 'update'])->name('item.update');
    Route::get('/item/delete/{id}',                         [ItemsController::class, 'delete'])->name('item.delete');
    Route::get('/item/home',                                [ItemsController::class, 'home'])->name('items.home');
    Route::get('/item/setting',                             [ItemsController::class, 'setting'])->name('items.setting');
    Route::get('/item/mu/home',                             [ItemsController::class, 'measuringUnitsHome'])->name('items.mu.home');
    Route::get('/item/mu/create',                           [ItemsController::class, 'measuringUnitsCreate'])->name('items.mu.create');
    Route::post('/item/mu/insert',                          [ItemsController::class, 'measuringUnitsInsert'])->name('items.mu.insert');
    Route::get('/item/mu/edit/{id}',                        [ItemsController::class, 'measuringUnitsEdit'])->name('items.mu.edit');
    Route::get('/item/mu/delete/{id}',                      [ItemsController::class, 'measuringUnitsDelete'])->name('items.mu.destroy');
    Route::post('/item/mu/update',                          [ItemsController::class, 'measuringUnitsUpdate'])->name('items.mu.update');
    Route::get('/item/cats/create/{id}',                    [ItemsController::class, 'createItemCat'])->name('items.cats.create');
    Route::get('/item/cats/copy/{id}',                      [ItemsController::class, 'copyItemCat'])->name('items.cats.copy');
    Route::get('/item/cats/home',                           [ItemsController::class, 'itemCatHome'])->name('items.cats.home');
    Route::get('/item/cats/edit/{id}',                      [ItemsController::class, 'itemCatEdit'])->name('items.cats.edit');
    Route::post('/item/cats/store',                         [ItemsController::class, 'itemCatStore'])->name('items.cats.store');
    Route::post('/item/cats/update',                        [ItemsController::class, 'itemCatUpdate'])->name('items.cats.update');
    Route::get('/item/cats/view/{id}',                      [ItemsController::class, 'itemCatView'])->name('items.cats.view');
    Route::get('/item/cats/delete/{id}',                    [ItemsController::class, 'itemCatDelete'])->name('items.cats.delete');


});

Route::group([
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'guest:admin'
    ],
    function () {
        //Route::get('logout',        [LoginController::class, 'logout']);
        Route::get('auth/login',    [LoginController::class, 'index'])->name('admin.auth.login');
        Route::post('login',        [LoginController::class, 'login'])->name('admin.login');
});
