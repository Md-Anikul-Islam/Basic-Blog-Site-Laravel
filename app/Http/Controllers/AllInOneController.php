<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use File;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AllInOneController extends Controller
{

    public function index()
    {

          $result=DB::table('posts')
                 ->join('categories','posts.category_id','categories.id')
                 ->select('posts.*','categories.name','categories.slug')
                 ->paginate(2); 
                 
               return view('admin.index',compact('result'));

        //  return view('admin.index');
    }

	public function main_page()
    {
    	return view('welcome');
    }




    public function contuct_page()
    {
    	return view('admin.contuct');
    }
    public function about_page()
    {
    	return view('admin.about');
    }




    public function home_page()
    {
        return view('Basic');
    }


    //  public function write_post()
    // {

    //    $result=DB::table('categories')->get();
    //    return view('admin.info',compact('result'));
    //    // return view('admin.info');

    // }

       public function add_category()
    {
        return view('admin.add_category');
    }




     public function save_category(Request $request)
    {

        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:20|min:4',
        'slug' => 'required|unique:categories|max:20|min:4',
        ]);
       
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;

        // echo "<pre>";
        // print_r($data);
       
        
        $result=DB::table('categories')->insert($data);

        Session::put('messege','Data are Succesully Inserted');
        return Redirect::to('/allcategory');
    }




    public function all_category()
    {
       //return view('admin.all_category');
       $result=DB::table('categories')->get();
       return view('admin.all_category',compact('result'));

        // echo "<pre>";
        // print_r($result);
       
    }


     public function view_category($id)
    {
       
      // echo "$id";
         $result=DB::table('categories')->where('id',$id)->first();
           return view('admin.view_category',compact('result'));

          //return view('admin.view_category')->with('result',$result);



        //  echo "<pre>";
        // print_r($result);

    }



     public function delete_category($id)
    {
                
                 DB::table('categories')
                ->where('id',$id)
                ->delete();

                Session::get('messege','Data Delete Succesully');
               return Redirect::to('/allcategory');

    }



    public function edit_category($id)
    {
        $result=DB::table('categories')->where('id',$id)->first();
       return view('admin.editcategory',compact('result'));
    }


      public function update_category(Request $request,$id)
    {

        $validatedData = $request->validate([
        'name' => 'required|max:20|min:4',
        'slug' => 'required|max:20|min:4',
        ]);
       
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;

        // echo "<pre>";
        // print_r($data);
       
        
        $result=DB::table('categories')->where('id',$id)->update($data );

        Session::put('messege','Data are Succesully Updated');
        return Redirect::to('/allcategory');
    }


}
