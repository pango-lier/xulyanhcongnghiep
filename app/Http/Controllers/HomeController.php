<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Slider;
use App\Product;
use App\Intercooperation;
use App\Catdes;
use App\Comment;
use App\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $cats = $category->getChild();
        //  $settings=DB::table('settings')->select('config_value','config_key')->get();
        //$this->middleware('auth');
        view()->share('cats', $cats);

        $cart_count = Cart::count();
        view()->share('cart_count', $cart_count);
        $settings = Setting::get();
        foreach ($settings as $setting) {
            view()->share($setting->config_key, $setting->config_value);
        }

        //    dd($settings);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Session::all());
        //  $catdes=Catdes::take(3)->get();
        $intercooperations = Intercooperation::take(7)->latest()->get();
        $sliders = Slider::take(3)->latest()->get();
        $posts = Post::paginate(10, ['*'], 'post');
        // $products = Product::simplePaginate(4, ['*'], 'product');
        return view('pages.home', ['posts' => $posts, 'sliders' => $sliders, 'products' => $products ?? '', 'intercooperations' => $intercooperations]);
    }
    public function posts($slug, $id)
    {
        $sessionKey = 'post_id' . $id;
        $sessionView = Session::get($sessionKey);
        $post = Post::findOrFail($id);
        if (!$sessionView) { //nếu chưa có session
            Session::put($sessionKey, 1); //set giá trị cho session
            $post->increment('count_views');
        }
        $category_id = $post->category_id;
        $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->where(function ($query) use ($category_id) {
                $query->where('categories.id', $category_id)
                    ->orWhere('categories.parent_id', 0)
                    ->orWhere('categories.parent_id', 1);
            })->where('posts.id', '!=', $post->id)
            ->select('posts.*')
            ->latest()
            ->paginate(6, ['*'], 'post');
        ;
        return view('pages.posts', ['post' => $post, 'posts' => $posts]);
    }
    public function cats($slug, $id)
    {
        //$category=new Category();
        // $cats=$category->getDataTreeChild($id);
        $cat = Category::findOrFail($id);
        $catChildIds = Category::where('parent_id', $cat->id)->pluck('id')->toArray();
        switch ($cat->type) {
            case 'product':
                $intercooperations = Intercooperation::take(8)->latest()->get();
                $products = Product::where('category_id', $id)->orWhereIn('category_id', $catChildIds)->paginate(12);
                return view('pages.cat_product', ['products' => $products, 'intercooperations' => $intercooperations, 'cat' => $cat]);
                break;
            default:
                $posts = Post::where('category_id', $id)->orWhereIn('category_id', $catChildIds)->latest()->paginate(6);
                return view('pages.cat_posts', ['posts' => $posts, 'cat' => $cat]);
                break;
        }
    }
    public function about_us()
    {
        $intercooperations = Intercooperation::take(8)->latest()->get();
        return view('pages.about_us', ['intercooperations' => $intercooperations]);
    }
    public function product($slug, $id)
    {
        $product = Product::findOrFail($id);
        $productOthers = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->latest()->get();
        return view('pages.product', ['product' => $product, 'productOthers' => $productOthers]);
    }

    public function getCheckOut()
    {
        $title = 'Check out';
        Cart::setGlobalTax(0);
        $cart = Cart::content();
        //dd($cart);
        $total = str_replace(',', '', Cart::total());
        $cart_count = Cart::count();
        if ($cart_count > 0) {
            session()->put('cart-count', $cart_count);
        }
        return view('pages.checkout', ['cart' => $cart, 'title' => $title, 'total' => $total]);
    }
}
