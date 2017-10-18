

<!-- Stored in resources/views/child.blade.php -->

@extends('Admin.dashboard._layout_dashboard')

@section('title_dashboard_admin', 'Admin page')

@section('content_dashboard_admin')
    <script src="{{asset('asset_admin/ckeditor/ckeditor.js')}}"></script>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Mới Tin Tức</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <form>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="email">Title:</label>
                        <input type="text" class="form-control" id="TieuDe">
                    </div>
                    <textarea name="NoiDung" id="NoiDung"></textarea>
                    <script>CKEDITOR.replace('NoiDung');</script>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-3">

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /#page-wrapper -->
@endsection


@section('Script_function')
    <script>
        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    </script>
@endsection



