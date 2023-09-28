<div>
    <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            wire:model="title" placeholder="Title" aria-describedby="helpId" wire:keyup="generateSlug">
        @error('title')
            <small id="helpId" class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Slug</label>
        <input type="text" name="slug" wire:model="slug" id="title" readonly
            class="form-control @error('slug') is-invalid @enderror" placeholder="Title" aria-describedby="helpId">
        @error('slug')
            <small id="helpId" class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
