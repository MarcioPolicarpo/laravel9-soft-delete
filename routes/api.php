<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(InvoiceController::class)->prefix('/invoice')->group(function () {
    Route::get('/', 'getInvoices');
    Route::get('/{id}/info', 'getInvoiceById');
    Route::delete('/{id}/delete', 'deleteInvoiceById');
    Route::put('/{id}/restore', 'restoreInvoiceById');
    Route::delete('/{id}/forcedelete', 'forceDeleteInvoiceById');
    Route::get('/{id}/trashed', 'getTrashedInvoiceById');
});
