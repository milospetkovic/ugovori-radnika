@extends('layouts.app')

@section('content')

    <div class="col-xs-12">

        <div class="panel panel-default">

            <div class="panel-heading">Komitent: {{ $company->name }}</div>

            <div class="panel-body">

                <a href="{{ action('HomeController@index') }}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-home"></i> Početna strana</a>

                <a href="{{ url()->previous() }}" class="btn btn-sm btn-default mrg-l-5 mrg-r-5"><i class="glyphicon glyphicon-circle-arrow-left"></i> Nazad</a>

                <a href="/company/show/{{ $company->id }}/worker/create" class="btn btn-sm btn-primary m-r">Dodaj radnika</a>

                <a onclick="if (!confirm('Da li zaista želite da obrišete komitenta?')) return false;"  href="{{ action('Company\CompanyController@delete', ['company_id' => $company->id ]) }}" class="btn btn-sm btn-danger pull-right"><span class="fa fa-check"></span>Obriši</a>

            </div>

        </div>

    </div>

    <div class="clearfix">

        @include('partials.worker.list')

    </div>

@endsection