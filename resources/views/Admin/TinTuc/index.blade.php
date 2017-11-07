<!-- Stored in resources/views/child.blade.php -->

@extends('Admin.dashboard._layout_dashboard')

@section('css_custom_page')
    <link href="{{asset('asset_admin/css/index_tintuc.css')}}" rel="stylesheet">
@endsection

@section('title_dashboard_admin', 'Admin page')

@section('content_dashboard_admin')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header clear">
                    <h1 class="title fl">Tất Cả Tin Tức</h1>
                    <a class="jb_btn_insert_link fr" href="{{route('Create_News_Admin',Slug_tintuc)}}">Thêm tin mới</a>
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <table id="page_tin_tuc" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Trang thái</th>
                        <th>Thumbnail</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['Tintuc25Record'] as $key => $value )
                        <tr>
                            <td class="jb_input"><input class="checked_input_select" data-index = "{{$key}}" type="checkbox" value="{{$value['id']}}"></td>
                            <td class="jb_tieude"><a href="{{route('Edit_News_Admin', [slug_tintuc, $value['id']])}}">
                                    {{substr($value['TieuDe'], 0, 40).(strlen($value['TieuDe'])>= 40? '...': "")}}</a> </td>
                            <td>
                                @php
                                if($value['Publish'] != 0){
                                    if($value['Publish'] == 1 && $value['NoiBat'] == 0){
                                        echo "công khai";
                                    }else{
                                        if($value['Publish'] == 1 && $value['NoiBat'] == 1){
                                            echo "nỗi bật";
                                        }else {
                                            if($value['Publish'] == 2){
                                                echo "only admin";
                                            }
                                        }
                                    }
                                }else{
                                    echo "chưa công bố";
                                }
                                @endphp
                            </td>
                            <td><div class="jb_thumbnail" style="background-image: url('{{asset($value['Hinh'])}}');"></div> </td>
                            <td><a class="remove_Record" data-href="{{route('DeleteRecord',$value['id'] )}}" href="#"><img src="{{asset('asset_admin/img/close.png')}}" alt="close"/> </a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @php echo $data['Tintuc25Record']->render(); @endphp
                <div id="ChucNang" class="Option">
                    <label><input id="select_all_record" type="checkbox">Select All</label>
                    <a id="status_off" href="#" class="status_off">tắt trạng thái</a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <script>
        $(document).ready(function(){
            $("#select_all_record").click(function(){
                if($(this).prop('checked')){
                    var table_id =  "page_tin_tuc";
                    $(".checked_input_select").each(function(){
                        $(this).prop('checked', true);
                    });
                }else {
                    var table_id =  "page_tin_tuc";
                    $(".checked_input_select").each(function(){
                        $(this).prop('checked', false);
                    });
                }

            });
        });
        $('.remove_Record').click(function (index, element) {
            var elememtn = element;
            $.ajax({
                type:'GET',
                url: $(this).attr('data-href'),
                contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                dataType: 'json',
                async: false,
                data:{},
                success: function(response) {
                }
            });
            $(this).closest('tr').hide('slow', function(){ $(this).closest('tr').remove(); });
            return false;
        });
        $("#status_off").click(function(){
            var checked_variable = [];
            $("#page_tin_tuc").find(".checked_input_select").each(function(){
                if($(this).prop('checked'))
                    checked_variable.push($(this).val());
            });
            var url = "{{route('UpdateStatusOff')}}";
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
                data:{id: checked_variable},
                success: function(response) {
                    if(response.status === "ok"){
                        alert("tắt trạng thái thành công");
                    }else {
                        alert("tắt trạng thái có lỗi");
                    }
                    return false;
                }
            });
            event.preventDefault();
        });
    </script>
@endsection



