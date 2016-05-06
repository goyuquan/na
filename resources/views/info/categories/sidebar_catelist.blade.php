<ul>
    @for ($i = 0; $i < count($categoriess); $i++)
        <li><a href="#">{{ $categoriess[$i]->name }}</a>
            @if ( isset($type[$i]) && count($type[$i]) > 0)
                <ul>
                    @foreach ($type[$i] as $cate)
                    <li>
                        <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endfor
</ul>
