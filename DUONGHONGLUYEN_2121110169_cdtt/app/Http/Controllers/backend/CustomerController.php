<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\user;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mang=[['status', '!=', 0],['username', '!=', "admin"]];
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
        $args = [
            ['status', '=', '1'],
            ['parent_id', '=', 0]
        ];
        $list_category = Category::where($args)
        ->orderBy('sort_order', 'ASC')
        ->get();
        $row = new User(); //Đối tượng mới
        $row->name = $request->name;
        $row->username = $request->username;
        $row->password = bcrypt($request->password);
        $row->email = $request->email;
        $row->gender = $request->gender;
        $row->phone = $request->phone;
        $row->image = $request->image;
        $row->roles = 0;
        $row->address = $request->address;
        $row->created_at = date('Y-m-d H:i:s'); //Ngày tạo
        $row->created_by = Auth::id() ?? 1; //Đăng nhập
        $row->updated_by = Auth::id() ?? 1;
        $row->status = 1;
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
        return view('frontend.home',compact('list_category'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "Chi tiết";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "Edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo "Xóa";
    }
}
