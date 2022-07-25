<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = new Product();
        $data->name= $request->name;
        $data->pswd = $request->pswd;
        $data->save();
        return redirect()->route('table')->with('message', 'Data Inserted SuccesFully');

        # code...
    }
    public function table()
    {
        $data=product::paginate(5);
        return view('table', compact('data'));
    }
    public function edit($id){
        $data=Product::find($id);
        return view('edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data= Product::find($id);
        $data->name=$request->name;
        $data->pswd=$request->pswd;
        $data->save();
        return redirect()->route('table')->with('message', 'Data Updated SuccesFully');
    }
    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('table');

    }

}
