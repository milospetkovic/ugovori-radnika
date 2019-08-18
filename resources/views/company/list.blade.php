@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">
                Lista komitenata
                <a href="{{ action('HomeController@index') }}" class="btn btn-sm btn-default pull-right"><i class="glyphicon glyphicon-home"></i> Početna strana</a>
                <div class="clearfix">
                    <!-- -->
                </div>
            </div>

            <div class="panel-body">

                @if (count($companies))

                    <ul class="list-group">

                        @foreach($companies as $company)

                            <li class="list-group-item">
                                <a href="/company/show/{{ $company->id }}"> {{ $company->name }} </a>
                                <span class="pull-right badge alert-info" title="Broj radnika za komitenta">{{ $company_cnt_workers[$company->id] }}@if($company_cnt_inactive_workers[$company->id]) <span title="Broj neaktivnih korisnika">({{ $company_cnt_inactive_workers[$company->id] }})</span>@endif</span>
                            </li>

                        @endforeach

                    </ul>

                @else

                    <p>Nemate unetih komitenata</p>

                @endif

            </div>

        </div>
    </div>
@endsection