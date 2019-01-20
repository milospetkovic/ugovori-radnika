@extends('layouts.app')

@section('content')

        <div class="content">

            <div>
                <a class="btn btn-info" href={{ action('Company\CompanyController@create') }}>Unos komitenata</a>
            </div>

            <div>
                <a class="btn btn-info" href={{ action('Company\CompanyController@listCompanies') }}>Lista unetih komitenta</a>
            </div>

            {{--
            <div class="title m-b-md">
                Elitasoft -> FERDIL Application
            </div>

            <div class="links">
                <img src="https://www.elitasoft.com/img/elitasoft.png" class="img-responsive img-rounded" style="max-width: 250px;">
            </div>
            --}}
        </div>

@endsection