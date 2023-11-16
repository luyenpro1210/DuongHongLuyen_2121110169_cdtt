<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\contact;
use App\Models\user;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = Contact::where($mang)->get();
        $title='Contact';
        return view('backend.contact.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Contact::where('status', '!=', 0)->get();
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $args = [
            ['status', '=', '1'],
            ['roles', '=', 1],
            ['username', '=', 'admin']
        ];
        $list_user = User::where($args)
        ->get();
        $row = new Contact(); //Đối tượng mới
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->title = $request->title;
        $row->detail = $request->detail;
        $row->replaydetail = $request->replaydetail;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by = 1;
        $row->status = 1;
        $row->save();
        return view('frontend.contact', compact('list_user'));
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $row = Contact::find($id);
        if($row==null)
        {
           return redirect()->route('contact.trash');
        }
        return view('backend.contact.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $row = Contact::find($id);
        if($row==null)
        {
           return redirect()->route('contact.trash');
        }
        return view('backend.contact.edit', compact('row'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request,  $id)
    {
        $row =Contact::find($id);
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->title = $request->title;
        $row->detail = $request->detail;
        $row->replaydetail = $request->replaydetail;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $row = Contact::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('contact.trash');
        }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('contact.trash');
    }

        //chức năng thêm
    #get admin/contact/trash
    public function trash()
    {
        $list = Contact::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Contact';
        return view('backend.contact.trash',compact('title', 'list'));

    }

     #get admin/contact/delete/11
     public function delete($id)
     {
         $row = Contact::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('contact.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('contact.index');
     }

     #get admin/contact/restore/11
     public function restore($id)
     {
         $row = Contact::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('contact.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('contact.trash');
     }

      #get admin/contact/status/11
      public function status($id)
      {
          $row = Contact::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('contact.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('contact.index');
      }


}
