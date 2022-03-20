<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\checkoutMail;
use Mail;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // if (Request::isMethod('post')) {
        //   $this->data['title'] = 'Giỏ hàng của bạn';
        if (isset($request->add)) {
            $product_id = $request->id; // Request::get('product_id');
            $product = Product::find($product_id);
            $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => '1',
                'weight' => '10',
                'taxRate' => '0',
                'options' => ['image_path' => $product->img_path],
            ];
            Cart::add($cartInfo);
            $data['count'] = Cart::count();
            session()->put('cart-count', $data['count']);
            $data['status'] = [
                'code' => 200,
                'message' => 'Thêm sản phẩm thành công !'
            ];
            return response()->json($data, 200);
        }
        //     }
        //increment the quantity
        /*if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }
        */
        //decrease the quantity
        /*if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }
`		*/
        //  $cart = Cart::content();
        //  $this->data['cart'] = $cart;

        //  return view('pages.cart',['cart'=>$cart]);

    }
    public function buyNowToCart(Request $request)
    {
        if (isset($request->add)) {
            $quantity = $request->quantity;
            if ($quantity < 1) $quantity = 1;
            $product_id = $request->id; // Request::get('product_id');
            $product = Product::find($product_id);
            $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $quantity,
                'weight' => '10',
                'taxRate' => '0',
                'options' => ['image_path' => $product->img_path],
            ];
            Cart::add($cartInfo);
            $data['count'] = Cart::count();
            session()->put('cart-count', $data['count']);
            $data['status'] = [
                'code' => 200,
                'message' => 'Thêm sản phẩm thành công !'
            ];
            return redirect('checkout');
        }
    }
    public function remove(Request $request)
    {
        /*
    	$rowId = Cart::search(function ($cartItem, $rowId) use($id) {
    		  return $cartItem->id===$id ;
    	});
    	*/
        $rowId = Cart::content()->where('id', $request->id)->first()->rowId;
        Cart::remove($rowId);
        $data['total'] = number_format(Cart::total());
        $data['count'] = Cart::count();
        session()->put('cart-count', $data['count']);
        $data['status'] = [
            'code' => 200,
            'message' => 'Xóa sản phẩm thành công !'
        ];
        return response()->json($data, 200);
    }
    public function cartRemove_all()
    {
        Cart::destroy();
    }


    public function postCheckOut(Request $request)
    {
        //dd($request);

        //dd($cartInfor);
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|digits_between:10,12'

        ];
        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return redirect('/checkout')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // save
            DB::beginTransaction();

            foreach ($request->cart_quantity as $rowId => $quantity) {
                Cart::update($rowId, $quantity);
            }
            session()->put('cart-count', Cart::count());
            $cartInfor = Cart::content();

            $customer = new Customer;
            // dd($cartInfor);
            $customer->name = $request->fullName;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            //$customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', Cart::total());
            $bill->note =  $request->note;
            $bill->save();



            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
            // del
            Cart::destroy();
            session()->forget('cart-count');
            Mail::to("kinhdoanh11.bt@gmail.com")->cc($customer->email)->send(new checkoutMail($customer, $bill, $cartInfor));
            DB::commit();
            return redirect('/');
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}
