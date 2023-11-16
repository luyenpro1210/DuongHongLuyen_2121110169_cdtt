<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\category;
use App\Models\link;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        $title='Danh muc san pham';
        return view('backend.category.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            $html_parent_id.= '<option value="'. $item->id.'">'. $item->name.'</option>';
            $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
        }
        return view('backend.category.create', compact('html_parent_id','html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $row = new Category(); //Đối tượng mới
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        //Level
        $row_category = Category::find($request->parent_id);
        $row->level = 1;
        if($row_category != NULL) {
            $row->level = $row_category->level + 1;
        }
        //end level
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
                $files->move(public_path('images/category'), $filename);
              }
           }
        //end upload file
        if($row->save())
        {
            $link = new Link();
            $link->slug = $row->slug;
            $link->type = 'category';
            $link->table_id =  $row->id;
            $link->save();
        }
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Category::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('category.trash');
        }
        return view('backend.category.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Category::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('category.trash');
       }
        $list = Category::where('status', '!=', 0)->get();
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
        return view('backend.category.edit', compact('html_parent_id','html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $row = Category::find($id);
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        //Level
        $row_category = Category::find($request->parent_id);
        $row->level = 1;
        if($row_category != NULL) {
            $row->level = $row_category->level + 1;
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
                $files->move(public_path('images/category'), $filename);
              }
           }
        //end upload file
        if($row->save())
        {
            $link = Link::where([['type', '=', 'category'],['table_id', '=', $id]])->first();
            $link->slug = $row->slug;
            $link->type = 'category';
            $link->table_id =  $row->id;
            $link->save();
        }
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Category::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('category.trash');
       }
       if($row->delete()){
        $link = Link::where([['type', '=', 'category'],['table_id', '=', $id]])->first();
        $link->delete();
        toastr()->success('Xóa vĩnh viễn mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('category.trash');
       }
    }

    //chức năng thêm
    #get admin/category/trash
    public function trash()
    {
        $list = Category::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.category.trash',compact('title', 'list'));

    }

     #get admin/category/delete/11
     public function delete($id)
     {
         $row = Category::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('category.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('category.index');
     }

     #get admin/category/restore/11
     public function restore($id)
     {
         $row = Category::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('category.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('category.trash');
     }

      #get admin/category/status/11
      public function status($id)
      {
          $row = Category::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('category.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('category.index');
      }
}
