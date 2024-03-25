<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public $data = [];
    public function index(Request $request)
    {
        $data['title'] = 'Home Page';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')
            ->where('discount', '>', 0)
            ->paginate(5);
        return view('clients.home', compact('data', 'products', 'banners'));
    }

    public function products(Request $request)
    {
        $data['title'] = 'Products Page';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')->get();
        return view('clients.products', compact('data', 'products'));
    }

    public function iphone(Request $request)
    {
        $data['title'] = 'Iphone';
        $banners = DB::table('banner')->get();

        $products = DB::table('products')
            ->where('category_id', 1)
            ->get();
        // $quantity = $products->quantity_product;
        // $describe_product = $products->describe_product;

        // if ($products) {
        //     $quantity = $products->quantity_product;
        // } else {
        //     $quantity = 0;
        // }
        // return view('clients.iphone', compact('data', 'products', 'quantity', 'describe_product'));
        return view('clients.iphone', compact('data', 'products', 'banners'));
    }

    public function laptop(Request $request)
    {
        $data['title'] = 'Laptop';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')
            ->where('category_id', 7)
            ->get();
        return view('clients.laptop', compact('data', 'products', 'banners'));
    }

    public function filters(Request $request)
    {
        $filters = [];
        $data['title'] = $request->path();
        $banners = DB::table('banner')->get();
        $products = DB::table('products')->get();
        $view = $request->path();
        if ($request->isMethod('post')) {
            $filters = $request->input('filters');

            if (intval($filters) < '2000000') {
                $products = DB::table('products')
                    ->where('sell_price', '<', '2000000')
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= '2000000' && intval($filters) <= '4000000') {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [2000000, 4000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= 4000000 && intval($filters) <= 7000000) {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [4000000, 7000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= 7000000 && intval($filters) <= 13000000) {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [7000000, 13000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) > 13000000) {
                $products = DB::table('products')
                    ->where('sell_price', '>', 13000000)
                    ->whereIn('price', $filters)
                    ->get();
            } else {
                $products = DB::table('products')->get();
            }
        }
        return view($view, compact('data', 'products', 'banners', 'filters'));
    }

    public function samsung(Request $request)
    {
        $data['title'] = 'Samsung';
        $banners = DB::table('banner')->get();

        $products = DB::table('products')
            ->where('category_id', 2)
            ->get();
        return view('clients.samsung', compact('data', 'products', 'banners'));
    }
}
