<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>商品詳細</title>

<style>
.table th {
    background-color: #eee;
}
.table td {
    padding-left:20px;
}
</style>
</head>
<body>

<div class="container">
<h1 class="text-center">商品詳細</h1>
<table class="table table-hover">
<tr>
    <th>登録番号</th>
    <td>{{ $item->id }}</td>
</tr>
<tr>
    <th>商品名</th>
    <td>{{ $item->name }}</td>
</tr>
<tr>
    <th>種別</th>
    <td>{{ $types[$item->type] ?? '未分類' }}</td>
</tr>
<tr>
    <th>詳細</th>
    <td>{!! nl2br($item->detail) !!}</td>
</tr>

</table>
    <div>

        <a class="btn btn-secondary" href="/items">一覧に戻る</a>
    </div>
</div>
</body>
</html>
