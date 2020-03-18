<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Gate;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    private $userId;

    public function __construct()
    {
       $this->middleware(function ($request, $next) {

            $role = $this->userId = Auth::user()->user_type;

            if ($role != 'admin') {
                abort(404,"Sorry, You can do this actions");
            }

            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$user = Auth::user();
        echo '<pre>'; print_r($user->toArray()); echo "</pre>";*/


        /*if(!\Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }*/
        
        $query = DB::table('posts');

        if (isset($_GET['fl'])) {

            /*if (!empty($_GET['id'])) {
                $query = $query->where('id', 'like', $_GET['id']);
            }
            if (!empty($_GET['title'])) {
                $query = $query->where('title', 'like', $_GET['title']);
            }
            if (!empty($_GET['status'])) {
                $query = $query->where('status', 'like', $_GET['status']);
            }
            $blogs = $query->get();*/


            $matchThese = array();
            
            if (!empty($_GET['id'])) {
                $matchThese[] = array('id', 'like', $_GET['id']);
            }

            if (!empty($_GET['title'])) {
                $matchThese[] = array('title', 'like', $_GET['title']);
            }

            if (!empty($_GET['status'])) {
                $matchThese[] = array('status', 'like', $_GET['status']);
            }


            $posts = Post::where($matchThese)->get();

            /*echo "<pre>"; print_r($matchThese); echo "</pre>"; 
            echo "<pre>"; print_r($blogs->toArray()); echo "</pre>"; 
            die();*/

        }else{

            $posts = Post::All();

            //echo "<pre>"; print_r($blogs->toArray()); echo "</pre>";die();

        }

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();

        $post->author = $request->author;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        
        $cover = $request->file('bookcover');
        if (!empty($cover)) {
             $extension = $cover->getClientOriginalExtension();
             Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
             $post->image = $cover->getFilename().'.'.$extension; //$request->image;
        }else{
             $post->image = 'iiiii';
        }

        $post->status = $request->status;
        $post->save();
        return redirect()->route('post.index')->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->author = $request->author;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->description = $request->description;

        $cover = $request->file('bookcover');
        if (!empty($cover)) {
             $extension = $cover->getClientOriginalExtension();
             Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
             $post->image = $cover->getFilename().'.'.$extension; //$request->image;
        }

        $file_remove = $request->file_remove;
        if (!empty($file_remove) && $file_remove == 'file_remove_img') {
            $post->image = 'iiiii';
        }

        $post->status = $request->status;

        $post->update();

        return redirect()->route('post.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('post.index')
                        ->with('success','Post deleted successfully');
    }
}
