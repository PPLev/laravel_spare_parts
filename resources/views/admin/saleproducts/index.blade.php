@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список заказов @endslot
        @endcomponent
        <hr>
        <a href="{{route('admin.saleproduct.create')}}" class="btn btn-primary pull-right">Создать Заказ</a>
        <div class="row">
            <div class="col-sm-10">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">От:</th>
                        <th scope="col">До:</th>
                        <th scope="col">Производитель</th>
                        <th scope="col">имя товара</th>
                        <th scope="col">создатель заказа</th>
                        <th scope="col">Статус заказа</th>
                        <th scope="col">заказ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($saleproducts as $saleproduct)
                        <tr>
                            <th scope="row">{{$saleproduct->id}}</th>
                            <td>{{$saleproduct->price_up}}</td>
                            <td>{{$saleproduct->price_down}}</td>
                            <td>{{$saleproduct->manufacturer_name}}</td>
                            <td>{{$saleproduct->tovar_name}}</td>
                            <td>{{$saleproduct->user_name}}</td>
                            <td>
                            @if($saleproduct->status_order == 1)
                                 В ожидании
                                @elseif($saleproduct->status_order == 2)
                                Принят
                            @endif
                            </td>
                            <td><a href="{{route('admin.saleproduct.edit',['saleproduct'=>$saleproduct])}}">Редактировать заказ</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">данные отсутсвуют</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection