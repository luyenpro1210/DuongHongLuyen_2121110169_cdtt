<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = Post::where($mang)->get();
        $title='Post';
        return view('backend.post.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Post::where('status', '!=', 0)->get();
        $html_topic_id = '';
        $html_type = '';
        foreach ($list as $item)
        {
            $html_topic_id.= '<option value="'. $item->topic_id.'">'. $item->topic_id.'</option>';
            $html_type.= '<option value="'. $item->type.'">'. $item->type.'</option>';
        }
        return view('backend.post.create', compact('html_topic_id','html_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $row = new Post(); //Đối tượng mới
        $row->topic_id = $request->topic_id;
        $row->title = $request->title;
        $row->slug = Str::of($request->title)->slug('-');
        $row->detail = $request->detail;
        $row->type = $request->type;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
        $files = $request->file('image');
        if($files != NULL){
           $extension = $files->getClientOriginalExtension();
           if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
             $filename =  $row->slug. '.' . $extension;
             $row->image = $filename;
             $files->move(public_path('images/post'), $filename);
           }
        }
     //end upload file
     $row->save();
     toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Post::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('post.trash');
        }
        return view('backend.post.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Post::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('post.trash');
       }
        $list = Post::where('status', '!=', 0)->get();
        $html_topic_id = '';
        $html_type = '';
        foreach ($list as $item)
        {
            if($item->id == $row->topic_id)
            {
                $html_topic_id.= '<option selected value="'. $item->topic_id.'">'. $item->topic_id.'</option>';
            }
            else
            {
                $html_topic_id.= '<option value="'. $item->topic_id.'">'. $item->topic_id.'</option>';
            }
            if($item->id== $row->type)
            {
                $html_type.= '<option selected value="'. $item->type .'">' .$item->type.'</option>';
            }
            else
            {
                $html_type.= '<option value="'. $item->type.'">'. $item->type.'</option>';
            }
        }
        return view('backend.post.edit', compact('html_topic_id','html_type', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $row = Post::find($id);
        $row->topic_id = $request->topic_id;
        $row->title = $request->title;
        $row->slug = Str::of($request->title)->slug('-');
        $row->detail = $request->detail;
        $row->type = $request->type;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename =  $row->slug. '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/post'), $filename);
              }
           }
        //end upload file
        $row->save();
        toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Post::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('post.trash');
       }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('post.trash');
    }

    //chức năng thêm
    #get admin/post/trash
    public function trash()
    {
        $list = Post::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.post.trash',compact('title', 'list'));

    }

     #get admin/post/delete/11
     public function delete($id)
     {
         $row = Post::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('post.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('post.index');
     }

     #get admin/post/restore/11
     public function restore($id)
     {
         $row = Post::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('post.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('post.trash');
     }

      #get admin/post/status/11
      public function status($id)
      {
          $row = Post::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('post.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('post.index');
      }


}
