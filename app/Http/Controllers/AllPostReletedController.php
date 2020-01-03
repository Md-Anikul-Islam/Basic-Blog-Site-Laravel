<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use File;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AllPostReletedController extends Controller
{


    public function write_post()
    {

       $result=DB::table('categories')->get();
       return view('admin.info',compact('result'));
       // return view('admin.info');

    } 


    public function save_post(Request $request)
    {

        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;



        $image=$request->file('image');

        if($image){


        $image_name=Str::random(40);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url= $upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $result=DB::table('posts')->insert($data);


         // echo "<pre>";
         // print_r($data);




        Session::put('messege','Data are Succesully Inserted');
        return Redirect::to('/allpost');

       }
      else{

         $result=DB::table('posts')->insert($data);
         Session::put('messege','Data are Succesully Inserted');
         return Redirect::to('/allpost');

      }

    }


    public function all_post()
    {


       // $result=DB::table('posts')->get();


        $result=DB::table('posts')
                 ->join('categories','posts.category_id','categories.id')
                 ->select('posts.*','categories.name')
                 ->get(); 
               return view('admin.allpost',compact('result'));

         // echo "<pre>";
         // print_r($result);

       // return view('admin.allpost');
    } 



       public function view_post($id)
    {
    

        $result=DB::table('posts')
                 ->join('categories','posts.category_id','categories.id')
                 ->select('posts.*','categories.name')
                 ->where('posts.id',$id)
                 ->first(); 

        return view('admin.view_post',compact('result'));



        //  echo "<pre>";
        // print_r($result);

    }




    public function delete_post($id)
    {
                 $result=DB::table('posts')->where('id',$id)->first();
                 $image=$result->image;



                 //   echo "<pre>";
                 // print_r($result);

                 DB::table('posts')
                ->where('id',$id)
                ->delete();
                  unlink($image);

                Session::get('messege','Data Delete Succesully');
               return Redirect::to('/allpost');

    }



    //  public function edit_post($id)
    // {
    //     $results=DB::table('categories')->get();
    //     $result=DB::table('posts')->where('id',$id)->first();
    //    return view('admin.editpost',compact('results','result'));
    // }


    //   public function update_post(Request $request,$id)
    // {

       
    //     $data=array();
    //     $data['title']=$request->title;
    //     $data['details']=$request->details;

    //     $image=$request->file('image');

    //     if($image){


    //     $image_name=Str::random(40);
    //     $ext=strtolower($image->getClientOriginalExtension());
    //     $image_full_name=$image_name.'.'.$ext;
    //     $upload_path='public/image/';
    //     $image_url= $upload_path.$image_full_name;
    //     $success=$image->move($upload_path,$image_full_name);
    //     $data['image']=$image_url;
    //     unlink($request->old_pic);

    //     $result=DB::table('posts')->where('id',$id)->update($data);


    //     // echo "<pre>";
    //     // print_r($data);
       
        
    //     $result=DB::table('posts')->where('id',$id)->update($data );

    //     Session::put('messege','Data are Succesully Updated');
    //     return Redirect::to('/allpost');



    // }else{

    //      $result=DB::table('posts')->insert($data);
    //      Session::put('messege','Data are Succesully Inserted');
    //      return Redirect::to('/allpost');

    //   }

    // }




    

}










        

       
        
       