@extends('layouts.main')
@section('content')
  @if (isset($data['last_name']))
    {{{ $data['last_name'] }}}  
  @endif
@stop