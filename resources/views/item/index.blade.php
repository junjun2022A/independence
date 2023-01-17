@extends('adminlte::page')

@section('title', '商品一覧2')


@section('content_header')
<form id="form1" action="/items/search" method="get">                                               
    <input id="sbox1" name="s" type="text" placeholder="キーワードを入力">           
    <input id="sbtn1" type="submit" value="検索">                                   
</form>





@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>更新日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $types[$item->type] ?? '未分類' }}</td>
                                    <!-- <td>{{ $item->type }}</td> -->
                                    <!-- <td>{{ $item->detail }}</td> -->
                                    <!-- <td><a class="btn btn-secondary" href="/item/detail/{{ $item->id }}">詳細</a></td> -->
                                    <td><a class="btn btn-secondary" href="/item/detail">詳細</a></td>

                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
