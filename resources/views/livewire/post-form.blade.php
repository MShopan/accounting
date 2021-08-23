
<div class="form post-form" action="">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal 11</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-control">
            <label for="">title</label>
            <input type="text" name="" id="title" wire:model.defer="currentPost.title">
        </div>
        <div class="form-control">
            <label for="">description</label>
            <input type="text" name="" id="description" wire:model.defer="currentPost.description">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="save()">Save changes</button>
      </div>
</div>
