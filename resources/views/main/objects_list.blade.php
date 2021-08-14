<i>Access-level - {{$access}}</i>
<h2>Objects: </h2>
@foreach($objects as $object)
    @if($object->access_level <= $access)
        <a href=""><h4>SCP-{{$object->number}}</h4></a>
    @endif
@endforeach