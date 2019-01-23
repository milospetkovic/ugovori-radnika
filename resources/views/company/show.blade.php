@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">Komitent: {{ $company->name }}</div>

            <div class="panel-body">

                <a href="/company/show/{{ $company->id }}/worker/create" class="btn btn-primary m-r">Dodaj radnika</a>


                <form action="{{ action('Company\CompanyController@store') }}" method="post" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="">
                        <label for="name">Naziv komitenta</label>
                        <input class="form-control" placeholder="" type="text" name="name" id="name">
                    </div>

                    <div class="mrg-t-10">
                        <button type="submit" class="btn btn-primary m-r"><span class="fa fa-check"></span> Sačuvaj</button>
                    </div>

                </form>



            </div>

        </div>
    </div>
@endsection