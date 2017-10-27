

<!-- Stored in resources/views/child.blade.php -->

@extends('Admin.dashboard._layout_dashboard')


@section('css_custom_page')
<link href="{{asset('asset_admin/css/styles_add_tintuc.css')}}" rel="stylesheet">
{{--<link rel="stylesheet" href="{{asset('bootstrap_select/dist/css/bootstrap-select.min.css')}}">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.css" />
{{--<script src="{{asset('bootstrap_select/dist/js/bootstrap-select.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.js"></script>
    <script src="{{asset('asset_admin/js/js_tintuc_custom.js')}}"></script>
@endsection
@section('title_dashboard_admin', 'Admin page')

@section('content_dashboard_admin')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Mới Tin Tức</h1>
            </div>

            <!-- /.col-lg-12 -->
        </div>

        <form  method="POST" action="{{route('Save_News_Admin', slug_tintuc)}}">
        {{ csrf_field() }}
            <!-- /.row -->
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable">
                    <strong>Danger!</strong> {{$error}}
                </div>
            @endforeach
            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="TieuDe">tiêu đề:</label>
                        <input type="text" class="form-control " id="TieuDe" name="TieuDe" value="{{ old('TieuDe') }}" onfocusout="create_TieuDeKhongDau(this.value,'TieuDeKhongDau')">
                    </div>
                    <div class="form-group">
                        <label for="TieuDeKhongDau">tiêu đề không dấu(slug):</label>
                        <input type="text" class="form-control" id="TieuDeKhongDau" name="TieuDeKhongDau" value="{{ old('TieuDeKhongDau') }}">
                    </div>
                    <div class="form-group">
                        <label for="editor1">Nội dung:</label>
                        <textarea name="NoiDung" class="form-control " id="editor1" >{{{ old('NoiDung') }}}</textarea>
                        <script> CKEDITOR.replace( 'editor1'); </script>
                    </div>
                    <div class="form-group">
                        <label for="comment">Tóm Tắt:</label>
                        <textarea class="form-control" rows="5" id="comment" name="TomTat" >{{{ old('TomTat') }}}</textarea>


                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Các custom Field (meta key : $slug---hungtt-$name):</label></div>
                        <div class="panel-body ">
                            <div class="form-group">
                                <label for="Seo_Title">*web - Seo Title (slug : seo-title)</label>
                                <input type="text" class="form-control " id="Seo_Title" name="seo-title" value="{{ old('seo-title') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="Seo_Key">*web - Seo Keyword (slug : seo-key)</label>
                                <input type="text" class="form-control " id="Seo_Key" name="seo-key" value="{{ old('seo-key') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="Seo_Des">*web - Seo Description (slug : seo-des)</label>
                                <input type="text" class="form-control " id="Seo_Des" name="seo-des" value="{{ old('seo-des') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="seo_hinh">Seo Image (slug : seo-title)</label>
                                <input type="text" class="form-control label_id_select_popup_popup_1_button" id="seo_hinh" name="seo-hinh" value="{{ old('seo-hinh') }}">
                                <a id="popup_2_seo_hinh" class="btn btn-default" >chọn hình</a>
                            </div>
                            <div class="form-group">
                                <label for="Og_Seo_Title">*og - Seo Title (slug : seo-title)</label>
                                <input type="text" class="form-control " id="Og_Seo_Title" name="og-seo-title" value="{{ old('og-seo-title') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="Og_Seo_Key">*og - Seo Keyword (slug : seo-key)</label>
                                <input type="text" class="form-control " id="Seo_Key" name="og-seo-key" value="{{ old('og-seo-key') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="Og_Seo_Des">*og - Seo Description (slug : seo-des)</label>
                                <input type="text" class="form-control " id="Seo_Des" name="og-seo-des" value="{{ old('og-seo-des') }}"/>
                            </div>
                            <div class="form-group">
                                <label for="seo_hinh3">Seo Image 3 (slug : seo-title)</label>
                                <input type="text" class="form-control label_id_select_popup_popup_1_button" id="seo_hinh3" name="og-seo-hinh" value="{{ old('og-seo-hinh') }}"/>
                                <a id="popup_3_seo_hinh" class="btn btn-default" >chọn hình</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Publish:</label></div>
                        <div class="panel-body ">
                            <div class="form-group">
                                <label for="type_post">Kiểu đăng:</label>
                                <select class="form-control" id="type_post" name="type-post">
                                    <option value="1">Công Khai</option>
                                    <option value="2">Nỗi bật</option>
                                    <option value="3">Chưa Công Bố</option>
                                    <option value="4">Chỉ Có Admin Mới xem được</option>
                                </select>
                            </div>
                            <div class="center-label">
                                <button class="btn btn-success">Publish</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Thể loại:</label></div>
                        <div class="panel-body ">
                            <div class="form-group">
                                <label for="the_loai_chinh">Chọn Thể Loại Chính:</label>
                                <select class="form-control" id="the_loai_chinh" name="the-loai-chinh" onchange="ajax_LoaiTinTheoTheLoai(this, '{{Route("Ajax_Load_LoaiTin_Theo_TheLoai")}}', 'id_Loaitin')">
                                @foreach ($data['theloai'] as $key => $value)
                                        <option value="{{$value['id']}}">{{$value['Ten']}}</option>
                                @endforeach
                                </select>
                                <script>
                                    function ajax_LoaiTinTheoTheLoai(a,o,l){var n=$(a).val();console.log(n),$.ajax({type:"GET",url:o,dataType:"json",data:{id:n},success:function(a){console.log(a),$("#"+l).html(a.html)}})}
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="the_loai_phu">Chọn Các Thể Loại Phụ:</label>
                                <select id="the_loai_phu" class="selectpicker" multiple name="the-loai-phu[]" title="Chưa Có Thể loại Phụ được chọn">
                                    @foreach ($data['theloai'] as $key => $value)
                                        <option value="{{$value['id']}}">{{$value['Ten']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Loại tin:</label></div>
                        <div class="panel-body ">
                            <div class="form-group">
                                <label for="id_Loaitin">Chọn Loại Tin Chính:</label>
                                <select class="form-control" id="id_Loaitin" name="loai-tin-chinh">
                                    @foreach ($data['loaitin'] as $key => $value)
                                        <option value="{{$value['id']}}">{{$value['Ten']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Chọn Các Loại Tin Phụ:</label>
                                <select class="selectpicker" multiple name="loai-tin-phu[]" title="chưa có loại tin được chọn">
                                    @foreach ($data['loaitin'] as $key => $value)
                                        <option value="{{$value['id']}}">{{$value['Ten']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Tag:</label></div>
                        <div class="panel-body ">
                            <div class="form-group">
                                <label for="sel1">Chọn Loại Tag Chính:</label>
                                <select id="the_tag" name="the-tag[]" class="selectpicker" multiple title="chưa có loại tag được chọn">
                                    @foreach ($data['tag'] as $key => $value)
                                        <option value="{{$value['id']}}">{{$value['Ten']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="TagNew">
                                <a class="" href="javascript:void(0)" onclick="addTagNew(this);">+ Add New Category</a>
                                <script>
                                    function addTagNew(e){
                                        var insert_tag = $(e).parent().find('.insert_tag');
                                        //.append('<input type="text" class="form-control" id="TieuDeKhongDau" >');
                                        var index_count = insert_tag.find('input').length;
                                        insert_tag.find('.list_input').append('<input type="text" data-index="'+index_count+'" class="form-control tag_new_non_publish_'+index_count+'"  onkeypress="when_enter_insert_input_new(\''+index_count+'\',event, this)">');
                                        if(index_count === 0 )
                                            insert_tag.append('<a id="Publish_NewTag_response" href="javascript:void(0)" class="Publish_NewTag" onclick = "Ajax_AddListTag(\'{{Route("Ajax_insertNewTag")}}\');">+ Publish</a>');
                                    }
                                    function when_enter_insert_input_new(index_count, e, h){
                                        if(e.keyCode === 13){
                                            e.preventDefault();
                                            index_count++;
                                            $(h).parent().append('<input type="text" data-index="'+index_count+'" class="form-control tag_new_non_publish_'+index_count+'"  onkeypress="when_enter_insert_input_new(\''+index_count+'\',event, this)">');
                                            $("input.tag_new_non_publish_"+index_count).focus();
                                            return false;
                                        }
                                    }
                                    function Ajax_AddListTag(url) {
                                        //tag_index_0
                                        var list_input = $("[class*='tag_new_non_publish']");
                                        var length_list_input = list_input.length;
                                        var ObjTag = {number_page: length_list_input};

                                        for(var i = 0 ; i < length_list_input; i++){
                                            var ten = $(list_input[i]).val();
                                            if(ten!==""){
                                                ObjTag['Ten'+i] = ten;
                                                ObjTag['slug'+i] = string_to_slug(ten);
                                                //var OneObjTag = {Ten: ten, slug:string_to_slug(ten)};
                                                //OneObjTag['Ten'] = ten;
                                                //OneObjTag['slug'] = string_to_slug(ten);//{Ten: ten, slug:string_to_slug(ten)};
                                                //ObjTag.push(OneObjTag);
                                            }else {
                                                ObjTag['number_page'] -- ;
                                            }
                                        }
                                        //console.log(ObjTag);
                                        ///nếu array có values thì mới làm
                                        /// ajax
                                        if (ObjTag.length !== 0) {
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                }
                                            });
                                            $.ajax({
                                                type:'POST',
                                                url: url,
                                                contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                                                dataType: 'json',
                                                data:ObjTag,
                                                success: function(response) {
                                                    //console.log(response);
                                                    if(response.status==="ok"){
                                                        $("#list_input_response").html('');
                                                        $("#Publish_NewTag_response").remove();
                                                        $("#the_tag").html(response.tage_new_html).selectpicker('refresh');
                                                    }
                                                }
                                            });
                                        }
                                    }
                                </script>
                                <div class="insert_tag"><div id="list_input_response" class="list_input">{{--thẻ input--}}</div>{{--thẻ a--}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><label for="Hinh">Hình Thumbnail:</label></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-control label_id_select_popup_popup_1_button" id="Hinh" name="Hinh">
                                <div id="output" class="thumbnail_output"></div>
                            </div>
                            <div class="btn_custom_thumbnail">
                                <a id="popup_1_button" class="btn btn-default" >chọn hình</a>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <script>
        window.CKFinder = {
            _popupOptions: {
                'popup-1-config': { // Config ID for first popup
                    chooseFiles: true,
                    onInit: function( finder ) {
                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            var output = document.getElementById( 'output' );
                            output.innerHTML = "<img src='" + file.getUrl() + "' alt = '" + file.get( 'name' ) + "' />";
                            var Hinh = document.getElementById("Hinh");
                            Hinh.value = file.get( 'name' ) + "";
                        } );
                    }
                },
                'popup-2-config': { // Config ID for second popup
                    chooseFiles: true,
                    skin: 'jquery-mobile',
                    swatch: 'b',
                    onInit: function( finder ) {
                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            var Hinh = document.getElementById("seo_hinh");
                            Hinh.value = file.get( 'name' ) + "";
                        } );
                    }
                },
                'popup-3-config': { // Config ID for second popup
                    chooseFiles: true,
                    skin: 'jquery-mobile',
                    swatch: 'b',
                    onInit: function( finder ) {
                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            var Hinh = document.getElementById("seo_hinh3");
                            Hinh.value = file.getUrl() + "";
                        } );
                    }
                }
            }
        };

        var popupWindowOptions = [
            'location=no',
            'menubar=no',
            'toolbar=no',
            'dependent=yes',
            'minimizable=no',
            'modal=yes',
            'alwaysRaised=yes',
            'resizable=yes',
            'scrollbars=yes',
            'width=800',
            'height=600'
        ].join( ',' );

        document.getElementById( 'popup_1_button' ).onclick = function() {
            // Note that config ID is passed in configId parameter
            window.open( '/ckfinder/ckfinder.html?popup=1&configId=popup-1-config', 'CKFinderPopup1', popupWindowOptions );
        };

        document.getElementById( 'popup_2_seo_hinh' ).onclick = function() {
            window.open( '/ckfinder/ckfinder.html?popup=1&configId=popup-2-config', 'CKFinderPopup2', popupWindowOptions );
        }

        document.getElementById( 'popup_3_seo_hinh' ).onclick = function() {
            window.open( '/ckfinder/ckfinder.html?popup=1&configId=popup-3-config', 'CKFinderPopup3', popupWindowOptions );
        }
    </script>
@endsection


@section('Script_function')
    <script>
        function string_to_slug(st)
        {
            st = st.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            st = st.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            st = st.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            st = st.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            st = st.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            st = st.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            st = st.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            st = st.replace(/đ/gi, 'd');
            st = st.replace(/[\u00C0-\u00C5]/ig,'a');
            st = st.replace(/[\u00C8-\u00CB]/ig,'e');
            st = st.replace(/[\u00CC-\u00CF]/ig,'i');
            st = st.replace(/[\u00D2-\u00D6]/ig,'o');
            st = st.replace(/[\u00D9-\u00DC]/ig,'u');
            st = st.replace(/[\u00D1]/ig,'n');
            st = st.replace(/[^a-z0-9 ]+/gi,'');
            st = st.trim().replace(/ /g,'-');
            st = st.replace(/[\-]{2}/g,'');
            return (st.replace(/[^a-z\- ]*/gi,''));
        }
        function create_TieuDeKhongDau(Ten, idInputSetValues) {
            $("#"+idInputSetValues).val(string_to_slug(Ten));
        }
        var button1 = document.getElementById( 'ckfinder-popup-1' );
        var button2 = document.getElementById( 'ckfinder-popup-2' );


    </script>
@endsection



