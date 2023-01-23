<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status','active')
            ->select()
            ->get();

        $types=Item::TYPE;
        return view('item.index', compact('items','types'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function detail(Request $request) {
        $item=item::find($request->id);
        return view('item.detail',['item' => $item, 'types'=>Item::TYPE]);
    }

    /**
     * 新しい機能
     */
    public function abc()
    {
        return view('item.abc');

    }
    
    /**
     * 詳細画面
     */
    public function edit($id)
    {
        $item=Item::find($id);

        return view('item.detail',['item' => $item, 'types'=>Item::TYPE]);

    }


    /**
     * 商品管理
     */
    public function index2()
    {    
        // $items = Item::where('items.status','active')
        //     ->select()
        //     ->get();
            $items = Item::all();
        // dd($items);
        $types=Item::TYPE;
        return view('item.index2', compact('items','types'));
    }

    /**
     * 編集
     */

     public function edit2($id)
     {
     $item=Item::find($id);
 
     return view('item.edit2', compact('item'));
     }


/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $item=Item::find($id);

    $this->validate($request, [
        'name' => ['required', 'string'],
        'type' => ['required', 'integer'],
        'detail' => ['required', 'string']
    ], [
        'name.required' => ':attributeは必須です。',
        'type.required' => ':attributeは必須です。',
        'detail.required' => '詳細は必須です。',
    ], [
        'name' => '商品名',
        'type' => '種類',
    ]);

    $item->name=$request->input('name');
    $item->type=$request->input('type');
    $item->detail=$request->input('detail');
    $item->status=$request->input('status');
    $item->save();

    return redirect('/items/index2');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $item=Item::find($id);

    $item->delete();

    return redirect('/items/index2');
    }
}
