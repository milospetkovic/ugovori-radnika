@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">

                <div class="panel-heading">Komitent: {{ $company->name }}</div>

                <div class="panel-body">

                    <a href="/company/show/{{ $company->id }}/worker/create" class="btn btn-primary m-r">Dodaj radnika</a>

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