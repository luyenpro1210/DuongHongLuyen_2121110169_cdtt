<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\product;
use App\Models\link;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //SELECT * FROM ltnd_product WHERE status!='0'
        //tra ve so mau tin->count();
        //tra ve 1 mau tin->first();||find($id)
        //tra ve nhieu mau tin ->get();
        //$mang=[['status', '=', 1],['created_by', '=', 1]];
        $mang=[['status', '!=', 0]];
        $list = Product::where($mang)->get();
        $title='Danh sach san pham';
        return view('backend.product.index',compact('title', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Product::where('status', '!=', 0)->get();
        $html_category_id = '';
        $html_brand_id = '';
        foreach ($list as $item)
        {
            $html_category_id.= '<option value="'.$item->category_id.'">'. $item->category_id.'</option>';
            $html_brand_id.= '<option value="'.$item->brand_id.'">'. $item->brand_id.'</option>';
        }
        return view('backend.product.create', compact('html_category_id','html_brand_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $row = new Product();  
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->metakey = $request->metakey; 
        $row->metadesc = $request->metadesc;
        $row->price = $request->price;
        $row->qty = $request->qty;
        $row->detail = $request->detail;
        $row->pricesale = $request->pricesale;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = 1;
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
        $files = $request->file('image');
        if($files != NULL){
           $extension = $files->getClientOriginalExtension();
           if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
             $filename =  $row->slug. '.' . $extension;
             $row->image = $filename;
             $files->move(public_path('images/product'), $filename);
           }
        }
     //end upload file
     $row->save();
        toastr()->success('Thành công!', 'Congrats');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Product::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('product.trash');
        }
        return view('backend.product.show', compact('row'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Product::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('product.trash');
        }
        $list = Product::where('status', '!=', 0)->get();
        $html_category_id = '';
        $html_brand_id = '';
        foreach ($list as $item)
        {
            if($item->id == $row->category_id)
            {
                $html_category_id.= '<option selected value="'. $item->id.'">'. $item->category_id.'</option>';
            }
            else
            {
                $html_category_id.= '<option value="'. $item->id.'">'. $item->category_id.'</option>';
            }
            if($item->id== $row->brand_id)
            {
                $html_brand_id.= '<option selected value="'. $item->id .'">'. $item->brand_id.'</option>';
            }
            else
            {
                $html_brand_id.= '<option value="'. $item->id .'">'. $item->brand_id.'</option>';
            }
        }
        return view('backend.product.edit', compact('html_category_id','html_brand_id','row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $row = Product::find($id);
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->metakey = $request->metakey; 
        $row->metadesc = $request->metadesc;
        $row->price = $request->price;
        $row->qty = $request->qty;
        $row->detail = $request->detail;
        $row->pricesale = $request->pricesale;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = 1;
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        //Upload file
        $files = $request->file('image');
        if($files != NULL){
           $extension = $files->getClientOriginalExtension();
           if(in_array($extension, ['jpg', 'png', 'gif', 'web', 'jpeg'])) {
             $filename =  $row->slug. '.' . $extension;
             $row->image = $filename;
             $files->move(public_path('images/product'), $filename);
           }
        }
     //end upload file
     $row->save();  
     toastr()->success('Thành công!', 'Congrats');
     return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $row = Product::find($id);
        if($row==null)
        {
            toastr()->warning('Mẫu tin không tồn tại!');
           return redirect()->route('product.trash');
       }
       $row->delete();
       toastr()->success('Xóa vĩnh viễn mẫu tin thành công!', 'Congrats');
        return redirect()->route('product.trash');
    }

     //chức năng thêm
    #get admin/product/trash
    public function trash()
    {
        $list = Product::where('status', '=', 0)->orderBy('created_at','desc')->get();
        $title='Thùng rác sản phẩm';
        return view('backend.product.trash',compact('title', 'list'));
    }

     #get admin/product/delete/11
     public function delete($id)
     {
         $row = Product::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('product.index');
        }
        $row->status= 0;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Xóa mẫu tin vào thùng rác thành công!', 'Congrats');
        return redirect()->route('product.index');
     }

     #get admin/product/restore/11
     public function restore($id)
     {
         $row = Product::find($id);
         if($row==null)
         {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('product.trash');
        }
        $row->status= 2;//0 rác
        $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->updated_by= Auth::id() ?? 1;//giá trị loi
        $row->save();
        toastr()->success('Khôi phục mẫu tin thành công!');
        return redirect()->route('product.trash');
     }

      #get admin/product/status/11
      public function status($id)
      {
          $row = Product::find($id);
          if($row==null)
          {
            toastr()->warning('Mẫu tin không tồn tại!');
            return redirect()->route('product.index');
         }
         $row->status= ($row->status== 1) ? 2 : 1;//0 rác
         $row->updated_at = date('Y-m-d H:i:s'); //Ngày tạo
         $row->updated_by= Auth::id() ?? 1;//giá trị loi
         $row->save();
         toastr()->success('Thay đổi trạng thái thành công!', 'Congrats');
         return redirect()->route('product.index');
      }
}