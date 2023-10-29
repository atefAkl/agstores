<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Controllers\Admin\Controller;

class InvoicesController extends Controller
{
    //

    public function index () {
        return view('admin.Sales.invoice.index');
    }

    public function create () {
        $basicData = [];
        $lastInvoice = Invoice::all()->sortByDesc('id')->first();
        $invoiceNumber = $lastInvoice == null ? 1 : $lastInvoice->number + 1;
        $basicData['invoiceNumber'] = $invoiceNumber;
        return view('admin.Sales.invoice.create', $basicData);
    }
}
