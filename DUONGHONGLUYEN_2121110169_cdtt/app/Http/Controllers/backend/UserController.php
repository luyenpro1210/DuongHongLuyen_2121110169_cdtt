<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\user;
use App\Models\category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = User::where($mang)->get();
        $title='User';
        return view('backend.user.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = User::where('status', '!=', 0)->get();
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $row = new User(); //Đối tượng mới
        $row->name = $request->name;
        $row->username = $request->username;
        $row->password = bcrypt($request->password);
        $row->email = $request->email;
        $row->gender = $request->gender;
        $row->phone = $request->phone;
        $row->image = $request->image;
        $row->roles = $request->roles;
        $row->address = $request->address;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename = Str::of($request->name)->slug('-'). '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/user'), $filename);
              }
           }
        //end upload file
        $row->save();
        return view('backend.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = User::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('user.trash');
        }
        return view('backend.user.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = User::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('user.trash');
       }
        $list = User::where('status', '!=', 0)->get();
        return view('backend.user.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $row = User::find($id);
        $row->name = $request->name;
        $row->username = $request->username;
        $row->password = bcrypt($request->password);
        $row->email = $request->email;
        $row->gender = $request->gender;
        $row->phone = $request->phone;
        $row->image = $request->image;
        $row->roles = $request->roles;
        $row->address = $request->address;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename = Str::of($request->name)->slug('-'). '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/user'), $filename);
              }
           }
        //end upload file
        $row->save();
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = User::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('user.trash');
       }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('user.trash');
    }

    //chức năng thêm
    #get admin/user/trash
    public function trash()
    {
        $list = User::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.user.trash',compact('title', 'list'));

    }

     #get admin/user/delete/11
     public function delete($id)
     {
         $row = User::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('user.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('user.index');
     }

     #get admin/user/restore/11
     public function restore($id)
     {
         $row = User::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('user.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('user.trash');
     }

      #get admin/user/status/11
      public function status($id)
      {
          $row = User::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('user.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('user.index');
      }
}
