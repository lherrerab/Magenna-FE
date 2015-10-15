@extends('layout.dashboard')

@section('sidebar')
            			<li><a href="/magenna">Dashboard <span class="sr-only">(current)</span></a></li>
            			<li><a href="/magenna/contacts" ng-click="activateContacts()">Contacts</a></li>
            			<li class="active"><a href="#">Agenda</a></li>
            			<li><a href="/magenna/notes">Notes</a></li>
@stop

@section('content')

@stop