<?php

namespace App\Http\Controllers;

use App\Models\PibProduct;
use App\Models\PoProduct;
use Illuminate\Http\Request;

class poProductController extends Controller
{
    public function update(Request $request)
    {
        $code = $request->code;
        $qty = $request->qty;
        $latest = $request->latest;
        $total = $qty * $request->price;
        $update = PoProduct::where('code_po_product', $code)->update([
            'qty_product' => $qty,
            'latest' => $latest,
            'total_amount' => $total,
        ]);
        if ($update) {
            return redirect()->back()->with('Ok', 'Data Product Po Telah Di Update');
        }
        return redirect()->back()->with('Fail', 'Data Product Po Gagal Di Update');
    }
    public function destroy(Request $request, $id)
    {
        $code = $request->id;
        $cek = PibProduct::where('code_po_product', '$code')->first();
        // dd($cek);
        if ($cek != null) {
            return redirect()->route('po.edit', $id)->with('Fail', 'Data Dipakai DI Data PIB');
        }
        $delete = PoProduct::where('code_po_product', $code)->delete();
        if ($delete) {
            return redirect()->route('po.edit', $id)->with('Ok', 'Data Dihapus');
        }
        return redirect()->route('po.edit', $id)->with('Fail', 'Data Tidak Dihapus');
    }
}
