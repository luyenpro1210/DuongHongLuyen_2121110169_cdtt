<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\slider;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = Slider::where($mang)->get();
        $title='Slider';
        return view('backend.slider.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Slider::where('status', '!=', 0)->get();
        $html_position = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            $html_position.= '<option value="'. $item->position .'">'. $item->position.'</option>';
            $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
        }
        return view('backend.slider.create', compact('html_position','html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $row = new Slider(); //Đối tượng mới
        $row->name = $request->name;
        $row->link = $request->link;
        $row->position = $request->position;
        $row->sort_order = $request->sort_order;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename =  Str::of($request->name)->slug('-'). '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/slider'), $filename);
              }
           }
        //end upload file
        $row->save();
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Slider::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('slider.trash');
        }
        return view('backend.slider.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Slider::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('slider.trash');
       }
        $list = Slider::where('status', '!=', 0)->get();
        $html_position = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            if($item->id == $row->parent_id)
            {
                $html_position.= '<option selected value="'. $item->position.'">'. $item->position.'</option>';
            }
            else
            {
                $html_position.= '<option value="'. $item->position.'">'. $item->position.'</option>';
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
        return view('backend.slider.edit', compact('html_position','html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, $id)
    {
        $row = Slider::find($id);
        $row->name = $request->name;
        $row->link = $request->link;
        $row->position = $request->position;
        $row->sort_order = $request->sort_order;
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
           $files = $request->file('image');
           if($files != NULL){
              $extension = $files->getClientOriginalExtension();
              if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
                $filename =  Str::of($request->name)->slug('-'). '.' . $extension;
                $row->image = $filename;
                $files->move(public_path('images/slider'), $filename);
              }
           }
        //end upload file
        $row->save();
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Slider::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('slider.trash');
       }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('slider.trash');
    }

    //chức năng thêm
    #get admin/slider/trash
    public function trash()
    {
        $list = Slider::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.slider.trash',compact('title', 'list'));

    }

     #get admin/slider/delete/11
     public function delete($id)
     {
         $row = Slider::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('slider.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('slider.index');
     }

     #get admin/slider/restore/11
     public function restore($id)
     {
         $row = Slider::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('slider.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('slider.trash');
     }

      #get admin/slider/status/11
      public function status($id)
      {
          $row = Slider::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('slider.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('slider.index');
      }
}


