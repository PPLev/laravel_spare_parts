@extends('admin.layouts.app_admin');

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Регистрация производителя @endslot
        @endcomponent
            <form action="{{route('admin.manufacturer.store')}}" class="form-horisontal" method="post">
                {{csrf_field()}}
                {{-- Form include --}}
                @include('admin.manufacturers.partials.form')
            </form>
    </div>
@endsection