@foreach($comments as $comment)
    @if($comment->status)
        <div class="feedback">
            <div class="feedback-item">
                <div class="feedback__author">
                    {{ $comment->customer->full_name }} <span class="date">{{$comment->created_at}}</span>
                    <a href="{{ route('comments.destroy', ['id' => $comment->id])}}" class="btn-delete-comment">
                        <ion-icon name="close-circle-outline"></ion-icon>
                    </a>
                </div>
                <div class="feedback__content">
                    {{$comment->content}}
                </div>

            </div>

        </div>
    @endif
@endforeach
