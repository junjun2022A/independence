@extends('adminlte::page')

@section('title', '商品一覧')


@section('content_header')




@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>ユーザ編集</title>
</head>
<body>

<div class="container">
  <div style="text-align:center;">
  
    <h1>編集 会員ID:{{$users->id}}</h1>
  </div>

      <form method="POST" action="{{route('user.update',['id' =>$users->id])}}">

        @csrf
        <div class="row">
          <div class="form-group col-xs-4">
              <label for="name1">名前</label>
              <input class="form-control" type="text"  name="name" value="{{$users->name}}">
              @error('name')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror        
          </div>
          <div class="form-group col-xs-4">
          <label for="mail1">メールアドレス</label>
          <input class="form-control" type="text" name=email value="{{$users->email}}">
              @error('email')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror        
            
          </div>
          </div>
        <div class="form-group">
          <label>{{ __('権限') }}
              <br>
              <div class="form-check form-check-inline">
              <input type="radio" name="role" class="form-check-input" id="release1" value="1" {{ old ('role', $users->role) == '1' ? 'checked' : '' }}>
              <label for="release1" class="form-check-label">管理者</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="role" class="form-check-input" id="release2" value="0" {{ old ('role', $users->role) == '0' ? 'checked' : '' }}>
              <label for="release2" class="form-check-label">利用者</label>
            </div>
          </label>
</div>

<a class="btn btn-danger" href="/user/index" role="button">戻る</a>
  
<button type="submit" class="btn btn-danger">編集</button>

    
  </body>
  </html>
  @stop