@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Početna strana - navigacioni meni</div>

            <div class="panel-body">

                <div class="text-center">
                    <a class="btn btn-info" href={{ action('Company\CompanyController@create') }}>Unos komitenata</a>
                </div>

            </div>

        </div>
    </div>
@endsection
