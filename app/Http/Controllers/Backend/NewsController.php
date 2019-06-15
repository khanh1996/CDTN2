<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use App\Models\Users;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::all();
        $data['newsList'] = $news;
       /* dd($data);*/
        return view('backend.new.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.new.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $all =$request->all();
        //dd($all);
        $startDate =  $request->startdate;
        $startDate = Carbon::createFromFormat('d/m/Y',$startDate)->timestamp;


        $news = new News();
        $news->name = $request->name;
        if (!empty($request->status)){
            $news->status = $request->status;
        }
        else{
            $news->status = 0;
        }
        /*$news->startday =  $startDate*/;

        if (!empty($request->image)){
            $filename = $request->image->getClientOriginalName();
            // lưu file
            $request->image->storeAs('images', $filename);
            // chuyền file sang public
            $request->image->move(public_path('/avatars'), $filename);
            // lưu tên ảnh vào DB
            $news->image = $filename;
        }
        else{
            $news->image = null;
            /*dd('chưa có ảnh');*/
        }
        $news->content = $request->description;

        $news->users_id = \Auth::user()->id;



        $news->save();
        return back()->with('flash_success','Đã thêm mới thành công!!! thích quá <3');

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
        $new= News::find($id);
        $data['new'] = $new;
        return view('backend.modal.showNews',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = News::find($id);
        $data['news'] = $news;


        return view('backend.new.edit',$data);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // format lại kiểu ngày sinh thành int
        $all = $request->all();
       /* dd($all);*/

        $data['name'] = $request->name;
        $data['content']  = $request->description;

        $data['users_id'] = \Auth::user()->id;


        if ($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename);
            $request->image->move(public_path('/avatars'), $filename);
            $data['image'] = $filename;
        }
        $update = News::where('id',$id)->update($data);
        if (!empty($update)){
            return back()->with('flash_success','Đã cập nhật thành công!!! thích quá <3');
        }
        else{
            return back()->with('flash_danger','Lỗi chưa thể sửa');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //id ở đây là id ở bên view
        News::destroy($request->id);
        return back();
    }
}
