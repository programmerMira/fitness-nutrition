@extends('layouts/account')

@section('content')
    <Question :question={{$question->id}}></Question>
@endsection
