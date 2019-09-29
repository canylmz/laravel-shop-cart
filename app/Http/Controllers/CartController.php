<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Config\MenuConfig;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $product = Product::find($request->id);

        Cart::add($product->id, $product->name, $product->price, 1, array());

        return back()->with("$product->name alışveriş sepetine başarıyla eklendi!");;
    }

    public function cart(){
        $params = [
            'title' => 'Ödeme',
        ];

        $config = new MenuConfig();

        $config->title = 'Foo';
        $config->body = 'Bar';
        $config->buttonText = 'Baz';
        $config->cancellable = true;

        $this->createMenu($config);

//dd(Cart::getContent());
        return view('cart')->with($params);
    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"Sepete Eklendi!");;
    }


    /**
     * @param MenuConfig $config
     */
    function createMenu(MenuConfig $config): void
    {

//        dd($config->title);
    }


}


