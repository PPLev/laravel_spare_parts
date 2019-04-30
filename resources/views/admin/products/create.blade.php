@extends('admin.layouts.app_admin');

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание продукта @endslot
        @endcomponent
            <form action="{{route('admin.product.store')}}" class="form-horisontal" method="post">
                {{csrf_field()}}
                {{-- Form include --}}
                @include('admin.products.partials.form',[
                    'manufacturers' => $manufacturers,
                    'tovars' => $tovars])
            </form>
    </div>
@endsection