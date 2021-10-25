<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\PibDevy;
use App\Models\PibLoad;
use App\Models\Currency;
use App\Models\Importir;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\PibInvoice;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use App\Models\PibContainer;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;
use App\Http\Requests\StorePibRequest;
use App\Models\PoProduct;
use App\Models\ReportDocument;

class PibController extends Controller
{

    public function index()
    {
        $data = DB::table('pibs')
            ->join('pib_loads', 'pib_loads.code_pib', '=', 'pibs.code_pib')
            ->join('pib_invoices', 'pib_invoices.code_pib', '=', 'pibs.code_pib')
            ->join('suppliers', 'suppliers.id', '=', 'pibs.supplier_id')
            ->get([
                'pibs.office_pabean',
                'pibs.no_approval',
                'pibs.code_pib',
                'pib_loads.no_register',
                'pib_loads.load_place',
                'pib_loads.load_destination',
                'pib_loads.date_register',
                'pib_invoices.invoice',
            ]);
        // dd($data);
        return view('master_data.pib.pib_index', [
            'data' => $data,
            'title' => "Data PIB",
            'transaksiOpen' => 'menu-open',
            'transaksiActive' => 'active',
            'pibActive' => 'active',
        ]);
    }

    public function create()
    {
        $seller = Supplier::all();
        $importir = Importir::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = DB::table('pos')
            ->join('suppliers', 'suppliers.id', '=', 'pos.supplier_id')->get();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        // dd($currency);
        return view('master_data.pib.pib_create', [
            'seller' => $seller,
            'currency' => $currency,
            'unit' => $unit,
            'po' => $po,
            'importir' => $importir,
            'product' => $product,
            'typeProduct' => $typeProduct,
            'title' => "Data PIB",
            'transaksiOpen' => 'menu-open',
            'transaksiActive' => 'active',
            'pibActive' => 'active',
        ]);
    }

    public function store(StorePibRequest $request)
    {
        $validate = $request->validated();
        // dd($request);
        $request->code_pib = date('ymdhis');
        $request->no_approval = str_replace('-', '', $request->no_approval);
        $request->invoice = str_replace('-', '', $request->invoice);
        $request->sub = str_replace(' ', '', $request->sub);


        DB::beginTransaction();

        try {

            $this->addPibs($request);
            $this->addLoad($request);
            $this->addInvoice($request);
            $this->addContainer($request);
            $this->addProduct($request);
            $this->addDevies($request);
            $this->addHistory($request);
            // $this->addDocument($request);


            DB::commit();
            // dd('OK');

            return redirect()->route('pib')->withInput()->with('Ok', ' Data Tersimpan');
        } catch (\Throwable $th) {
            throw $th;
            dd('gagal');
            return redirect()->route('pib.create')->withInput()->with('Fail', ' Data Tidak Tersimpan');
        }
    }
    public function addPibs($request)
    {
        $add = Pib::insert([
            'code_pib' => $request->code_pib,
            'type_document_pabean' => $request->type_document_pabean,
            'office_pabean' => $request->office_pabean,
            'no_approval' => $request->no_approval,
            'code_po' => $request->code_po,
            'type_pib' => $request->type_pib,
            'type_import' => $request->type_import,
            'payment_method' => $request->payment_method,
            'supplier_id' => $request->name_shipper,
            'seller_id' => $request->name_seller,
            'importir_id' => $request->name_importir,
            'owner_id' => $request->name_owner,
            'name_ppjk' => $request->name_ppjk,
            'npwp_ppjk' => $request->npwp_ppjk,
            'np_ppjk' => $request->np_ppjk,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $add;
    }
    public function addLoad($request)
    {
        $add = PibLoad::insert([
            'code_pib' => $request->code_pib,
            'no_approval' => $request->no_approval,
            'no_register' => $request->no_register,
            'date_register' => $request->date_register,
            'way_transport' => $request->way_transport,
            'name_transport' => $request->name_transport,
            'date_estimate' => $request->date_estimate,
            'load_place' => $request->load_place,
            'load_transit' => $request->load_transit,
            'load_destination' => $request->load_destination,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $add;
    }
    public function addInvoice($request)
    {
        // dd($pib);
        $addInvoice =  PibInvoice::insert([
            'code_pib' => $request->code_pib,
            'no_approval' => $request->no_approval,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'transaction' => $request->transaction,
            'date_transaction' => $request->date_transaction,
            'house_bl' => $request->house_bl,
            'date_house_bl' => $request->date_house_bl,
            'master_bl' => $request->master_bl,
            'date_master_bl' => $request->date_master_bl,
            'bc11' => $request->bc11,
            'date_bc11' => $request->date_bc11,
            'pos' => $request->pos,
            'sub' => $request->sub,
            'facility' => $request->facility,
            'dump' => $request->dump,
            'valuta' => $request->valuta,
            'ndpbm' => $request->ndpbm,
            'value' => $request->value,
            'insurance' => $request->insurance,
            'freight' => $request->freight,
            'pabean_value' => $request->pabean_value,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $addInvoice;
    }
    public function addContainer($request)
    {
        $count = count($request['no_container']);

        for ($i = 0; $i < $count; $i++) {
            // dd($count);
            $add = PibContainer::create([
                'no_approval' => $request->no_approval,
                'code_pib' => $request->code_pib,
                'no_container' => $request->no_container[$i],
                'type_container' => $request->type_container[$i],
                'size_container' => $request->size_container[$i],
                'qty_container' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }
    public function addProduct($request)
    {

        $count = count($request['code_product']);
        // dd($no_approval);
        for ($i = 0; $i < $count; $i++) {
            $add = PibProduct::insert([
                'no_approval' => $request->no_approval,
                'code_po' => $request->code_po,
                'code_pib' => $request->code_pib,
                'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                'code_pib_product' => $request->code_pib . '-' . $request->code_product[$i],
                'no_po' => $request->no_po,
                'date_product' => $request->date_product,
                'pos_product' => $request->pos_product[$i],
                'product_id' => $request->code_product[$i],
                'country_product' => $request->country_product,
                'qty_product' => $request->qty_product[$i],
                'unit_product' => $request->unit_product[$i],
                'netto_product' => $request->netto_product[$i],
                'qty_pack' => $request->qty_pack[$i],
                'type_pack' => $request->type_pack[$i],
                'product_pabean' => $request->value_pabean[$i],
                'type_pabean' => $request->type_pabean,
                'qty_type_product' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }
    public function addDevies($request)
    {
        // dd($request);
        $devies = $request->validate([

            'no_approval' => 'required',
            'code_pib' => 'nullable',
            'bm_paid' => 'nullable',
            'bm_borne' => 'nullable',
            'bm_delay' => 'nullable',
            'bm_taxfree' => 'nullable',
            'bm_free' => 'nullable',
            'bm_paidoff' => 'nullable',
            'bmt_paid' => 'nullable',
            'bmt_borne' => 'nullable',
            'bmt_delay' => 'nullable',
            'bmt_taxfree' => 'nullable',
            'bmt_free' => 'nullable',
            'bmt_paidoff' => 'nullable',
            'cukai_paid' => 'nullable',
            'cukai_borne' => 'nullable',
            'cukai_delay' => 'nullable',
            'cukai_taxfree' => 'nullable',
            'cukai_free' => 'nullable',
            'cukai_paidoff' => 'nullable',
            'ppn_paid' => 'nullable',
            'ppn_borne' => 'nullable',
            'ppn_delay' => 'nullable',
            'ppn_taxfree' => 'nullable',
            'ppn_free' => 'nullable',
            'ppn_paidoff' => 'nullable',
            'ppnbm_paid' => 'nullable',
            'ppnbm_borne' => 'nullable',
            'ppnbm_delay' => 'nullable',
            'ppnbm_taxfree' => 'nullable',
            'ppnbm_free' => 'nullable',
            'ppnbm_paidoff' => 'nullable',
            'pph_paid' => 'nullable',
            'pph_borne' => 'nullable',
            'pph_delay' => 'nullable',
            'pph_taxfree' => 'nullable',
            'pph_free' => 'nullable',
            'pph_paidoff' => 'nullable',
            'total_paid' => 'required',
            'total_borne' => 'required',
            'total_delay' => 'required',
            'total_taxfree' => 'required',
            'total_free' => 'required',
            'total_paidoff' => 'required',
        ]);
        $devies['no_approval'] = $request->no_approval;
        $devies['code_pib'] = $request->code_pib;
        // dd($devies);
        $addDevies = PibDevy::create($devies);
        return $addDevies;
    }

    public function addHistory($request)
    {

        $count = count($request['code_product']);
        // dd($count);
        for ($i = 0; $i < $count; $i++) {
            $add = HistoryProduct::insert([
                'code_po' => $request->code_po,
                'code_pib' => $request->code_pib,
                'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                'code_pib_product' => $request->code_pib . '-' . $request->code_product[$i],
                'product_id' => $request->code_product[$i],
                'unit_product' => $request->unit_product[$i],
                'product_pabean' => $request->value_pabean[$i],
                'date_product' =>  $request->date_product,
                'type_history' =>  1,
                'from' =>  $request->name_shipper,
                'to' =>  $request->name_importir,
                'qty_product' =>  $request->qty_product[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }

    public function edit($id)
    {
        $seller = Supplier::all();
        $importir = Importir::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        // $pib = DB::table('pibs')
        //     ->join('pib_loads', function ($join) {
        //         $join->on('pibs.code_pib', '=', 'pib_loads.code_pib');
        //     })
        //     ->join('pib_invoices', function ($join) {
        //         $join->on('pibs.code_pib', '=', 'pib_invoices.code_pib');
        //     })
        //     ->join('suppliers', function ($join) {
        //         $join->on('pibs.supplier_id', '=', 'suppliers.id');
        //     })
        //     ->join('pib_devies', function ($join) use ($id) {
        //         $join->on('pibs.code_pib', '=', 'pib_devies.code_pib')
        //             ->where('pibs.no_approval', '=', $id);
        //     })
        //     ->first();
        $pib = Pib::with(['po', 'supplier', 'importir', 'pibLoad', 'pibInvoice', 'pibContainer', 'pibProduct.master', 'pibDevy'])
            ->first();
        return view('master_data.pib.pib_edit', [
            'pib' => $pib,
            'seller' => $seller,
            'currency' => $currency,
            'unit' => $unit,
            'po' => $po,
            'importir' => $importir,
            'product' => $product,
            'typeProduct' => $typeProduct,
            'title' => "Data PIB",
            'transaksiOpen' => 'menu-open',
            'transaksiActive' => 'active',
            'pibActive' => 'active',
        ]);
    }
    public function getProduct($id)
    {
        // $id = $request->code_po;
        $product = DB::table('po_products')->where('code_po', '=', $id)
            ->join('master_products', 'master_products.id', '=', 'po_products.product_id')
            // ->pluck('master_products.name_product', 'master_products.id');
            ->get([
                'master_products.id',
                'master_products.code_product',
                'master_products.name_product',
            ]);
        // ->get([
        //     'po_products.code_po',
        //     'master_products.code_product',
        //     'master_products.type_product',
        //     'master_products.name_product',
        // ]);
        // $product = $id;
        return response()->json([
            'data' => $product
        ]);
    }

    public function updateContainer(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $update = PibContainer::where('id', $id)->update([
            'no_container' => $request->no_container,
            'size_container' => $request->size_container,
            'type_container' => $request->type_container,
        ]);
        if ($update) {
            return redirect()->back()->with('Ok', 'Data  Container Diupdate');
        } else {
            return redirect()->back()->with('Fail', 'Data  Container Tidak Diupdate');
        }
    }
    public function destroyContainer(Request $request)
    {
        $cek = count(PibContainer::where('code_pib', $request->code)->select('no_container')->get());
        // dd($cek);
        if ($cek <= 1) {
            return redirect()->back()->with('Fail', 'Data Tidak Boleh Kosong');
        }
        $delete = PibContainer::find($request->id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data  Container Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data  Container Tidak Dihapus');
        }
    }

    public function updateProduct(Request $request)
    {
        // dd($request);
        $id = $request->id;
        DB::beginTransaction();
        try {
            PibProduct::where('code_pib_product', $id)->update([
                'pos_product' => $request->pos,
                'product_id' => $request->code_product,
                'qty_product' => $request->qty_product,
                'unit_product' => $request->unit,
                'qty_pack' => $request->qty_pack,
                'type_pack' => $request->type_pack,
                'product_pabean' => $request->product_pabean,
            ]);
            HistoryProduct::where('code_pib_product', $id)->update([
                'qty_product' => $request->qty_product,
                'unit_product' => $request->unit,
            ]);
            DB::commit();
            return redirect()->back()->with('Ok', 'Data  Product Diupdate');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('gagal');
            return redirect()->back()->with('Fail', 'Data  Product Tidak Diupdate');
        }
    }
    public function destroyProduct(Request $request)
    {
        // dd($request);
        $cek = count(PibProduct::where('code_pib', $request->id)->select('product_id')->get());
        // dd($cek);
        if ($cek <= 1) {
            return redirect()->back()->with('Fail', 'Data Tidak Boleh Kosong');
        }

        DB::beginTransaction();
        try {

            PibProduct::where('code_pib_product', $request->code)->delete();
            HistoryProduct::where('code_pib_product', $request->code)->delete();
            DB::commit();
            return redirect()->back()->with('Ok', 'Data  Container Dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('gagal');
            return redirect()->back()->with('Fail', 'Data  Container Tidak Dihapus');
        }
    }

    public function update(Request $request, $id)
    {
        dd($request);
        DB::beginTransaction();
        Pib::where('code_pib', $id)->update([
            'type_document_pabean' => $request->type_document_pabean,
            'office_pabean' => $request->office_pabean,
            'no_approval' => $request->no_approval,
            'type_pib' => $request->type_pib,
            'type_import' => $request->type_import,
            'payment_method' => $request->payment_method,
            'supplier_id' => $request->name_shipper,
            'seller_id' => $request->name_seller,
            'importir_id' => $request->name_importir,
            'owner_id' => $request->name_owner,
            'name_ppjk' => $request->name_ppjk,
            'npwp_ppjk' => $request->npwp_ppjk,
            'np_ppjk' => $request->np_ppjk,
            'updated_at' => now(),
        ]);
        PibLoad::where('code_pib', $id)->update([
            'no_register' => $request->no_register,
            'date_register' => $request->date_register,
            'way_transport' => $request->way_transport,
            'name_transport' => $request->name_transport,
            'date_estimate' => $request->date_estimate,
            'load_place' => $request->load_place,
            'load_transit' => $request->load_transit,
            'load_destination' => $request->load_destination,
        ]);
        PibInvoice::where('code_pib', $id)->update([
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'transaction' => $request->transaction,
            'house_bl' => $request->house_bl,
            'date_house_bl' => $request->date_house_bl,
            'master_bl' => $request->master_bl,
            'date_master_bl' => $request->date_master_bl,
            'bc11' => $request->bc11,
            'date_bc11' => $request->date_bc11,
            'pos' => $request->pos,
            'sub' => $request->sub,
            'facility' => $request->facility,
            'dump' => $request->dump,
            'valuta' => $request->valuta,
            'insurance' => $request->insurance,
            'freight' => $request->freight,
            'pabean_value' => $request->pabean_value,
            'update_at' => now(),
        ]);
        $containers = count($request->no_container);
        for ($i = 0; $i < $containers; $i++) {
            PibContainer::where('code_pib', $id)->update([
                'no_container' => $request->no_container,
                'size_container' => $request->size_container,
                'type_container' => $request->type_container,
                'qty_container' => $request->qty_container,
                'updated_at' => now(),
            ]);
            $products = count($request->code_product);
            for ($i = 0; $i < $products; $i++) {
                PibProduct::where('code_pib', $id)->update([
                    'country_product' => $request->country_product,
                    'date_product' => $request->date_product,
                    'type_pabean' => $request->type_pabean,
                    'product_id' => $request->code_product[$i],
                    'pos_product' => $request->pos_product[$i],
                    'qty_product' => $request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'netto_product' => $request->netto_product[$i],
                    'qty_pack' => $request->qty_pack[$i],
                    'type_pack' => $request->type_pack[$i],
                    'product_pabean' => $request->product_pabean[$i],
                    'qty_type_product' => $request->qty_type_product[$i],
                    'update_at' => now(),
                ]);
            }
            PibDevy::where('code_pib', $id)->update([

                'code_pib' => $request->code_pib,
                'bm_paid' => $request->bm_paid,
                'bm_borne' => $request->bm_borne,
                'bm_delay' => $request->bm_delay,
                'bm_taxfree' => $request->bm_taxfree,
                'bm_free' => $request->bm_free,
                'bm_paidoff' => $request->bm_paidoff,
                'bmt_paid' => $request->bmt_paid,
                'bmt_borne' => $request->bmt_borne,
                'bmt_delay' => $request->bmt_delay,
                'bmt_taxfree' => $request->bmt_taxfree,
                'bmt_free' => $request->bmt_free,
                'bmt_paidoff' => $request->bmt_paidoff,
                'cukai_paid' => $request->cukai_paid,
                'cukai_borne' => $request->cukai_borne,
                'cukai_delay' => $request->cukai_delay,
                'cukai_taxfree' => $request->cukai_taxfree,
                'cukai_free' => $request->cukai_free,
                'cukai_paidoff' => $request->cukai_paidoff,
                'ppn_paid' => $request->ppn_paid,
                'ppn_borne' => $request->ppn_borne,
                'ppn_delay' => $request->ppn_delay,
                'ppn_taxfree' => $request->ppn_taxfree,
                'ppn_free' => $request->ppn_free,
                'ppn_paidoff' => $request->ppn_paidoff,
                'ppnbm_paid' => $request->ppnbm_paid,
                'ppnbm_borne' => $request->ppnbm_borne,
                'ppnbm_delay' => $request->ppnbm_delay,
                'ppnbm_taxfree' => $request->ppnbm_taxfree,
                'ppnbm_free' => $request->ppnbm_free,
                'ppnbm_paidoff' => $request->ppnbm_paidoff,
                'pph_paid' => $request->pph_paid,
                'pph_borne' => $request->pph_borne,
                'pph_delay' => $request->pph_delay,
                'pph_taxfree' => $request->pph_taxfree,
                'pph_free' => $request->pph_free,
                'pph_paidoff' => $request->pph_paidoff,
                'total_paid' => $request->total_paid,
                'total_borne' => $request->total_borne,
                'total_delay' => $request->total_delay,
                'total_taxfree' => $request->total_taxfree,
                'total_free' => $request->total_free,
                'total_paidoff' => $request->total_paidoff,
            ]);
            $count = count($request->code_product);
            for ($i = 0; $i < $count; $i++) {
                HistoryProduct::where('code_pib_product', $request->code_pib_product[$i])->update([
                    'code_po' => $request->code_po,
                    'code_pib' => $request->code_pib,
                    'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                    'code_pib_product' => $request->code_pib . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => $request->value_pabean[$i],
                    'date_product' =>  $request->date_product,
                    'type_history' =>  1,
                    'from' =>  $request->name_shipper,
                    'to' =>  $request->name_importir,
                    'qty_product' =>  $request->qty_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        try {
            DB::commit();
            return redirect()->route('pib')->with('Ok', 'Data Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('Fail');
            return redirect()->route('pib')->with('Ok', 'Data Gagal Di Update');
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        // dd($id);
        DB::beginTransaction();
        try {
            Pib::where('code_pib', $id)->delete();
            PibInvoice::where('code_pib', $id)->delete();
            PibLoad::where('code_pib', $id)->delete();
            PibDevy::where('code_pib', $id)->delete();
            PibContainer::where('code_pib', $id)->delete();
            PibProduct::where('code_pib', $id)->delete();
            HistoryProduct::where('code_pib', $id)->delete();
            DB::commit();
            return redirect()->route('pib')->with('Ok', 'Data Dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
