@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12">
                    <div class="page-header">
                      <h1>How To Use</h1>
                    </div>
                    <ul class="timeline">
                        @foreach($steps as $step)
                        <li class="timeline-item">
                            <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{$step['title']}}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>{!!$step['description']!!}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
    </div>

      @include('layouts.footer')
</div>
@endsection
