<h1>Object classes</h1>
<ul>
    @foreach($classes as $class)
        <li>
            <h3>{{$class->title}}</h3>
            <img src="images/object-classes/{{$class->icon}}" style="width: 50px; height: 50px;">
        </li>
    @endforeach
</ul>
<hr>
<h1>Objects: </h1>
<ul>
    @foreach($items as $item)
        <li>
            Item: SCP-{{$item->number}} <i>({{$item->name}})</i><br>
            Object class: {{$item->class->title}}<br>
            <img src="images/objects/{{$item->photo}}" style="width: 300px;"><br>
        </li>
    @endforeach
</ul>