@extends('admin.main')
@section('content')
    <div class="row clearfix">
        <div class="body table-responsive">
            <table class="table m-b-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>Sản phẩm</th>
                    <th>Bình Luận</th>
                    <th>Trạng thái</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr height="20px" style="cursor: pointer;">
                    <th scope="row">1</th>
                    <td>
                        {{ $comment->username }}
                    </td>
                    <td>{{ $comment->product_name }}</td>
                    <td>{{ $comment->comment_content }}</td>
                    <td>
                        @if($comment->comment_status === false)
                            <form method="post" action="{{ route('dashboard.status', ['id'=> $comment->comment_id]) }}">
                                <button style="cursor: pointer; color: darkred; border: none; background-color: transparent" class="button button-small ml-2" title="Private">
                                    <i class="zmdi zmdi-eye-off"></i>
                                </button>
                                @csrf
                            </form>
                        @else
                            <form method="post" action="{{ route('dashboard.status', ['id'=> $comment->comment_id]) }}">
                                <button style="cursor: pointer; color: darkred; border: none; background-color: transparent" class="button button-small ml-2" title="Private">
                                    <i class="zmdi zmdi-eye"></i>
                                </button>
                                @csrf
                            </form>
                        @endif

                    </td>
                    <td>
                        <form method="post" action="{{ route('dashboard.destroy', ['id'=> $comment->comment_id]) }}">
                            <button style="cursor: pointer; color: darkred; border: none; background-color: transparent" class="button button-small ml-2" title="Private">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
