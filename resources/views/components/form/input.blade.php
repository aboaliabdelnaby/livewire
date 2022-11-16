<div class="mb-3">
    <label for="{{$key}}" class="form-label">{{$labelName}}</label>
    <input type="{{$type}}" class="form-control" wire:model="{{$name}}" id="{{$key}}"
           placeholder="Enter {{$labelName}}">
    @error($name) <span class="error text-danger">{{ $message }}</span> @enderror
</div>
