@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead>
                          <tr>   
                            <th>Week</th>
                            <th>Deposit</th>
                            <th>Total</th>
                            <th>Checkmark</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($challenges as $challenge)
                          <tr style="cursor: pointer;" onclick="sendForm(event, document.getElementById('change-state-form'), {{$challenge->id}})">
                              <td>{{$challenge->week}}</td>
                              <td>RM{{$challenge->deposit}}</td>
                              <td>RM{{$challenge->total}}</td>
                              <td>{{ in_array($challenge->id, $completed_challenges_ids) ? '✅' : '' }}</td>
                          </tr>
                        @endforeach  
                      </tbody>
                    </table>
                    <script type="text/javascript">
                        function sendForm(event, form, id)
                        {
                            event.preventDefault();
                            form.elements["challengeid"].value = id;
                            form.submit();
                        }
                    </script>
                    <form id="change-state-form" style="display: none" action="{{ url('/challenge/change-state') }}" method="POST">{{ csrf_field() }}<input type="hidden" name="challengeid"></form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
