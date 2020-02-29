<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CategoryRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $query = DB::table('blogs');

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


            $blogs = Blog::where($matchThese)->get();

            /*echo "<pre>"; print_r($matchThese); echo "</pre>"; 
            echo "<pre>"; print_r($blogs->toArray()); echo "</pre>"; 
            die();*/

        }else{

            $blogs = Blog::All();

            //echo "<pre>"; print_r($blogs->toArray()); echo "</pre>";die();

        }

        return view('blog.index',compact('blogs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    
        $blog = new Blog();

        $blog->author = $request->author;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->status = $request->status;
        $blog->save();

        /*$categoryRelationship = new CategoryRelationship();
        $categoryRelationship->category_id = $request->category_id;
        $categoryRelationship->post_id = $blog->id;
        $categoryRelationship->save();*/

        return redirect()->route('blog.index')->with('success','Blog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {   
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {   


        $cover = $request->file('bookcover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $blog->author = $request->author;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->image = $cover->getFilename().'.'.$extension; //$request->image;
        $blog->status = $request->status;

       /* $book->mime = $cover->getClientMimeType();
        $book->original_filename = $cover->getClientOriginalName();*/
        //$book->filename = $cover->getFilename().'.'.$extension;


        $blog->update();

        /*DB::table('category_relationships')
        ->where('post_id', $request->post_id)  
        ->limit(1) 
        ->update(array('category_id' => $request->category_id));*/ 

        return redirect()->route('blog.index')->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('blog.index')
                        ->with('success','Blog deleted successfully');
    }
}
