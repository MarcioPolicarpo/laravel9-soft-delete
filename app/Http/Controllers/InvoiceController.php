<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getInvoices()
    {
        $invoices = Invoice::all();
        $totalRecords = $invoices->count();

        return response()->json([
            'total' => $totalRecords,
            'data' => $invoices,
        ]);
    }

    public function getInvoiceById($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            return $invoice;
        } else {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
    }

    public function deleteInvoiceById($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            $invoice->delete();
            return response()->json(['message' => 'Invoice '.$id.' successfully deleted']);
        } else {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
    }

    public function getTrashedInvoiceById($id)
    {
        $invoice = Invoice::onlyTrashed()->find($id);

        if ($invoice) {
            return $invoice;
        } else {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
    }

    public function restoreInvoiceById($id)
    {
        $invoice = Invoice::onlyTrashed()->find($id);

        if ($invoice) {
            $invoice->restore();
            return response()->json(['message' => 'Invoice '.$id.' successfully restored']);
        } else {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
    }

    public function forceDeleteInvoiceById($id)
    {
        $invoice = Invoice::withTrashed()->find($id);

        if ($invoice) {
            $invoice->forceDelete();
            return response()->json(['message' => 'Invoice '.$id.' permanently deleted']);
        } else {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
    }
}
