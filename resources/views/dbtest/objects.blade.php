<i>Access-level - {{$access}}</i>
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
        @if($item->access_level <= $access)

        <li>
            Item: SCP-{{$item->number}} <i>({{$item->name}})</i><br>
            Object class: {{$item->class->title}}<br>
            <img src="images/objects/{{$item->photo}}" style="width: 300px;"><br>

            @foreach($item->page_parts as $page_part)
                @if($page_part->access_level <= $access)
                    @if($page_part->access_level == 1)
                        <div style='background-color: lightgreen'>
                    @elseif($page_part->access_level == 2)
                        <div style='background-color: green'>
                    @elseif($page_part->access_level == 3)
                        <div style='background-color: yellow'>
                    @elseif($page_part->access_level == 4)
                        <div style='background-color: orange'>
                    @elseif($page_part->access_level == 5)
                        <div style='background-color: lightred'>
                    @endif

                    @if($page_part->page_type->name == 'text')
                        {{ $page_part->content }}
                    @elseif($page_part->page_type->name == 'markup-text')
                        {!! $page_part->content !!}
                    @elseif($page_part->page_type->name == 'photo')
                        <img src="images/{{$page_part->content}}" style="width: 300px;">
                    @endif
                        </div>
                        <br>
                @endif
            @endforeach
        </li>

        @endif
    @endforeach
</ul>