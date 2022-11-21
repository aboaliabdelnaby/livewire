<div class="mb-3">
    <label for="{{$key}}" class="form-label">{{$labelName}}</label>
    <input type="file" class="form-control" wire:model="{{$name}}" id="{{$key}}"
           placeholder="Enter {{$labelName}}">
    <div wire:loading wire:target="{{$name}}"> Uploading... </div>
    @isset($url)
        <label style="display: block" class="form-label mt-4">Preview</label>
        <img class="img-fluid"  src="{{ $url->temporaryUrl() }}">
    @endisset
    @if(!$url && isset($old))
        <label style="display: block" class="form-label mt-4">Old {{$labelName}}</label>
        <img class="img-fluid"  src="{{asset(Storage::url($old)) }}">
    @endif
    @error($name) <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
</div>
