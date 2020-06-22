@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="account-table__list">
            name:<span>{{$auth->name}}</span>
            email:<span>{{auth->email}}</span>
            password:<span>{{auth->password}}</span>
        </div>
    </div>
@endsection