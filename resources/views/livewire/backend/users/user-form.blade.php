<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="role">Nom du rôle</label>
            <input type="text" class="form-control" id="role" name="role" wire:model.lazy="role">
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
