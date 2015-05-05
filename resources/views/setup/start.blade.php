@extends('layouts.base')

@section('content')

    <div id="setup"
         class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

        <h1 id="ip-logo" class="ip-logo" style="display: none;"></h1>

        <h2 id="welcome-text" class="text-center" style="display: none;">@lang('setup.welcome')</h2>
        <br/>

        <div id="language-panel" class="panel panel-default" style="display: none;">

            <div class="panel-heading">
                <h3 class="panel-title">@lang('setup.ip_setup')</h3>
            </div>

            <div class="panel-body">

                <p>@lang('setup.start.text')</p>

                <form role="form" method="POST" action="/setup/">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <select class="form-control" name="language" id="select-language">
                                    @foreach($languages as $langcode => $langname)
                                        <option value="{{$langcode}}"
                                            @if($langcode === 'en') selected @endif
                                            >{{$langname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">
                            @lang('setup.next') <i class="fa fa-chevron-right fa-margin-left"></i>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        $('#ip-logo').fadeIn(1000);
        $('#welcome-text').delay(1500).fadeIn(1000);
        $('#language-panel').delay(2500).slideDown(1000);
    </script>
@endsection
