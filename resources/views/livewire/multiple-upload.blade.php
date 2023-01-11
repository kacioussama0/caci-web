<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="files" multiple class="form-control">

        @error('photos.*') <span class="error">{{ $message }}</span> @enderror

    </form>
</div>
