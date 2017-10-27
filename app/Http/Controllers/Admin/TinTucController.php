<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Md_LoaiTin;
use App\Model\Md_Join;
use App\Model\Md_Tag;


class TinTucController extends Controller
{
    public function index(){

    }
    public function LoaiTinCuaTheLoai(Request $request){
        $id = $request->input('id');

        $Md_Join = new Md_Join();
        $dataa = $Md_Join->where(function ($query)  use ($id) {
            $query->where('ForeignPostTypeA', '=', $id);
        })->where(function ($query) {
            $query->where('PostTypeA', '=', 'the-loai');
        })->where(function ($query) {
            $query->where('PostTypeB', '=', 'loai-tin');
        })->get();

        $arrayIn = array();
        foreach ($dataa as $value){
            array_push($arrayIn,$value['ForeignPostTypeB']);
        }
        $Md_LoaiTin = new Md_LoaiTin();
        $data_Loaitin = $Md_LoaiTin->whereIn('id', $arrayIn)->get();

        $htmlSelect = "";
        foreach ($data_Loaitin as $value){
            $htmlSelect .= "<option value=".$value['id'].">".$value['Ten']."</option>";
        }

        $data_return = $dataa;
        $response = [
            'data' => $data_return,
            'id' => $id,
            'arrayIn'=> $arrayIn,
            'data_loaitin' => $data_Loaitin,
            'html'=> $htmlSelect
        ];
        return response()->json($response, 200);
    }
    public  function  insertNewTag(Request $request){
        $array_of_item_number = $request->input('number_page');
        $arr_tag = array();
        for($i = 0 ; $i < $array_of_item_number ; $i++){
            $one_array = array();
            $one_array['Ten'] = $request->input('Ten'.$i);
            $one_array['slug'] = $request->input('slug'.$i);
            array_push($arr_tag, $one_array);
        }
        $Md_Tag = new Md_Tag();
        $Md_Tag->insert($arr_tag);


        $Md_Tag = new Md_Tag();
        $all_Tag_view = $Md_Tag->where(function ($query) {
            $query->where('Publish','1');
        })->where(function ($query) {
            $query->where('Ten','!=', "''");
        })->get();
        $all_Tag_view_arr = array();
        $stringOptionTagNew = "";
        foreach ($all_Tag_view as $key => $value){
            //<option value="{{$value['id']}}">{{$value['Ten']}}</option>
            $stringOptionTagNew .= '<option value="'.$value['id'].'">'.$value['Ten'].'</option>';
            $all_Tag_view_arr[$key]['id'] = $value['id'];
            $all_Tag_view_arr[$key]['Ten'] = $value['Ten'];
            $all_Tag_view_arr[$key]['Publish'] = $value['Publish'];
        }

        $response = [
            'data' => $arr_tag,
            'status' => 'ok',
            'tag_new' => $all_Tag_view_arr,
            'tage_new_html' => $stringOptionTagNew
        ];
        return response()->json($response, 200);
    }
}
