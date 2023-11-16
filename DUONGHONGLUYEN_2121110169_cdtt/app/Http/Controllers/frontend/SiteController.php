<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\link;
use App\Models\product;
use App\Models\post;
use App\Models\category;
use App\Models\brand;

class SiteController extends Controller
{
    public function index($slug = null)
        {
            return view("frontend.home");
            if($slug == null){
              return $this->home();
            }
            else{
                $link = Link::where('slug', '=', $slug)->first();
                if($link == null){
                    $product = Product::where([['status','=','1'],['slug','=',$slug]])->first();
                    if($product != null)
                    {
                        return $this->product_detail($product);
                    }
                    else{
                        $args = [
                            ['status', '=', '1'],
                            ['slug', '=', $slug],
                            ['type', '=', 'post'],
                        ];
                        $post = Post::where($args)->first();
                        if($post != null)
                        {
                           return $this->post_detail($post);
                        }
                        else{
                            return $this->error_404($slug); 
                        }
                    }
                 }
                else{
                    $type = $link->type;
                    switch($type)
                    {
                        case 'category':{
                            return $this->product_category($slug);
                        }
                        case 'brand':{
                            return $this->product_brand($slug);
                        }
                        case 'topic':{
                            return $this->post_topic($slug);
                        }
                        case 'page':{
                            return $this->post_page($slug);
                        }                  
                    }
                }
                
            }
           
        }

        //Trang chu
        private function home()
        {
            $args = [
                ['status', '=', '1'],
                ['parent_id', '=', 0]
            ];
            $list_category = Category::where($args)
            ->orderBy('sort_order', 'ASC')
            ->get();
           // var_dump($list_category);
            return view('frontend.home', compact('list_category'));
        }

        private function product_category($slug)
        {
            $cat = Category::where([['slug','=',$slug],['status','=',1]])->first();
            $listcatid = array();
            array_push($listcatid, $cat->id);
            //Lay ra category id cap con cua $cat->id
            $args1 = [
                ['status', '=', 1],
                ['parent_id', '=', $cat->id]
            ];
            $list_category1 = Category::where($args1)->get();
            if(count($list_category1)>0)
            {
                foreach($list_category1 as $cat1)
                {
                    array_push($listcatid, $cat1->id);
                    $args2 = [
                        ['status', '=', '1'],
                        ['parent_id', '=', $cat1->id]
                    ];
                    $list_category2 = Category::where($args2)->get();
                    if(count($list_category2)>0)
                    {
                        foreach($list_category2 as $cat2)
                        {
                            array_push($listcatid, $cat2->id);
                        }   
                    }     
                }
            }
            $list_product = Product::where('status', '=', 1)
           ->whereIn('category_id', $listcatid)
           ->orderBy('created_at', 'desc')
           ->paginate(4);
            return view('frontend.product_category', compact('list_product','cat'));
        }
        
        private function product_brand($slug)
        {
            $brand = Brand::where([['slug','=',$slug],['status','=',1]])->first();
            $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(4);
            return view('frontend.product_brand', compact('list_product','brand'));
        }

        private function post_topic($slug)
        {
            return view('frontend.post-topic');
        }

        private function post_page($slug)
        {
            return view('frontend.post-page');
        }

        private function product_detail($product)
        {
            $args = [
                ['status', '=', 1],
                ['id', '!=', $product->id],
            ];
            $listcatid = array();
            array_push($listcatid, $product->category_id);
            //Lay ra category id cap con cua $cat->id
            $args1 = [
                ['status', '=', 1],
                ['parent_id', '=', $product->category_id]
            ];
            $list_category1 = Category::where($args1)->get();
            if(count($list_category1)>0)
            {
                foreach($list_category1 as $cat1)
                {
                    array_push($listcatid, $cat1->id);
                    $args2 = [
                        ['status', '=', '1'],
                        ['parent_id', '=', $cat1->id]
                    ];
                    $list_category2 = Category::where($args2)->get();
                    if(count($list_category2)>0)
                    {
                        foreach($list_category2 as $cat2)
                        {
                            array_push($listcatid, $cat2->id);
                        }   
                    }     
                }
            }
            $list_product = Product::where($args)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
            return view('frontend.product_detail', compact('product','list_product'));
        }

        private function post_detail($post)
        {
            return view('frontend.post_detail');
        }

        private function error_404($slug)
        {
            return view('frontend.404');
        }
        
        public function product()
        {
            return view('frontend.product');
        }

        public function post()
        {
            $post1 = Post::where([['type','=','page'],['status','=',1],['title', '=', 'Giới thiệu']])->first();
            $post2 = Post::where([['type','=','page'],['status','=',1],['title', '=', 'Chính sách mua hàng']])->first();
            $post3 = Post::where([['type','=','page'],['status','=',1],['title', '=', 'Chính sách bảo hành']])->first();
            $post4 = Post::where([['type','=','page'],['status','=',1],['title', '=', 'Chính sách vận chuyển']])->first();
            $post5 = Post::where([['type','=','page'],['status','=',1],['title', '=', 'Chính sách đổi trả']])->first();
            return view('frontend.post', compact('post1','post2','post3','post4','post5'));
        }

        public function register()
        {
            return view('frontend.register');
        }
        public function products()
        {
            return view("frontend.products");
        }
        public function about()
        {
            return view("frontend.about");
        }
        public function client()
        {
            return view("frontend.client");
        }
        public function contact()
        {
            return view("frontend.contact");
        }

}
    