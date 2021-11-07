@extends('admin.main')
@section('content')
    <div class="clearfix">
        <div class="body mt-4">
            <h3>Thêm Danh Mục Sản Phẩm</h3>
            @include('admin.alert')
            <form class="ml-4" method="post" action="/dashboard/categories/store">
                <h5>Thông tin chung</h5>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Tên danh mục sản phẩm">
                </div>
                <div class="form-group mt-4">
                    <input type="text" name="description" class="form-control" placeholder="Mô tả danh mục sản phẩm">
                </div>
                <div style="display: flex" class="form-group mt-4">
                    <label style="margin-right: 10px" for="">Public</label>
                    <input value="1" style="margin-top: 5px; margin-left: 12px;" name="status" type="radio">
                </div>
                <div class="form-group">
                    <label for="">Private</label>
                    <input checked value="0" style="margin-top: 5px; margin-left: 12px;" name="status" type="radio">
                </div>
                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">THÊM DANH MỤC</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let status = document.getElementById("status")


        status.addEventListener('onchange',function () {
            if (status.checked) {
                status.value = 1
            } else {
                status.value = 0
            }
        })
    </script>
@endsection
