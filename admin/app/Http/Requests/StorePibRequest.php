<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePibRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //form1

            'type_document_pabean' => 'required',
            'office_pabean' => 'required',
            'no_approval' => 'required|unique:pibs,no_approval',
            'no_po' => 'required',
            'code_po' => 'required',
            'type_pib' => 'required',
            'type_import' => 'required',
            'payment_method' => 'required',
            'name_shipper' => 'required',
            'address_shipper' => 'required',
            'name_seller' => 'required',
            'address_seller' => 'required',
            'nik_importir' => 'required',
            'name_importir' => 'required',
            'address_importir' => 'required',
            'status_importir' => 'required',
            'apiu' => 'required',
            'name_owner' => 'required',
            'address_owner' => 'required',
            'name_ppjk' => 'required',
            'npwp_ppjk' => 'required',
            'np_ppjk' => 'required',
            //form2
            'no_register' => 'nullable',
            'date_register' => 'nullable',
            'way_transport' => 'required',
            'name_transport' => 'required',
            'date_estimate' => 'required',
            'load_place' => 'required',
            'load_transit' => 'nullable',
            'load_destination' => 'required',
            //form3
            'invoice' => 'required',
            'date_invoice' => 'required',
            'transaction' => 'nullable',
            'date_transaction' => 'nullable',
            'house_bl' => 'nullable',
            'date_house_bl' => 'nullable',
            'master_bl' => 'nullable',
            'date_master_bl' => 'nullable',
            'bc11' => 'nullable',


            'date_bc11' => 'nullable',
            'pos' => 'nullable',
            'sub' => 'nullable',
            'facility' => 'nullable',
            'dump' => 'nullable',
            'valuta' => 'required',
            'ndpbm' => 'required',
            'value' => 'required',
            'insurance' => 'required',
            'freight' => 'required',
            'pabean_value' => 'required',
            //form4
            'no_container' => 'required',
            'size_container' => 'required',
            'type_container' => 'required',
            //form5
            'date_product' => 'required',
            'pos_product' => 'required',
            'code_product' => 'required',
            'type_product' => 'required',
            'name_product' => 'required',
            'country_product' => 'required',
            'qty_product' => 'required',
            'unit_product' => 'required',
            'netto_product' => 'required',
            'qty_pack' => 'required',
            'type_pack' => 'required',
            'value_pabean' => 'required',
            'type_pabean' => 'required',
        ];
    }
}
