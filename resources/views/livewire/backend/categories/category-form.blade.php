<div>
    <form id="app-modal-form">
        @csrf
        <p id="app-modal-form-method"></p>

        <div class="col-md-12">
            <div class="form-group">
                <label>Milestone Name</label>
                <input type="text" name="category" wire:model='category' class="form-control">
                @error("category")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </form>
</div>
