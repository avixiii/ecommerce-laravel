@extends('admin.main')
@section('content')
    <div class="clearfix">
        <div class="body mt-4">
            <h3>Thêm Danh Mục Sản Phẩm</h3>
            @include('admin.alert')
            <form class="ml-4" method="post">
                <h5>Thông tin chung</h5>
                <div class="form-group">
                    <input value="{{$category->name}}" type="text" name="name" class="form-control" placeholder="Tên danh mục sản phẩm">
                </div>
                <div class="form-group mt-4">
                    <input value="{{$category->description}}" type="text" name="description" class="form-control" placeholder="Mô tả danh mục sản phẩm">
                </div>
                <div style="display: flex" class="form-group mt-4">
                    <input hidden id="value_status" value="{{$category->status}}">
                    <label style="margin-right: 10px" for="">Public</label>
                    <input value="1" id="public" style="margin-top: 5px; margin-left: 12px;" name="status" type="radio">
                </div>
                <div class="form-group">
                    <label for="">Private</label>
                    <input value="0" id="private" style="margin-top: 5px; margin-left: 12px;" name="status" type="radio">
                </div>
{{--                <h5 class="mt-4">SEO</h5>--}}
{{--                <div class="form-group">--}}
{{--                    <input type="text" name="slug" class="form-control" placeholder="Slug">--}}
{{--                </div>--}}
{{--                <div class="form-group mt-4">--}}
{{--                    <input type="text" name="search_engine_title" class="form-control"--}}
{{--                           placeholder="Search engine title">--}}
{{--                </div>--}}
{{--                <div class="form-group form-float">--}}
{{--                <textarea name="search_engine_description" cols="30" rows="5" placeholder="Search engine description"--}}
{{--                          class="form-control no-resize" aria-required="true"></textarea>--}}
{{--                </div>--}}
                <button class="btn btn-raised btn-primary btn-round waves-effect mt-5" type="submit">CHỈNH SỬA DANH MỤC</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>

        let value = document.getElementById("value_status").value
        let public = document.getElementById("public")
        let private = document.getElementById("private")

        if (value == 1) {
            public.checked = true
        } else {
            private.checked = true
        }
    </script>
@endsection
