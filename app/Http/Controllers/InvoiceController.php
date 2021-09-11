<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use PDF;
use App\CarSale;


class InvoiceController extends Controller
{
   public function createInvoice($id) {
    $invoice = CarSale::where('id', $id)->first();
    $pdf = PDF::loadView('sprzedaz.faktura.pdf', ['invoice'=> $invoice]);

    return $pdf->download('faktura.pdf');
   }
}
