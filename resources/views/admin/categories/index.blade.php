@extends('admin.main')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="header d-flex justify-content-between">
                    <h2><strong>{{$title ?? ''}}</strong></h2>
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="/dashboard/categories/add" class="btn btn-default pull-right mr-auto"><i
                                    class="fa fa-plus"></i>&nbsp;&nbsp; Thêm danh mục</a>
                        </div>
                    </div>
                </div>
                @include('admin.alert')
                <div class="body table-responsive">
                    <table id="table-category" class="table m-b-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr style="cursor: pointer">
                                <th onclick="window.location='/dashboard/categories/edit/{{$category->id}}';"
                                    scope="row">{{$category->id}}</th>
                                <td onclick="window.location='/dashboard/categories/edit/{{$category->id}}';">{{$category->name}}</td>
                                <td onclick="window.location='/dashboard/categories/edit/{{$category->id}}';">{{$category->description}}</td>
                                <td>{{ $category->products ? $category->products->count() : 0 }}</td>
                                <td style="{{ $category->status ? 'color: blue' : 'color: red' }}" >{{ $category->status ? 'public' : 'private' }}</td>
                                <td>
                                    <a href="/dashboard/categories/edit/{{$category->id}}"
                                       style="cursor: pointer; color: #0E2231" class="button button-small" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a onclick="removeRow('{{$category->id, }}', '/dashboard/categories/destroy',this)"
                                       style="cursor: pointer; color: darkred" class="button button-small ml-2 btn-delete-category"
                                       title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center" class="paginate">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style type="text/css">
        .paginate {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
@endsection
