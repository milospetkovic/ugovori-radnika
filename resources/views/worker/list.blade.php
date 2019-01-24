@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">Lista radnika</div>

            <div class="panel-body">

                @if (count($workers))

                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kompanija</th>
                                <th>Prezime</th>
                                <th>Ime</th>
                                <th>Početak ugovora</th>
                                <th>Kraj ugovora</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($workers as $ind => $worker)
                                <tr>
                                    <td>{{ $ind + 1 }}.</td>
                                    <td>{{ $worker->company_name }}</td>
                                    <td>{{ $worker->last_name }}</td>
                                    <td>{{ $worker->first_name }}</td>
                                    <td>{{ date('d.m.Y', strtotime($worker->contract_start)) }}</td>
                                    <td>{{ date('d.m.Y', strtotime($worker->contract_end)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @else

                    <p>Nemate unetih radnika</p>

                @endif


                {{--


                @if (count($workers))

                    <ul class="list-group">

                        @foreach($workers as $ind => $worker)

                            <li class="list-group-item">
                                {{ $ind + 1 }} {{ $worker->last_name.' '.$worker->first_name }}
                            </li>

                        @endforeach

                    </ul>

                @else

                    <p>Nemate unetih komitenata</p>

                @endif

                --}}

            </div>

        </div>
    </div>
@endsection