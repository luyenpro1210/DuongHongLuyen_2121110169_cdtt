<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\category;
use App\Models\brand;
use App\Models\topic;
use App\Models\post;
use App\Models\menu;
use App\Models\link;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $list_page = Post::where([['status', '!=', 0],['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
        $list_menu = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.menu.index',compact('list_category','list_brand','list_topic','list_page','list_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Menu::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        $html_position = '';
        $html_table_id = '';
        $html_type = '';
        foreach ($list as $item)
        {
            $html_type.= '<option value="'. $item->type.'">'. $item->type.'</option>';
            $html_table_id.= '<option value="'. $item->table_id.'">'. $item->table_id.'</option>';
            $html_parent_id.= '<option value="'. $item->id.'">'. $item->name.'</option>';
            $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
            $html_position.= '<option value="'. $item->position .'">'. $item->position.'</option>';
        }
        return view('backend.menu.create', compact('html_type', 'html_table_id','html_parent_id','html_sort_order', 'html_position'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->ADDCATEGORY))
        {
            $list_id = $request->checkIdCategory;
            foreach ($list_id as $id){
                $category =Category::find($id);
                $menu = new Menu();
                $menu->name= $category->name;
                $menu->link= $category->slug;
                $menu->table_id= $id;
                $menu->parent_id= $category->parent_id;
                $menu->sort_order= 1;
                        //Level
        $menu->level = 1;
        if($menu->parent_id != 0) {
            $menu->level = $menu->level + 1;
        }
        //end level
                $menu->type= 'category';
                $menu->position= $request->position;
                $menu->status= 2;
                $menu->created_at= date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->save();
            }
            toastr()->success('Thêm menu thành công!', 'Congrats');
         return redirect()->route('menu.index');
    }
        if (isset($request->ADDBRAND))
        {
            $list_id = $request->checkIdBrand;
            foreach ($list_id as $id){
                $brand =Brand::find($id);
                $menu = new Menu();
                $menu->name= $brand->name;
                $menu->link= $brand->slug;
                $menu->table_id= $id;
                $menu->parent_id= 0;
                $menu->sort_order= 1;
                $menu->type= 'brand';
                $menu->position= $request->position;
                $menu->status= 2;
                $menu->created_at= date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->save();
            }
            toastr()->success('Thêm menu thành công!', 'Congrats');
         return redirect()->route('menu.index');
        }
        if (isset($request->ADDTOPIC))
        {
            $list_id = $request->checkIdTopic;
            foreach ($list_id as $id){
                $topic =Topic::find($id);
                $menu = new Menu();
                $menu->name= $topic->name;
                $menu->link= $topic->slug;
                $menu->table_id= $id;
                $menu->parent_id= 0;
                $menu->sort_order= 1;
                $menu->type= 'topic';
                $menu->position= $request->position;
                $menu->status= 2;
                $menu->created_at= date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->save();
            }
            toastr()->success('Thêm menu thành công!', 'Congrats');
         return redirect()->route('menu.index');
        }
        if (isset($request->ADDPAGE))
        {
            $list_id = $request->checkIdPage;
            foreach ($list_id as $id){
                $page =Post::find($id);
                $menu = new Menu();
                $menu->name= $page->title;
                $menu->link= $page->slug;
                $menu->table_id= $id;
                $menu->parent_id= 0;
                $menu->sort_order= 1;
                $menu->type= 'page';
                $menu->position= $request->position;
                $menu->status= 2;
                $menu->created_at= date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->save();
            }
            toastr()->success('Thêm menu thành công!', 'Congrats');
         return redirect()->route('menu.index');
        }
        if (isset($request->ADDCUSTOM))
        {
            $menu = new Menu();
            $menu->name= $request->name;
            $menu->link= $request->link;
            $menu->parent_id= 0;
            $menu->sort_order= 1;
             //Level
        $menu->level = 1;
        if($menu->parent_id != 0) {
            $menu->level = $menu->level + 1;
        }
        //end level
            $menu->type= 'custom';
            $menu->position= $request->position;
            $menu->status= 2;
            $menu->created_at= date('Y-m-d H:i:s');
            $menu->created_by = Auth::id() ?? 1;
            $menu->save();
            toastr()->success('Thêm menu thành công!', 'Congrats');
            return redirect()->route('menu.index');
    }

        // $row = new Menu(); //Đối tượng mới
        // $row->name = $request->name;
        // $row->link = $request->link;
        // $row->type = $request->type;
        // $row->table_id = $request->table_id;
        // $row->position = $request->position;
        // $row->parent_id = $request->parent_id;
        // $row->sort_order = $request->sort_order;
        // //Level
        // $row_menu = Menu::find($request->parent_id);
        // $row->level = 1;
        // if($row_menu != NULL) {
        //     $row->level = $row_menu->level + 1;
        // }
        // //end level
        // $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        // $row->created_by = Auth::id() ?? 1; //Đăng nhập
        // $row->updated_by = $request->updated_by;
        // $row->status = $request->status;
        // $row->save();
        // return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Menu::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('menu.trash');
        }
        return view('backend.menu.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Menu::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('menu.trash');
        }
        $list = Menu::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        $html_position = '';
        $html_table_id = '';
        $html_type = '';
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

            if($item->id == $row->type)
            {
                $html_type.= '<option selected value="'. $item->type.'">'. $item->type.'</option>';
            }
            else
            {
                $html_type.= '<option value="'. $item->type.'">'. $item->type.'</option>';
            }

            if($item->id == $row->table_id)
            {
                $html_table_id.= '<option selected value="'. $item->id.'">'. $item->table_id.'</option>';
            }
            else
            {
                $html_table_id.= '<option value="'. $item->table_id.'">'. $item->table_id.'</option>';
            }

            if($item->id == $row->position)
            {
                $html_position.= '<option selected value="'. $item->position .'">'. $item->position.'</option>';
            }
            else
            {
                $html_position.= '<option value="'. $item->position .'">'. $item->position.'</option>';
            }
        }
        return view('backend.menu.edit', compact('html_type', 'html_table_id','html_parent_id','html_sort_order', 'html_position', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        $menu->name= $request->name;
        $menu->link= $request->link;
        $menu->parent_id= $request->parent_id;
        $menu->sort_order= $request->sort_order + 1 ;
        //$menu->position= $request->position;
        $menu->status= $request->status;
        $menu->updated_at= date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        // $row =Menu::find($id);
        // $row->name = $request->name;
        // $row->link = $request->link;
        // $row->type = $request->type;
        // $row->table_id = $request->table_id;
        // $row->position = $request->position;
        // $row->parent_id = $request->parent_id;
        // $row->sort_order = $request->sort_order;
        // //Level
        // $row_menu = Menu::find($request->parent_id);
        // $row->level = 1;
        // if($row_menu != NULL) {
        //     $row->level = $row_menu->level + 1;
        // }
        // //end level
        // $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        // $row->created_by = 1; //Đăng nhập
        // $row->updated_by = $request->updated_by;
        // $row->status = $request->status;
        // $row->save();
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = menu::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('menu.trash');
       }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin vào thùng rác thành công!', 'Congrats');
       return redirect()->route('menu.trash');
       
    }

    //chức năng thêm
    #get admin/menu/trash
    public function trash()
    {
        $list = Menu::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.menu.trash',compact('title', 'list'));

    }

     #get admin/menu/delete/11
     public function delete($id)
     {
         $row = Menu::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('menu.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('menu.index');
     }

     #get admin/menu/restore/11
     public function restore($id)
     {
         $row = Menu::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('menu.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('menu.trash');
     }

      #get admin/menu/status/11
      public function status($id)
      {
          $row = Menu::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('menu.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('menu.index');
      }


}