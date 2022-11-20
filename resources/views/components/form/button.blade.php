<button type="{{$type}}" class="{{$class}}" @isset($emit) wire:click="{{$emit}}" @endisset>
    @if(isset($icon))
        <i class="fa fa-{{$icon}}"></i>
    @endif
    @if(isset($labelName))
        {{$labelName}}
    @endif
</button>
