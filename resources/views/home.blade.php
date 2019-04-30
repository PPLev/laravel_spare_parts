@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <p><span class="label label-primary">Товары {{$count_product}}</span></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <p><span class="label label-primary">Заказы {{$order_product}}</span></p>
                </div>
            </div>

        </div>

        <div class="row">
            @if($user_type)
                <div class="col-sm-6">
                    <a class="btn btn-block btn-default" href="{{route('admin.product.create')}}">Создать продукт</a>
                </div>
                <div class="col-sm-6">
            @else
                        <div class="col-sm-12">
            @endif


                            <a class="btn btn-block btn-default" href="{{route('admin.saleproduct.create')}}">Создать
                                Заказ</a>
                        </div>
                </div>
        </div>
@endsection