<?php

namespace App\Http\Controllers;

use App\Models\PoProduct;
use Illuminate\Http\Request;

class poProductController extends Controller
{
    public function update(Request $request)
    {
    }
    public function destroy(Request $request, $id)
    {

        $code = $request->id;
        $delete = PoProduct::where('code_po_product', $code);
        if ($delete) {
            return redirect()->route('po.edit', $id)->with('Ok', 'Data Dihapus');
        }
        return redirect()->route('po.edit', $id)->with('Fail', 'Data Tidak Dihapus');
    }
}
