<section>
    @if(count($categoriess) > 0)
    <label for="parent_category">父类别</label>
    <select name="parent_category" id="parent_category">
        @foreach ( $categoriess as $category )
        <option value="{{$category->id}}"
            @if($category->id == $current_category->parent_id)
             selected="selected"
             @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
    @endif
    &nbsp;&nbsp;
    @if(count($categories) > 0)
    <label for="category">类别</label>
    <select name="category_id" id="category">
        @foreach ( $categories as $category )
        <option value="{{$category->id}}" data-parent="{{$category->parent_id}}"
            @if($category->id == $current_category->id)
            selected="selected"
            @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
    @endif
</section>
