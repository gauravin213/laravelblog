<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $categories = Category::All();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent = $request->parent;
        $category->count = $request->count;
        $category->save();
        return redirect()->route('category.index')->with('success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {   

        /*$ppp = $category->posts;
        echo "<pre>"; print_r($ppp->toArray()); echo "</pre>";
        die();*/

        return view('category.show',compact('category'));
    }


    public function getSingle($slug) {
        $category = Category::where('slug', '=', $slug)->first();
        return view('category.single',compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent = $request->parent;
        $category->count = $request->count;
        $category->update();

        return redirect()->route('category.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }


    //Ajax
    public function ajaxRequest(){

        return view('ajaxRequest');

    }

    public function ajaxRequestPost(Request $request){

        $input = $request->all();


        DB::table('categories')
        ->where('id', $request->child_node)  
        ->limit(1) 
        ->update(array('parent' => $request->parent_node));

        $pppp = array(
            'response' => 'xyz',
            'parent_node' => $request->parent_node,
            'child_node' => $request->child_node
        );

        return response()->json($pppp);

    }

    public function getTreeData(){


        $categories = Category::All();

        $cat_data = $categories->toArray();

        foreach ($cat_data as $valData) {

            if ($valData['parent'] == '#' || $valData['parent'] == 0 || $valData['parent'] == '0') {
                $parent = '#';
            }else{
                $parent = $valData['parent'];
            }
           $data[] = array('id' => $valData['id'], 'parent' => $parent, 'text' => $valData['title']);
        }

        return response()->json($data);

    }



    public function ajaxeditirlRequest(){

        return view('ajaxeditirlRequest');

    }

    public function ajaxeditirlRequestPost(Request $request){

        $input = $request->all();

        $pppp = array(
            'response' => 'xyz',
            'url' =>  '/category/1/edit'
        );

        return response()->json($pppp);

    }
    



}
