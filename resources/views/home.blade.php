@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
<h1 >Fashion Item List</h1>
        <p >このサイトは商品管理システムのサイトです。</p>
        <p>商品一覧画面から検索、詳細情報等、目的の商品を閲覧して頂けます。</p>
@stop

@section('content')
<p >新着情報</p>
    <!-- <p>Welcome to this beautiful admin panel.</p> -->
    <table class="table2" align="center">
        @foreach ($items as $item)
            <!-- <tr>
                
                <th class="width2">商品名</th>
                <th class="width3">種別</th>
                <th class="width4">更新日時</th>
            </tr> -->
            <tr>
                <th class="width1">New</th>
                {{-- <td class="width2">{{ $item->id }}</td> --}}
                <td class="width3">{{ $item->name }}</td>
                <td class="width4">{{ $types[$item->type] ?? '未分類' }}</td>
                <!-- <td>{{ $item->type }}</td> -->
                <!-- <td>{{ $item->detail }}</td> -->
                <!-- <td><a class="btn btn-secondary" href="/items/detail/{{ $item->id }}">詳細</a></td> -->
                <!-- <td><a class="btn btn-secondary" href="/item/detail">詳細</a></td> -->

                {{-- <td class="width5">{{ $item->updated_at }}</td> --}}
                <td class="width5">{{$item -> created_at->format('Y-m-d')}}</td>
                
            </tr>
        @endforeach
     </table>
     <img src="{{ asset('img/23348350.jpg') }}" class="img" alt="">
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
.table2 {
  margin-top: 20px;
  padding: 20px 20px;
  font-size: 18px;
  background-color: #f5f5f5;
  border-radius:8px;
}

.width1 {
  width: 50px;
  border-bottom: 0.8px solid green;
}

.width2 {
  width: 80px;
  height: 40px;
  text-align: left;
  border-bottom: 0.8px solid green;
}

.width3 {
  width: 400px;
  border-bottom: 0.8px solid green;
}

.width4 {
  width: 200px;
  border-bottom: 0.8px solid green;
}

.width5 {
  width: 200px;
  border-bottom: 0.8px solid green;
}
</style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

