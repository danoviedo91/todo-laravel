@extends('layouts.main')
@section('content')
    <h2>Show All Todo Lists</h2>
    <ul>
        @foreach ($todo_lists as $list)
            <div>{!! link_to_route('todos.show', $list->name, [$list->id]) !!}</div>
            <ul class="no-bullet button-group">
                <li>
                    {!! link_to_route('todos.edit', 'edit', [$list->id], ['class' => 'tiny button']) !!}
                </li>
                <li>
                    {!! Form::model($list, array('route' => array('todos.destroy', $list->id), 'method' => 'DELETE')) !!}
                    {!! Form::button('destroy', ['type' => 'submit', 'class' => 'tiny alert button']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
        @endforeach
    </ul>
    <p> {!! link_to_route('todos.create', 'Create', null, ['class' => 'success button']) !!} </p>
@stop