<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
//use Illuminate\Support\Facades\Auth;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Post access|Post create|Post edit|Post delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Post create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Post edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Post delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $Post= Post::paginate(4);

    //     return view('post.index',['posts'=>$Post]);
    // }


    // public function index(Request $request)
    // {
    //     $query = Post::query(); // Start with the Post model

    //     // Apply search filter if the search term exists
    //     if ($request->has('search') && !empty($request->search)) {
    //         $search = $request->search;

    //         // Search by title and status
    //         $query->where(function ($q) use ($search) {
    //             $q->where('title', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('publish', 'LIKE', '%' . $search . '%');
    //         });
    //     }

    //     // Paginate the results
    //     $posts = $query->paginate(4);

    //     return view('post.index', ['posts' => $posts]);
    // }

    public function index(Request $request)
    {
        $query = Post::query(); // Start with the Post model

        // Apply search filter if the search term exists
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        // Paginate the results
        $posts = $query->paginate(4);

        return view('post.index', ['posts' => $posts]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $Post = Post::create($data);
        return redirect()->back()->withSuccess('Post created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->back()->withSuccess('Post updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Post deleted !!!');
    }
}
