<div class="mb-3">
    <label for="{{$key}}" class="form-label">{{$labelName}}</label>
    @if($type==='select')
    <select wire:model="{{$name}}" id="{{$key}}" class="custom-select">
        <option value="" selected disabled> Select {{$labelName}}</option>
        @foreach($elements as $key=>$val)
            <option value="{{$val}}" {{ $val== $name?"selected":null }}>{{$key}}</option>
        @endforeach
    </select>
    @elseif($type==='checkbox')
        @foreach($elements as $key=>$val)
        <div class="n-chk">
            <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                <input type="checkbox" class="new-control-input" wire:model="{{$name}}" {{ in_array($val,$name)?"checked":null }}  value="{{$val}}" id="{{$key}}">
                <span class="new-control-indicator"></span><span class="new-chk-content">{{$key}}</span>
            </label>
        </div>
        @endforeach
    @elseif($type==='radio')
        @foreach($elements as $key=>$val)
            <div class="n-chk">
                <label class="new-control new-radio radio-primary">
                    <input type="radio" class="new-control-input" wire:model="{{$name}}" {{ $val== $name?"checked":null }}  value="{{$val}}" id="{{$key}}">
                    <span class="new-control-indicator"></span><span class="new-chk-content">{{$key}}</span>
                </label>
            </div>
        @endforeach
    @endif
    @error($name) <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
</div>

