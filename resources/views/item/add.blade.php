@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div>
                            <label for="form-type" class="col-sm-3 control-label">種別</label>
                            <select name="type" id="type-select">
                            <option value="">--Please choose an option--</option>
                            <option value="1" @if(1 === (int)old('type')) selected @endif>アウター</option>
                            <option value="2" @if(2 === (int)old('type')) selected @endif>トップス</option>
                            <option value="3" @if(3 === (int)old('type')) selected @endif>ボトムス</option>
                            </select>
                        </div>


                        <!-- <div class="form-group">
                            <label for="type">種別</label>
                            <input type="number" class="form-control" id="type" name="type" placeholder="1, 2, 3, ...">
                        </div> -->

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                            <!-- <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明"> -->
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
