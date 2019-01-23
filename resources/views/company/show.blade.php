@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">Komitent: {{ $company->name }}</div>

            <div class="panel-body">

                <a href="/company/show/{{ $company->id }}/worker/create" class="btn btn-primary m-r">Dodaj radnika</a>


            </div>

        </div>
    </div>
@endsection