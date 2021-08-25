
<form>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>.
      </div>
      <div class="modal-body">
        <div class="form-row">
            <label for="">Title</label>
            <input class="form-control @error('currentPost.title')  is-invalid @enderror" type="text"  id="title" wire:model="currentPost.title"  wire:keydown.enter="save()">
            @error('currentPost.title') <span class="invalid-feedback">{{ $message }}</span> @enderror

        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input class="form-control @error('currentPost.description')  is-invalid @enderror" type="text"  id="description" wire:model="currentPost.description" wire:keydown.enter="save()">
            @error('currentPost.description') <span class="invalid-feedback">{{ $message }}</span> @enderror

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="save()">Save changes</button>
      </div>
</form>
