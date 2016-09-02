<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $post = null;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => $this->post->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $path = Storage::putFile('covers',$request->file('cover'),'public');
            $cover = Storage::url($path);
            Image::make(public_path().$cover)->resize(350,450)->save();
            $this->validate($request, [
                'title'   => 'required|max:255',
                'cover'   => 'required',
                'content' => 'required|max:20000',
            ]);
            $post = $this->post->create([
                'title'   => $request->title,
                'cover'   => $cover,
                'content' => $request->input('content'),
            ]);
            return redirect('/posts/'.$post->id);
        }
        return back()->withInput()->withErrors([
            'general' => '请上传封面图片',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($post = $this->post->find($id)){
            return view('admin.posts.edit',['post'=>$post]);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($post = $this->post->find($id)){
            $this->validate($request,[
                'title'   => 'required|max:255',
                'content' => 'required|max:20000',
            ]);
            if($request->hasFile('cover') && $request->file('cover')->isValid()){
                $path = Storage::putFile('covers',$request->file('cover'),'public');
                $cover = Storage::url($path);
                Image::make(public_path().$cover)->resize(350,450)->save();
                $post->cover = $cover;
            }else{
                $post->title = $request->title;
                $post->content = $request->input('content');
            }
            $post->save();
            return redirect('/posts/'.$post->id);
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->destroy($id);
    }
}
