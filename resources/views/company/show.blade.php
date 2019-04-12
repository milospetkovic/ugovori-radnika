@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">

                <div class="panel-heading">Komitent: {{ $company->name }}</div>

                <div class="panel-body">

                    <a href="/company/show/{{ $company->id }}/worker/create" class="btn btn-primary m-r">Dodaj radnika</a>

                    <a onclick="if (!confirm('Da li zaista želite da obrišete komitenta?')) return false;"  href="{{ action('Company\CompanyController@delete', ['company_id' => $company->id ]) }}" class="btn btn-danger pull-right"><span class="fa fa-check"></span>Obriši</a>

                    <hr>

                    <div class="clearfix">

                        <div class="row">

                            @include('partials.worker.list')

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@overwrite