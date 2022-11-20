<div class="mb-3">
    <label for="{{$key}}" class="form-label">{{$labelName}}</label>
    @if($type==="textarea")
        <textarea id="{{$key}}" class="form-control" wire:model="{{$name}}" rows="4" cols="50" placeholder="Enter {{$labelName}}">
    </textarea>
    @else
        <input type="{{$type}}" class="form-control" wire:model="{{$name}}" id="{{$key}}"
               placeholder="Enter {{$labelName}}">
    @endif
    @error($name) <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
</div>
