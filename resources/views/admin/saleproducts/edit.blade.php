@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование заказа @endslot
        @endcomponent
        <form action="{{route('admin.saleproduct.update',$saleproduct)}}" class="form-horisontal" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            {{-- Form include --}}
            @include('admin.saleproducts.partials.formedit',[
                'saleproduct' => $saleproduct,
                'data' => $data
            ])
        </form>
    </div>
@endsection