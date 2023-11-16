<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class ContactFeController extends Controller
{
   public function index(){
    $args = [
        ['status', '=', '1'],
        ['roles', '=', 1],
        ['username', '=', 'admin']
    ];
    $list_user = User::where($args)
    ->get();
    //var_dump($list_user);
    return view('frontend.contact', compact('list_user'));
}
}
