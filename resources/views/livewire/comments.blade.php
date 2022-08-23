<div style="max-width: 400px;margin: 0 auto;" class="mt-2">
    <form id="form" class="mb-3" wire:submit.prevent="addComment">
        <div class="row">
            <div class="col-md-9">
                <input type="text" name="title" class="form-control" wire:model.lazy="newComment">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    @foreach($comments as $comment)
        <div class="card mb-2" style="">
            <div class="card-body">
                <h5 class="card-title mb-1">{{$comment['creator']}}</h5>
                <span class="small text-muted">{{$comment['created_at']}}</span>
                <p class="card-text mt-2">{{$comment['body']}}</p>
            </div>
        </div>
    @endforeach
</div>
