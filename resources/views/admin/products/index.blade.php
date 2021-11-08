@extends('admin.main')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header d-flex justify-content-between">
                    <h2>{{ $title ?? '' }}</h2>
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="/dashboard/products/add" class="btn btn-default pull-right mr-auto"><i
                                    class="fa fa-plus"></i>Thêm Sản Phẩm</a>
                        </div>
                    </div>
                </div>
                @include('admin.alert')
                <div class="body table-responsive">
                    <table class="table m-b-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ẢNH SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>MÔ TẢ</th>
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ</th>
                            <th>Trạng thái</th>
                            <th>EDIT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr height="20px" style="cursor: pointer;">
                                <th scope="row">{{$product->id}}</th>
                                <td>
                                    <div class="media-object"><img height="60px" src="{{$product->image_list}}">
                                    </div>
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{Str::limit($product->description, 30)}} </td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{number_format($product->price, 0, '.', '.')}} VNĐ</td>
                                <th style="{{ $product->status ? 'color: blue' : 'color: red' }}">{{$product->status == 1 ? 'Public' : 'Private'}}</th>
                                <td>
                                    <a href="/dashboard/products/edit/{{$product->id}}"
                                       style="cursor: pointer; color: #0E2231" class="button button-small" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a onclick="removeRow('{{$product->id, }}', '/dashboard/products/destroy')"
                                       style="cursor: pointer; color: darkred" class="button button-small ml-2"
                                       title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
