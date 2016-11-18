<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $post = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth.admin:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = '/storage/' . $request->file('file')->store('/upload');
            return response($path, 200);
        } else {
            return response('没有发送文件', 404);
        }
    }

}
