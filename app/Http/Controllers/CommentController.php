<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\comment;
class CommentController extends Controller
{

    public function getDelete($id, $post_id)
    {
        $cm = comment::find($id);
        $cm->delete();
        return redirect('admin/post/edit/'.$post_id)->with('notify', 'Delete comment sucessfully!');
    }

}
