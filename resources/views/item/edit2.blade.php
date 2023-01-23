<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
        
        
    </head>
    
    <body>
    
        <div class="container">
            <h1>編集</h1>
            <!-- Laravelバリデーションのエラー表示 -->
            @if(count($errors) > 0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        
         @endif
        

<form method="POST" action="/items/update/{{$item->id}}">
         @csrf
  

        <div>
            商品名
            <input type="text" name=name value="{{old('name',$item->name)}}">
            
        </div>

        <div>
            種別
            <select name="type" id="type-select" value="{{$item->name}}">
            <option value="">--Please choose an option--</option>
            <option value="1" @if(1 === (int)old('type',$item->type)) selected @endif>アウター</option>
            <option value="2" @if(2 === (int)old('type',$item->type)) selected @endif>トップス</option>
            <option value="3" @if(3 === (int)old('type',$item->type)) selected @endif>ボトムス</option>
            </select>
        </div>

        <div>
            詳細
            <textarea name="detail" id="" cols="30" rows="10">{{old('detail',$item->detail)}}</textarea>
        </div>
        
        <input type="radio" name="status" value="active" class="chk1" id="chkid1" @if('active' === old('status',$item->status)) checked="checked" @endif>
        <label for="chkid1">有効</label>
   
        <input type="radio" name="status" value="inactive" class="chk2" id="chkid2" @if('inactive' === old('status',$item->status)) checked="checked" @endif>
        <label for="chkid2">無効</label>

        <input type="submit" value="編集">

    </form>

  
    <form method="POST" action="/items/destroy/{{$item->id}}">
        @csrf
        <button type="submit" style="background-color:#CC3333; border-color:#CC3333;">削除</button>
    </form>
    
    
        
    
    </body>
</html> 
