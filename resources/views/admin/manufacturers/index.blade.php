@extends('admin.layouts.app_admin');

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список производителей@endslot
        @endcomponent
        <hr>
        <a href="{{route('admin.manufacturer.create')}}" class="btn btn-primary pull-right">Зарегистрировать производителя</a>
        <div class="row">
            <div class="col-sm-6">
                @forelse($manufacturers as $manufacturer)
                    <a href="{{route('admin.manufacturer.edit',['id'=>$manufacturer->id])}}">{{$manufacturer->name}}</a><br>
                @empty
                    данные отсутсвуют
                @endforelse
            </div>
        </div>
    </div>

@endsection