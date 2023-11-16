<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\config;
use App\Models\link;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '=', 1]];
        $list = Config::where($mang)->get();
        $title='Config';
        return view('backend.config.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Config::where('status', '!=', 0)->get();
        return view('backend.config.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfigRequest $request)
    {
        $row = new Config(); //Đối tượng mới
        $row->site_name = $request->site_name;
        $row->author = $request->author;
        $row->email = $request->email;
        $row->phone = $request->phone;
     //   $row->facebook = $request->facebook;
     //   $row->twitter = $request->twitter;
      //  $row->youtube = $request->youtube;
      //  $row->googleplus = $request->googleplus;
        $row->status = $request->status;
        if($row->save())
        {
            $link = new Link();
            $link->slug = Str::of($request->site_name)->slug('-');
            $link->type = 'config';
            $link->table_id =  $row->id;
            $link->save();
        }    
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('config.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Config::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('config.trash');
        }
        return view('backend.config.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Config::find($id);
        if($row==null)
        {
           return redirect()->route('config.trash');
       }
        $list = Config::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            if($item->id == $row->parent_id)
            {
                $html_parent_id.= '<option selected value="'. $item->id.'">'. $item->name.'</option>';
            }
            else
            {
                $html_parent_id.= '<option value="'. $item->id.'">'. $item->name.'</option>';
            }
            if($item->sort_order== $row->sort_order-1)
            {
                $html_sort_order.= '<option selected value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
            }
            else
            {
                $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
            }
        }
        return view('backend.config.edit', compact('html_parent_id','html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigRequest $request, $id)
    {
        $row = Config::find($id);
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        //Level
        $row_config = Config::find($request->parent_id);
        $row->level = 1;
        if($row_config != NULL) {
            $row->level = $row_config->level + 1;
        }
        //end level
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
                $files->move(public_path('images/config'), $filename);
              }
           }
        //end upload file
        if($row->save())
        {
            $link = Link::where([['type', '=', 'config'],['table_id', '=', $id]])->first();
            $link->slug = $row->slug;
            $link->type = 'config';
            $link->table_id =  $row->id;
            $link->save();
        }
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('config.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Config::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('config.trash');
       }
       if($row->delete()){
        $link = Link::where([['type', '=', 'config'],['table_id', '=', $id]])->first();
        $link->delete();
        toastr()->success('Xóa vĩnh viễn mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('config.trash');
       }
    }

    //chức năng thêm
    #get admin/config/trash
    public function trash()
    {
        $list = Config::where('status', '=', 0)->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.config.trash',compact('title', 'list'));

    }

     #get admin/config/delete/11
     public function delete($id)
     {
         $row = Config::find($id);
         if($row==null)
         {
            return redirect()->route('config.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        // $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('config.index');
     }

     #get admin/config/restore/11
     public function restore($id)
     {
         $row = Config::find($id);
         if($row==null)
         {
            return redirect()->route('config.trash');
        }
        $row->status= 2;//0 rác
        // $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        // $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('config.trash');
     }

      #get admin/config/status/11
      public function status($id)
      {
          $row = Config::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('config.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
        //  $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        //  $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('config.index');
      }


}
