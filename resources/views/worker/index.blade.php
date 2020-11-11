@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">

                @if ($view_type == 'view')

                    Kartica radnika

                @elseif ($view_type == 'create')

                    Maska za unos novog radnika za komitenta:
                    <a class="btn btn-xs btn-info" href="/company/show/{{ $company_id }}">{{ $company_name }}</a>

                @elseif ($view_type == 'edit')

                    Ažuriranje radnika za komitenta:
                    <a class="btn btn-xs btn-info" href="/company/show/{{ $company_id }}">{{ $company_name }}</a>

                @endif

            </div>

            <div class="panel-body">

                @if ($view_type == 'view')

                    <table class="table" id="table">

                        <tr>
                            <td>Radnik za komitenta:</td>
                            <td><a class="btn btn-xs btn-info" href="/company/show/{{ $company_id }}">{{ $company_name }}</a></td>
                        </tr>

                        <tr>
                            <td>Ime radnika:</td>
                            <td>{{ $first_name }}</td>
                        </tr>

                        <tr>
                            <td>Prezime radnika:</td>
                            <td>{{ $last_name }}</td>
                        </tr>

                        <tr>
                            <td>Početak ugovora:</td>
                            <td>{{ date('d.m.Y', strtotime($contract_start)) }}</td>
                        </tr>

                        <tr>
                            <td>Kraj ugovora:</td>
                            <td>{{ date('d.m.Y', strtotime($contract_end)) }}</td>
                        </tr>

                        <tr>
                            <td>JMBG:</td>
                            <td>{{ $jmbg }}</td>
                        </tr>

                        <tr>
                            <td>Status radnika:</td>
                            <td>{!! $status !!}</td>
                        </tr>

                        <tr>
                            <td>Aktivan do datuma:</td>
                            <td>
                                @if ($active_until_date)
                                    {{ date('d.m.Y', strtotime($active_until_date)) }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Salji notifikaciju za istek ugovora:</td>
                            <td>{{ $send_contract_ended_notification }}</td>
                        </tr>

                        <tr>
                            <td>Beleska:</td>
                            <td>{!! nl2br(e($description)) !!}</td>
                        </tr>

                    </table>

                    <div class="mrg-t-10">

                        <a href="{{ action('Worker\WorkerController@edit', ['company_id' => $company_id, 'id' => $id]) }}" class="btn btn-warning mrg-r-5"><span class="fa fa-check"></span> Ažuriraj</a>

                        <a class="btn btn-default" href="{{ action('Company\CompanyController@show', ['id' => $company_id ]) }}" class="btn btn-default">Nazad</a>

                        <a onclick="if (!confirm('Da li zaista želite da obrišete radnika?')) return false;"  href="{{ action('Worker\WorkerController@delete', ['company_id' => $company_id, 'id' => $id]) }}" class="btn btn-danger pull-right"><span class="fa fa-check"></span>Obriši</a>

                    </div>

                @elseif ($view_type == 'create')

                    <form action="{{ action('Worker\WorkerController@store', ['id' => $company_id]) }}" method="post" class="form-horizontal">

                        {{ csrf_field() }}

                        <input type="hidden" name="fk_company" value="{{ $company_id }}">

                        <div class="mrg-t-10">
                            <label for="name">Ime radnika</label>
                            <input class="form-control" placeholder="" type="text" name="first_name" value="{{ old('first_name') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="name">Prezime radnika</label>
                            <input class="form-control" placeholder="" type="text" name="last_name" value="{{ old('last_name') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="name">Datum početka ugovora</label>
                            <input class="form-control" placeholder="" type="text" name="contract_start" id="contract_start" value="{{ old('contract_start') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="name">Datum kraja ugovora</label>
                            <input class="form-control" placeholder="" type="text" name="contract_end" id="contract_end" value="{{ old('contract_end') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="name">JMBG</label>
                            <input class="form-control" placeholder="" type="text" name="jmbg" id="jmbg" value="{{ old('jmbg') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="active_until_date">Aktivan do datuma</label>
                            <input class="form-control" placeholder="" type="text" name="active_until_date" id="active_until_date" value="{{ old('active_until_date') }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="send_contract_ended_notification">Salji notifikaciju za istek ugovora:</label>
                            <div class="clearfix"></div>
                            <input type="checkbox" checked name="send_contract_ended_notification" id="ignore_contract_ended_notification" value="1" />
                        </div>

                        <div class="mrg-t-10">
                            <label for="description">Beleska</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                        </div>

                        <div class="mrg-t-10">
                            <button type="submit" class="btn btn-success mrg-r-5"><span class="fa fa-check"></span> Sačuvaj</button>
                            <a class="btn btn-default" href="{{ action('Company\CompanyController@show', ['id' => $company_id ]) }}" class="btn btn-default">Prekini</a>
                        </div>

                    </form>

                @elseif ($view_type == 'edit')

                    <form action="{{ action('Worker\WorkerController@edit', ['company_id' => $company_id, 'id' => $id]) }}" method="post" class="form-horizontal">

                        {{ csrf_field() }}

                        <input type="hidden" name="fk_company" value="{{ $company_id }}">

                        <div class="mrg-t-10">
                            <label for="first_name">Ime radnika</label>
                            <input class="form-control" placeholder="" type="text" name="first_name" value="{{ $first_name }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="last_name">Prezime radnika</label>
                            <input class="form-control" placeholder="" type="text" name="last_name" value="{{ $last_name }}">
                        </div>

                        <div class="mrg-t-10">
                            <label for="contract_start">Datum početka ugovora</label>
                            <input class="form-control" placeholder="" type="text" name="contract_start" id="contract_start" value="{{ date('d.m.Y', strtotime($contract_start)) }}" />
                        </div>

                        <div class="mrg-t-10">
                            <label for="contract_end">Datum kraja ugovora</label>
                            <input class="form-control" placeholder="" type="text" name="contract_end" id="contract_end" value="{{ date('d.m.Y', strtotime($contract_end)) }}" />
                        </div>

                        <div class="mrg-t-10">
                            <label for="name">JMBG</label>
                            <input class="form-control" placeholder="" type="text" name="jmbg" id="jmbg" value="{{ $jmbg  }}" />
                        </div>

                        <div class="mrg-t-10">
                            <label for="inactive">
                                Deaktiviraj radnika
                                <div class="clearfix"></div>
                                <input class="mrg-l-5" id="inactive" type="checkbox" @if ($status_val == 1) checked @endif name="inactive" id="jmbg" value="1">
                            </label>
                        </div>

                        <div class="mrg-t-10">
                            <label for="active_until_date">Aktivan do datuma</label>
                            <input class="form-control" placeholder="" type="text" name="active_until_date" id="active_until_date" value="@if ($active_until_date){{ date('d.m.Y', strtotime($active_until_date)) }}@endif">
                        </div>

                        <div class="mrg-t-10">
                            <label for="send_contract_ended_notification">
                                Salji notifikaciju za istek ugovora
                                <div class="clearfix"></div>
                                <input class="mrg-l-5" id="send_contract_ended_notification" type="checkbox" @if ($send_contract_ended_notification == 1) checked @endif name="send_contract_ended_notification" value="1" />
                            </label>
                        </div>

                        <div class="mrg-t-10">
                            <label for="description">Beleska</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{!! $description !!}</textarea>
                        </div>

                        <div class="mrg-t-10">
                            <button type="submit" class="btn btn-success mrg-r-5"><span class="fa fa-check"></span> Sačuvaj</button>
                            <a class="btn btn-default" href="{{ action('Company\CompanyController@show', ['id' => $company_id ]) }}" class="btn btn-default">Prekini</a>
                        </div>

                    </form>

                @endif

            </div>

        </div>
    </div>
@endsection

@section('pagescript')

    <script type="text/javascript">
        $(function(){
            $( "#contract_start, #contract_end, #active_until_date" ).datetimepicker({
                format: 'DD.MM.YYYY',
                showTodayButton: true,
                calendarWeeks: false
            });
        });

    </script>

@endsection