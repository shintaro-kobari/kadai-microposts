{!! Form::open(['route' => 'microposts.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '7']) !!}
        {!! Form::submit(__('messages.post'), ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}