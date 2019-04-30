@extends('admin.layouts.app_admin');

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание заказа @endslot

        @endcomponent
            <form action="{{route('admin.saleproduct.store')}}" class="form-horisontal" method="post">
                {{csrf_field()}}
                {{-- Form include --}}
                @include('admin.saleproducts.partials.form',['data' => $data])
            </form>
    </div>
@endsection