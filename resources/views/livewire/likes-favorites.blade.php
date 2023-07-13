<div class="row">
    <div class="col col-md-4">
        <button class="btn btn-app bg-info" >
            <span class="badge bg-danger">{{$favorites}}</span>
            <i class="fas fa-heart"></i> Favorites
        </button>
    </div>
    <div class="col col-md-2"></div>
    <div class="col col-md-4">
        <button class="btn btn-app @if($isLiked) bg-secondary @else bg-light @endif " wire:click='like'>
            <span class="badge bg-danger">{{$likes}}</span>
            <i class="fas fa-thumbs-up"></i> Likes
        </button>
    </div>
</div>
