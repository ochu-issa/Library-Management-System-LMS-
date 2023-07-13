<div class=" tab-pane" id="activity">
    <!-- Post -->
    <form action="{{route('comment')}}" method="post" class="form-horizontal">
        @csrf
        <div class="input-group input-group-sm mb-0">
            <input class="form-control form-control-sm" name="comment" placeholder="Type a comment...">
            <div class="input-group-append">
            <input type="hidden" name="book_id" value="{{$book->id}}">
                <button type="submit" class="btn btn-danger">comment</button>
            </div>
        </div>
    </form><br>
    @foreach ($book->comments as $comment)
        <div class="post">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{ asset('profile.png') }}" alt="user image">
                <span class="username">
                    <a href="#">{{$comment->user->full_name}}.</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                </span>
                <span class="description">Shared publicly - {{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <!-- /.user-block -->
            <p>
                {{$comment->comment}}
            </p>
            {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
        </div>
    @endforeach
    <!-- /.post -->
</div>
