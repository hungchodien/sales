<?php

namespace App\Http\Controllers\Admin;

use App\Model\Md_CustomField;
use Dropbox\Exception;
use Illuminate\Http\Request;
use App\Model\Md_TheLoai;
use App\Model\Md_LoaiTin;
use App\Model\Md_Tag;
use App\Model\Md_TinTuc;
use App\Model\Md_Join;
use Illuminate\Support\Facades\Validator;
use App\Model\Md_OptionTable;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('Admin.dashboard.index');
    }
    public function add($slug){
        $data_return = array();
        switch ($slug){
            case slug_tintuc : {
                ///load tất cả thể loại để đưa ra trang view
                $all_theloai = Md_TheLoai::All();
                $all_theloai_view = array();
                foreach ($all_theloai as $key => $value){
                    $all_theloai_view[$key]['id'] = $value['id'];
                    $all_theloai_view[$key]['Ten'] = $value['Ten'];
                    $all_theloai_view[$key]['Publish'] = $value['Publish'];
                }
                /* 0 => array:3 [ "id" => 1 "Ten" => "Xã Hội" "Publish" => 1 ]*/
                $data_return['theloai'] = $all_theloai_view;

                ///load tất cả thể loại để đưa ra trang view
                $all_loaitin = Md_LoaiTin::All();
                $all_loaitin_view = array();
                foreach ($all_loaitin as $key => $value){
                    $all_loaitin_view[$key]['id'] = $value['id'];
                    $all_loaitin_view[$key]['Ten'] = $value['Ten'];
                    $all_loaitin_view[$key]['Publish'] = $value['Publish'];
                }
                /* 0 => array:3 [ "id" => 1 "Ten" => "Xã Hội" "Publish" => 1 ]*/
                $data_return['loaitin'] = $all_loaitin_view;

                ///load tất cả thể loại để đưa ra trang view
                $Md_Tag = new Md_Tag();
                $all_Tag_view = $Md_Tag->where(function ($query) {
                        $query->where('Publish','1');
                    })->where(function ($query) {
                        $query->where('Ten','!=', "''");
                    })->get();
                $all_Tag_view_arr = array();
                foreach ($all_Tag_view as $key => $value){
                    $all_Tag_view_arr[$key]['id'] = $value['id'];
                    $all_Tag_view_arr[$key]['Ten'] = $value['Ten'];
                    $all_Tag_view_arr[$key]['Publish'] = $value['Publish'];
                }
                /* 0 => array:3 [ "id" => 1 "Ten" => "Xã Hội" "Publish" => 1 ]*/


                $data_return['tag'] = $all_Tag_view_arr;
                return view('Admin.TinTuc.add', ['data'=> $data_return]);
            }
                break;
        }
    }
    public function load($slug){
        switch ($slug){
            case slug_tintuc : {
                return view('Admin.TinTuc.index' );
            }
                break;
        }
    }
    private function add_new_TinTuc(){

    }
    public function edit($slug, $id){
        return "trang edit";
    }
    public function save(Request $request , $slug){
        $status = ''; $message = '';
        switch ($slug){
            case slug_tintuc:{
                $rules = [
                    'seo-des' =>'max:200'
                ];
                $messages = [
                    'seo-des.max' => 'phần description có số lượng kí tự nhỏ hơn 255'
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }else {

                    $tintuc = new Md_TinTuc();

                    ///kiểm tra nhập liệu kiểu lưu
                    ///
                    $Publish = 0;$tintuc->NoiBat =0;
                    $type_post = $request->input('type-post');
                    if( $type_post == 1)
                        $Publish = 1;
                    else {
                        if($type_post == 2){
                            $Publish = 1;
                            $tintuc->NoiBat = 1;
                        }else {
                            if($type_post == 3){
                                $Publish = 0;
                            }else {
                                $Publish = 2;
                            }
                        }
                    }
                    $tintuc->TieuDe = $request->TieuDe;
                    $tintuc->TieuDeKhongDau = $request->TieuDeKhongDau;
                    $tintuc->TomTat = $request->TomTat;
                    $tintuc->NoiDung = $request->NoiDung;
                    $tintuc->Hinh = $request->Hinh;
                    $tintuc->Publish = $Publish;
                    $tintuc->keywords = $request->input('seo-key');
                    $tintuc->description = $request->input('seo-des');
                    try{
                        $id = $tintuc->save();
                        if($id){
                            $id = $tintuc->id;
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'seo-title';
                            $customfield->MetaValues =  $request->input('seo-title');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'og-seo-title';
                            $customfield->MetaValues =  $request->input('og-seo-title');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'og-seo-key';
                            $customfield->MetaValues =  $request->input('og-seo-key');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'og-seo-des';
                            $customfield->MetaValues =  $request->input('og-seo-des');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'seo-hinh';
                            $customfield->MetaValues =  $request->input('seo-hinh');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                            $customfield = new Md_CustomField();
                            $customfield->MetaKey = 'og-seo-hinh';
                            $customfield->MetaValues =  $request->input('og-seo-hinh');
                            $customfield->idOptionTable = Id_tintuc;
                            $customfield->post_table = $id;
                            try{$customfield-> save();}catch (\Exception $e){$status = 'error customfield tin'; $message = $e;}
                        }
                        ///insert tag vào table customfiled
                        if($id){
                            $list_tag = $request->input('the-tag');
                            if(count($list_tag)>0){
                                foreach ($list_tag as $values){
                                    ///SELECT * FROM `jb_join` where PostTypeA like '%tag%' or PostTypeB like '%tag%'
                                    $Md_Join = new Md_Join();
                                    $Md_Join->ForeignPostTypeA = $values;
                                    $Md_Join->PostTypeA = Slug_tag;
                                    $Md_Join->ForeignPostTypeB = $id;
                                    $Md_Join->PostTypeB = Slug_tintuc;
                                    try{
                                        $Md_Join->save();
                                    }catch (Exception $e){
                                        $status = 'error tag';
                                        $message = $e;
                                    }
                                }
                            }

                        }
                        if($id){
                            ///loai-tin-chinh
                            $Md_Join = new Md_Join();
                            $Md_Join->ForeignPostTypeA = $request->input('loai-tin-chinh');
                            $Md_Join->PostTypeA = Slug_loaitin;
                            $Md_Join->ForeignPostTypeB = $id;
                            $Md_Join->PostTypeB = Slug_tintuc;
                            try{
                                $Md_Join->save();
                            }catch (Exception $e){
                                $status = 'error loaitin';
                                $message = $e;
                            }
                            ///loai-tin-chinh
                            $Md_Join = new Md_Join();
                            $Md_Join->ForeignPostTypeA = $request->input('the-loai-chinh');
                            $Md_Join->PostTypeA = Slug_theloai;
                            $Md_Join->ForeignPostTypeB = $request->input('loai-tin-chinh');
                            $Md_Join->PostTypeB = Slug_loaitin;
                            try{
                                $Md_Join->save();
                            }catch (Exception $e){
                                $status = 'error thể loại';
                                $message = $e;
                            }

                        }

                        $status = 'ok';
                        $message = "insert thành công";
                        return redirect()->route('Edit_News_Admin', [slug_tintuc, $id] );
                    }catch (Exception $e){
                        $status = 'error';
                        $message = $e;
                    }
                }

            }
            break;
        }
        $response = [
            'status' => $status,
            'message' => $message
        ];
        var_dump($response);
        return response()->json($response, 200);
    }
}
