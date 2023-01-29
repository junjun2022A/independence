@extends('adminlte::page')

@section('title', '商品一覧')


@section('content_header')




@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ユーザー一覧</title>
</head>
<body>
   
    <div class="container">
        <div style="text-align:center;">
        <h1>ユーザー覧</h1>
        </div>

        <div>
            <table class="table">
            <thead class="thead-dark">

                <tr>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>権限</th>
                    <th>編集</th>
                    <th>更新日時</th>
                </tr>
            </thead>
                    @foreach($users as $users)
                    <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    @if ($users->role == '0')
                    <td>利用者</td>
                    @else($users->role == '1')
                    <td>管理者</td>
                    @endif
                    <td><a href="/user/edit/{{$users->id}}" class="btn btn-danger">編集</a></td>
                    <td>{{$users->updated_at}}</td>
                    

                </tr>
                
                @endforeach
            </table>

</div>

<script>
        function test() {
          alert('hello');
        }
</script>

</body>
</html>
@stop