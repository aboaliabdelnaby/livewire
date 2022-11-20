<a class="{{$class}}" href="{{$href}}">
    @if(isset($icon))
        <i class="fa fa-{{$icon}}"></i>
    @endif
    @if(isset($labelName))
        {{$labelName}}
    @endif

</a>
