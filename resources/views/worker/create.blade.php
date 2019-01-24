@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Maska za unos novog radnika za komitenta: <strong>{{ $company_name }}</strong></div>

            <div class="panel-body">

                <form action="{{ action('Worker\WorkerController@store', ['id' => $company_id]) }}" method="post" class="form-horizontal">

                    {{ csrf_field() }}


                    <input type="hidden" name="fk_company" value="{{ $company_id }}">

                    <div class="">
                        <label for="name">Ime radnika</label>
                        <input class="form-control" placeholder="" type="text" name="first_name" value="{{ old('first_name') }}">
                    </div>

                    <div class="">
                        <label for="name">Prezime radnika</label>
                        <input class="form-control" placeholder="" type="text" name="last_name" value="{{ old('last_name') }}">
                    </div>

                    <div class="">
                        <label for="name">Datum pocetka ugovora</label>
                        <input class="form-control" placeholder="" type="text" name="contract_start" id="contract_start" value="{{ old('contract_start') }}">
                    </div>

                    <div class="">
                        <label for="name">Datum kraja ugovora</label>
                        <input class="form-control" placeholder="" type="text" name="contract_end" value="{{ old('contract_end') }}">
                    </div>

                    <div class="mrg-t-10">
                        <button type="submit" class="btn btn-primary m-r"><span class="fa fa-check"></span> Sačuvaj</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection

@section('pagescript')

    <script type="text/javascript">
        $(function(){
            $( "#contract_start" ).datepicker({});
        });

    </script>

@endsection