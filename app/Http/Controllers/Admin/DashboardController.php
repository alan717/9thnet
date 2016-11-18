<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    public function showSendEmail()
    {
        $data = [
            'title' => '欢迎来到第九网络组',
            'name'  => '***'
        ];
        return view('email.welcome', compact('data'));
    }

    public function showEmailForm()
    {
        return view('admin.users.send-email');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'password' => 'required'
        ]);
        if (Hash::check($request->password, auth('admin')->user()->getAuthPassword())) {
            $users = User::all();
            foreach ($users as $user){
                $data = [
                    'title' => $request->title,
                    'name'  => $user->name,
                ];
                \Mail::to($user->email)->send(new \App\Mail\UserMailer($data));
            }
            return back()->with('status', 'success')->with('count',$users->count());
        }
        return back()->with('status', 'fail');
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
