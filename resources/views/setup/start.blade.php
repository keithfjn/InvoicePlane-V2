@extends('layouts.base')

@section('content')

    <div id="setup"
         class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

        <div class="ip-logo"></div>

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">@lang('setup.ip_setup')</h3>
            </div>

            <div class="panel-body">

                <p>@lang('setup.start.text')</p>

                <form role="form" method="POST" action="/setup/">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="row">
                            <label class="col-xs-12 control-label">@lang('setup.choose_language')</label>
                            <div class="col-xs-12 col-sm-8">
                                <select class="form-control">
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
@endsection
