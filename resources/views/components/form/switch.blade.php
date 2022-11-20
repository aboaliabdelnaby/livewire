<div class="mb-3">
    <label for="{{$key}}" class="form-label float-left mr-4">{{$labelName}}</label>
    <label class="switch s-primary mr-2">
        <input type="checkbox" wire:model="{{$name}}" {{ $active== $name?"checked":null }}  value="{{$active}}"
               id="{{$key}}">
        <span class="slider round"></span>
    </label>
    @error($name) <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
</div>
