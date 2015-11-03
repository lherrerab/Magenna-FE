@extends('layout.dashboard')

@section('sidebar')
            <li><a href="/magenna">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="/magenna/contacts" ng-click="activateContacts()">Contacts</a></li>
            <li><a href="/magenna/agenda">Agenda</a></li>
            <li class="active"><a href="#">Notes</a></li>
@stop

@section('content')     

@stop
