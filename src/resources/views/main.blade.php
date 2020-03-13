@extends('dashboard::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добро пожаловать!</div>
                <div class="card-body">
                    Это главная страница административной панели {{ config('app.name', 'Laravel') }} проекта
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
