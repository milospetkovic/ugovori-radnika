@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Maska za unos novog komitenta</div>

            <div class="panel-body">


                <form action="{{ action('Company\CompanyController@store') }}" method="post" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="">
                        <label for="name">Naziv komitenta</label>
                        <input class="form-control" placeholder="" type="text" name="name" id="name">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary m-r"><span class="fa fa-check"></span> Sacuvaj</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
@endsection