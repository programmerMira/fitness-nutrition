@extends('layouts/account')

@section('content')
    <questions :search_flag=true :questions={{$questions}}></questions>
@endsection