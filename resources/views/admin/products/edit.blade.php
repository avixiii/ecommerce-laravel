@extends('admin.main')
@section('style')
    <link rel="stylesheet" href="/admin/plugins/bootstrap-select/css/bootstrap-select.css"/>
@endsection
@section('content')
    <div class="clearfix">
        <div class="body mt-4">
            <h3>Chỉnh Sửa Sản Phẩm</h3>
            @include('admin.alert')
            <form class="ml-4" method="post" enctype="multipart/form-data">
                <h5>Thông tin chung</h5>
                <div class="form-group">
                    <input value="{{ $product->name }}" type="text" name="name" class="form-control" placeholder="Tên danh mục sản phẩm">
                </div>

                <div class="form-group">
                    <div class="form-line">
                        <textarea value="{{ $product->description }}" name="description" rows="4" class="form-control no-resize"
                                  placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 m-b-20">
                        <div class="btn-group bootstrap-select form-control show-tick dropup">
                            <div class="dropdown-menu" role="combobox"
                                 style="max-height: 307.2px; overflow: hidden; min-height: 0px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 42px, 0px);"
                                 x-placement="bottom-start">
                                <ul class="dropdown-menu inner" role="listbox" aria-expanded="false"
                                    style="max-height: 307.2px; overflow-y: auto; min-height: 0px;">
                                    <li data-original-index="0" class=""><a tabindex="0" class="" data-tokens="null"
                                                                            role="option" aria-disabled="false"
                                                                            aria-selected="false"><span class="text">Mustard</span><span
                                                class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="1" class=""><a tabindex="0" class="" data-tokens="null"
                                                                            role="option" aria-disabled="false"
                                                                            aria-selected="false"><span class="text">Ketchup</span><span
                                                class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="2" class="selected"><a tabindex="0" class=""
                                                                                    data-tokens="null" role="option"
                                                                                    aria-disabled="false"
                                                                                    aria-selected="true"><span
                                                class="text">Relish</span><span
                                                class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                </ul>
                            </div>
                            <select name="category_id" class="form-control show-tick" tabindex="-98">
                                <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select></div>
                    </div>
                    <div class="col-sm-6 mt-2 ">
                        <input name="image" id="upload" type="file">
                        <div id="image_show" class="mt-2">
                            <a target="_blank"><img src="{{ $product->image_list }}" width="100px" alt=""></a>
                        </div>
                        <input type="hidden" name="image_list" id="file">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mt-2">
                        <input value="{{ $product->price }}" type="number" name="price" class="form-control" placeholder="Giá sản phẩm">
                    </div>
                    <div class="col-sm-4 mt-2">
                        <input  value="{{ $product->price_sale }}" type="number" name="price_sale" class="form-control" placeholder="Giá Sale">
                    </div>
                    <div class="col-sm-4 mt-2">
                        <input  value="{{ $product->quantity }}" type="number" name="quantity" class="form-control" placeholder="Số lượng sản phẩm có">
                    </div>
                </div>

                <div class="form-group mt-4">
                    <textarea name="content" id="ckeditor">{{ $product->content }}</textarea>
                </div>

                <div class="mb-4">
                    <input {{ $product->status == 1 ?? 'Checked="checked"' }} value="1" name="status" type="radio">
                    <label for="active">
                        Public
                    </label>

                </div>
                <div class="mb-4">
                    <input {{ $product->status == 0 ?? 'Checked="checked"' }} value="0" name="status" type="radio">
                    <label>
                        Private
                    </label>
                </div>
                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">CHỈNH SỬA SẢN PHẨM</button>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="/admin/js/pages/forms/basic-form-elements.js"></script>
    <script src="/admin/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
    <script>
        CKEDITOR.replace('ckeditor')
    </script>
@endsection
