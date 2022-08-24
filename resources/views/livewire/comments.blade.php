<div style="max-width: 400px;margin: 0 auto;" class="mt-4">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="small btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <form id="form" class="mb-3" wire:submit.prevent="addComment">
        <div class="row">
            <div class="col-md-9">
                <input type="text" name="title" class="form-control" wire:model.debounce.500ms="newComment">
                @error('newComment') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    @foreach($comments as $comment)
        <div class="card mb-2" style="">
            <div class="card-header">
                <h5 class="card-title mb-1">{{$comment->creator->name}}
                    <button type="button" class="btn btn-sm btn-close float-end" aria-label="Close"
                            wire:click="remove({{$comment->id}})"></button>
                </h5>
            </div>
            <div class="card-body">
                <span class="small text-muted">{{$comment->created_at->diffForHumans()}}</span>
                <p class="card-text mt-2">{{$comment->body}}</p>
            </div>
        </div>
    @endforeach
    {{$comments->links()}}
</div>
