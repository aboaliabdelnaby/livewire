<div class="mb-3">
    <label for="{{$key}}" class="form-label">{{$labelName}}</label>
    <input type="{{$type}}" class="form-control" wire:model="{{$name}}" id="{{$key}}"
           placeholder="Enter {{$labelName}}">
    @error($name) <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
</div>
