<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\topic;
use App\Models\link;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0]];
        $list = Topic::where($mang)->get();
        $title='Topic';
        return view('backend.topic.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Topic::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item)
        {
            $html_parent_id.= '<option value="'. $item->id.'">'. $item->name.'</option>';
            $html_sort_order.= '<option value="'. ($item->sort_order+1) .'">Sau: '. $item->name.'</option>';
        }
        return view('backend.topic.create', compact('html_parent_id','html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $row = new Topic(); //Đối tượng mới
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        if($row->save())
        {
            $link = new Link();
            $link->slug = $row->slug;
            $link->type = 'topic';
            $link->table_id =  $row->id;
            $link->save();
        }       
        toastr()->success('Thành công!', 'Congrats');
         return redirect()->route('topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Topic::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('topic.trash');
        }
        return view('backend.topic.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Topic::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('topic.trash');
       }
        $list = Topic::where('status', '!=', 0)->get();
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
        return view('backend.topic.edit', compact('html_parent_id','html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, $id)
    {
        $row = Topic::find($id);
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        if($row->save())
        {
            $link = Link::where([['type', '=', 'topic'],['table_id', '=', $id]])->first();
            $link->slug = $row->slug;
            $link->type = 'topic';
            $link->table_id =  $row->id;
            $link->save();
        }        
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Topic::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('topic.trash');
        }
        if($row->delete()){
            $link = Link::where([['type', '=', 'topic'],['table_id', '=', $id]])->first();
            $link->delete();
            toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
            return redirect()->route('topic.trash');   
        }   
    }

    //chức năng thêm
    #get admin/topic/trash
    public function trash()
    {
        $list = Topic::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác Danh mục sản phẩm';
        return view('backend.topic.trash',compact('title', 'list'));

    }

     #get admin/topic/delete/11
     public function delete($id)
     {
         $row = Topic::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('topic.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('topic.index');
     }

     #get admin/topic/restore/11
     public function restore($id)
     {
         $row = Topic::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('topic.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('topic.trash');
     }

      #get admin/topic/status/11
      public function status($id)
      {
          $row = Topic::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
             return redirect()->route('topic.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('topic.index');
      }


}
