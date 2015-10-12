@extends('layout.dashboard')

@section('sidebar')
            			<li><a href="/magenna">Dashboard <span class="sr-only">(current)</span></a></li>
            			<li class="active"><a href="#" ng-click="activateContacts()">Contacts</a></li>
            			<li><a href="agenda">Agenda</a></li>
            			<li><a href="notes">Notes</a></li>
@stop

@section('content')        		
        		
        		<div id="divContacts" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">        			
          			<h1 class="page-header">
          				Contacts          				
          			</h1>
          			
					<div class="table-responsive">
            			<table class="table table-condensed">
             				<thead>
             					<tr>
             						<th colspan="5">
             							<button title="Create new member" class="btn" data-toggle="modal" data-target="#modalCreate">
											<span class="glyphicon glyphicon-user"></span> New Member
										</button>
             						</th>
             					</tr>
                				<tr>
                  					<th>#</th>
                  					<th>Name</th>
                  					<th>Phone</th>
                  					<th>Email</th>
                  					<th>Favorite</th>
                				</tr>
              				</thead>
              				<tbody>
              					<tr>

              					</tr> 
              				</tbody>
            			</table>          			
        			</div>
        		</div>
        		
				<div class="modal fade" id="modalCreate" role="dialog">  		
    				<form name="formCreate" novalidate="novalidate" class="form-horizontal">
    					<div align="center" style="background-color:white;width: 20%;margin:0 auto;">
    						<h1>Contact Details</h1>
    						<input type="hidden" id="token" ng-model="token" value="{{ csrf_token() }}">
        					<div class="control-group">
            					<label class="control-label" for="inputName">Name:</label>
            					<div class="controls">
                					<input type="text" id="inputName" ng-model="name"/>
            					</div>
        					</div>
        					<div class="control-group">
            					<label class="control-label" for="inputPhone">Phone:</label>
            					<div class="controls">
                					<input type="text" id="inputPhone" ng-model="phone"/>
            					</div>
        					</div>
        					<div class="control-group">
            					<label class="control-label" for="inputEmail">Email:</label>
            					<div class="controls">
                					<input type="text" id="inputEmail" ng-model="email"/>
            					</div>
        					</div>
        					<div class="control-group">
            					<label class="control-label" for="inputFav">Favorite:</label>
            					<div class="controls">
                					<input class="glyphicon glyphicon-star-empty" type="checkbox" id="inputFav" ng-model="favorite"/>
            					</div>
        					</div>			        	
        					<div class="control-group">
            					<div class="controls">
                					<input type="button" value="Submit" ng-click="addContact()" class="btn btn-small btn-primary">
                					<input type="button" value="Cancel" data-dismiss="modal" class="btn btn-small btn-primary">
            					</div>
        					</div>
        				</div> 
    				</form>
				</div>         		
        		
  @stop
