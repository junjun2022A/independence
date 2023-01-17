<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class SearchController extends Controller
{
    public function index(Request $request) {
        if(isset($request->s)) {
            $items = Item::where('status','active')->
                where("name", "LIKE", "%".$request->s."%")->get();
            // $item = item::find($request->s);
            // return view('search.detail',['item' => $item]);
        } else {
            $items=Item::where('status','active')->get();
        }
        return view('item.index', ['items' => $items, 'types'=>Item::TYPE]);
    }

    // public function detail(Request $request) {
    //     $item=item::find($request->id);
    //     return view('search.detail',['item' => $item, 'types'=>Item::TYPE]);
    // }
}
