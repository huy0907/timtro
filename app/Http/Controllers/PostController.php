<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\post;
use App\comment;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $post = post::orderBy('id','DESC')->get();
        return view('admin/post/list', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $req)
    {
        $this->validate($req,
        ['category' => 'required',
        'name' => 'required|min:3|unique:post,name',
        'price' => 'required',
        'bedroom' => 'required',
        'description' => 'required',
        'address' => 'required'
        ],
        [
        'category.required' => "Your category cannot empty",
        'name.required' => "Your name cannot empty",
        'bedroom.required' => "Your bedroom cannot empty",
        'description.required' => "Your description cannot empty",
        'price.required' => "Your price cannot empty",
        'address.required' => "Your address cannot empty"
        ]);
        $post = new post;
        $post->category_id = $req->category;
        $post->name = $req->name;
        $post->price = $req->price;
        $post->bedRoom = $req->bedroom;
        $post->description = $req->description;
        $post->address = $req->address;
        $post->isConfirm = 1;
        $post->airConditioning = $req->air;
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();

            $name = str_random(4)."_".$name;
            $file->move("image", $name);
            $post->image = $name;
        }
        else
        {
            $post->image = "";
        }
        $post->save();
        return redirect('admin/post/add')->with('notify', 'Add post sucessfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        $cat = category::all();
        return view('admin/post/add', ['cat'=> $cat]);
    }

    public function getEdit($id)
    {
        $post = post::find($id);
        $cat = category::all();
        return view('admin/post/edit', ['post' => $post, 'cat' => $cat]);
    }

    public function postEdit(Request $req,$id)
    {
        $post = post::find($id);
        $this->validate($req,
        ['category' => 'required',
        'name' => 'required|min:3',
        'price' => 'required',
        'bedroom' => 'required',
        'description' => 'required',
        'address' => 'required'
        ],
        [
        'category.required' => "Your category cannot empty",
        'name.required' => "Your name cannot empty",
        'bedroom.required' => "Your bedroom cannot empty",
        'description.required' => "Your description cannot empty",
        'price.required' => "Your price cannot empty",
        'address.required' => "Your address cannot empty"
        ]);
        $post->category_id = $req->category;
        $post->name = $req->name;
        $post->price = $req->price;
        $post->bedRoom = $req->bedroom;
        $post->description = $req->description;
        $post->address = $req->address;
        $post->airConditioning = $req->air;
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $name = str_random(4)."_".$name;
            $file->move("image", $name);
            $post->image = $name;
        }
        $post->save();
        return redirect('admin/post/edit/'.$id)->with('notify', 'Edit post sucessfully!');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect('admin/post/list')->with('notify', 'Delete post sucessfully!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
