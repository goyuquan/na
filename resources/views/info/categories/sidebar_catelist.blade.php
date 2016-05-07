<ul>
    @for ($i = 0; $i < count($categories); $i++)

        <li>
            <a href="{{ url('/infos/category/'.$categories[$i]->id) }}" {{ $category_active == $categories[$i]->name ? "class=active" : "" }}>{{ $categories[$i]->name }}</a>
            @if ( isset($type[$i]) && count($type[$i]) > 0)
                <ul>
                    @foreach ($type[$i] as $cate)
                    <li {{ $category_active == $cate->name ? "class=active" : "" }}>
                        <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endfor
</ul>
