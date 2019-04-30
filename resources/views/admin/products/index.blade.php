@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список продуктов @endslot
        @endcomponent
        <hr>
        @if($user_type)
            <a href="{{route('admin.product.create')}}" class="btn btn-primary pull-right">Создать продукт</a>
        @endif
        <div class="row">
            <div class="col-sm-10">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Производитель</th>
                        <th scope="col">Цена</th>
                        @if(!$user_type)
                            <th scope="col">Продавец</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->tovar->name}}</td>
                            <td>{{$product->count}}</td>
                            <td>{{$product->manufacturer->name}}</td>
                            <td>{{$product->price}}</td>
                            @if(!$user_type)
                                <td>{{$product->user_id}}</td>
                            @endif
                        </tr>
                    @empty
                        данные отсутсвуют
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection