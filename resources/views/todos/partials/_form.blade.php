{!! Form::label('name', 'List Title') !!}
{!! Form::text('name') !!}
{!! $errors->first('name', '<small class="error">:message</small>') !!}
{!! Form::submit('submit', array('class' => 'button')) !!}
<p> {!! link_to_route('todos.index', 'back') !!} </p>