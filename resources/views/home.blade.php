@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Brukerpanel</div>

                <div class="panel-body">
                  <p>Sjekk ut en av disse sidene:</p>
                    <ul>
                        <li>
                            <a href="{{ route('myposts') }}">
                                Mine Annonser
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('messages') }}">
                                Meldinger
                            </a>
                        </li>
                  </ul>
                  <p>Eller <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                logg ut
                            </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
