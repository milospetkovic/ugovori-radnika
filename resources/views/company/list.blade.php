@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">Lista komitenata</div>

            <div class="panel-body">

                @if (count($companies))

                    <ul class="list-group">

                        @foreach($companies as $company)

                            <li class="list-group-item">
                                <a href="/company/show/{{ $company->id }}"> {{ $company->name }} </a>
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