@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

            <div class="panel-heading text-center">Početna strana - navigacioni meni</div>

            <div class="panel-body">

                <div class="row mrg-t-10 text-center clearfix">
                    <a class="btn btn-info" href={{ action('Company\CompanyController@create') }}>Unos komitenata</a>
                </div>

                <div class="row mrg-t-10 text-center clearfix">
                    <a class="btn btn-info" href={{ action('Company\CompanyController@listCompanies') }}>Lista komitenata <span class="badge">{{ $companies_count }}</span></a>
                </div>

                <div class="row mrg-t-10 text-center clearfix">
                    <a class="btn btn-info" href={{ action('Worker\WorkerController@listWorkers') }}>Lista radnika <span class="badge">{{ $workers_count }}</span></a>
                </div>

            </div>
        </div>
    </div>
@endsection
