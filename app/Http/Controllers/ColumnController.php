<?php

namespace App\Http\Controllers;

use App\Category;
use App\Column;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ColumnController extends Controller
{

    public function index()
    {
        $categories = $categoriess = Category::all();
        return view('admin.column.index',[
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function column($id)
    {
        $category = Category::find($id);
        $columns = $category->column;
        return view('admin.column.column',[
            'category' => $category,
            'columns' => $columns
        ]);
    }

    public function create(Request $request,$id)
    {
        $messages = [
            'name.required' => '字段名不能为空',
            'name.max' => '字段名不能大于:max位',
            'name.min' => '字段名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:50',
        ],$messages);

        $column = new Column;

        $column->name = $request->name;
        $column->category_id = $request->category;
        $column->save();

        Session()->flash('column', 'column create was successful!');

        return redirect('/admin/column/category/'.$id);
    }

    public function edit($id)
    {
        $category = Column::find($id)->category;
        $columns = $category->column;
        return view('admin.column.edit',[
            'category' => $category,
            'columns' => $columns,
            'edit' => $id
        ]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'name.required' => '字段名不能为空',
            'name.max' => '字段名不能大于:max位',
            'name.min' => '字段名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:50',
        ],$messages);

        $Column = Column::find($id);

        if ($Column->name != $request->name){
            $Column->name = $request->name;
        }
        $Column->update();

        $category = $Column->category->id;

        Session()->flash('Column', 'Column update was successful!');

        return redirect('/admin/column/category/'.$category);
    }

    public function destroy($id)
    {
        $Column = Column::find($id);
        $category = $Column->category->id;
        Column::destroy($id);
        return redirect('/admin/column/category/'.$category);
    }

}
