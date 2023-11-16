<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\brand;
use App\Models\link;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = Brand::where($mang)->get();
        $title='Brand';
        return view('backend.brand.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Brand::where('status', '!=', 0)->get();
        $html_sort_order = '';
        foreach ($list as $item)
        {
            $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
        }
        return view('backend.brand.create', compact('html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    { 
        $row = new Brand(); //Đối tượng mới
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->sort_order = $request->sort_order;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename =  $row->slug. '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/brand'), $filename);
              }
           }
        //end upload file
        if($row->save())
        {
            $link = new Link();
            $link->slug = $row->slug;
            $link->type = 'brand';
            $link->table_id =  $row->id;
            $link->save();
        }
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $row = Brand::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('brand.trash');
        }
        return view('backend.brand.show', compact('row'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $row = Brand::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('brand.trash');
       }
        $list = Brand::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            if($item->sort_order== $row->sort_order-1)
            {
                $html_sort_order.= '<option selected value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
            }
            else
            {
                $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
            }
        }
        return view('backend.brand.edit', compact('html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $row = Brand::find($id);
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->sort_order = $request->sort_order;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename =  $row->slug. '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/brand'), $filename);
              }
           }
        //end upload file
        if($row->save())
        {
            $link = Link::where([['type', '=', 'brand'],['table_id', '=', $id]])->first();
            $link->slug = $row->slug;
            $link->type = 'brand';
            $link->table_id =  $row->id;
            $link->save();
        }
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $row = Brand::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('brand.trash');
       }
       if($row->delete()){
        $link = Link::where([['type', '=', 'brand'],['table_id', '=', $id]])->first();
        $link->delete();
        toastr()->success('Xóa vĩnh viễn mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('brand.trash');
       }

    }

        //chức năng thêm
    #get admin/brand/trash
    public function trash()
    {
        $list = Brand::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Thuong hieu';
        return view('backend.brand.trash',compact('title', 'list'));

    }

     #get admin/brand/delete/11
     public function delete($id)
     {
         $row = Brand::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('brand.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('brand.index');
     }

     #get admin/brand/restore/11
     public function restore($id)
     {
         $row = Brand::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('brand.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('brand.trash');
     }

      #get admin/brand/status/11
      public function status($id)
      {
          $row = Brand::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('brand.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('brand.index');
      }

}
