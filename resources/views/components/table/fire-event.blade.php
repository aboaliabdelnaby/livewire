<button class="{{$class}}" wire:click="{{$emit}}">
    @if(isset($icon))
        <i class="fa fa-{{$icon}}"></i>
    @endif
    @if(isset($labelName))
        {{$labelName}}
    @endif
</button>
