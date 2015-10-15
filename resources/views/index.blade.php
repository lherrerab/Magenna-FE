@extends('layout.dashboard')

@section('sidebar')
            			<li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            			<li><a href="magenna/contacts" ng-click="activateContacts()">Contacts</a></li>
            			<li><a href="magenna/agenda">Agenda</a></li>
            			<li><a href="magenna/notes">Notes</a></li>
@stop

@section('content')     

@stop