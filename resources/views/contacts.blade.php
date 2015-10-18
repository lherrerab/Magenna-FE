@extends('layout.dashboard')

@section('sidebar')

	<li><a href="/magenna">Dashboard <span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="#" ng-click="activateContacts()">Contacts</a></li>
    <li><a href="/magenna/agenda">Agenda</a></li>
    <li><a href="/magenna/notes">Notes</a></li>

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
             			<th colspan="6">
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
                		<th>Options</th>
                	</tr>
              	</thead>
              	<tbody>
          			<tr ng-repeat="contact in contacts">
          		    	<td><% ($index+1) %></td>
						<td><%contact.name%></td>
						<td><%contact.phone%></td>
						<td><%contact.email%></td>
						<td>
							<input type="checkbox" name="favorite" ng-true-value="1" ng-false-value="0" 
								   ng-checked="<%contact.favorite%>" ng-click="setFavorite($index)"/>													
						</td>
						<td>
							<button title="Edit" class="btn" ng-click="loadData($index)" data-toggle="modal" data-target="#modalEdit">
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
							<button title="Delete" class="btn" ng-click="loadData($index)" data-toggle="modal" data-target="#modalDelete">
								<span class="glyphicon glyphicon-remove"></span>
							</button>																					
						</td>
              		</tr> 
              	</tbody>
            </table>          			
        </div>
	</div>
        		
	<div class="modal fade" id="modalCreate" role="dialog">  		
    	<form name="formCreate" novalidate="novalidate" class="form-horizontal">
    		<div align="center" style="background-color:white;width: 20%;margin:0 auto;">
    			<h1>Contact Details</h1>
    			<input type="hidden" name="_token" id="token" ng-model="token" value="{{ Session::token() }}">
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
                		<input class="glyphicon glyphicon-star-empty" type="checkbox" 
                				id="inputFav" ng-model="favorite" ng-true-value="1" ng-false-value="0" ng-checked="checkbox == 1"/>
            		</div>
        		</div>			        	
        		<div class="control-group">
            		<div class="controls">
                		<input type="button" value="Add Contact" ng-click="addContact()" class="btn btn-small btn-primary">
                		<input type="button" value="Cancel" data-dismiss="modal" class="btn btn-small btn-primary">
            		</div>
        		</div>
        	</div> 
    	</form>
	</div>         		

	<div class="modal fade" id="modalEdit" role="dialog">  		
    	<form name="formEdit" novalidate="novalidate" class="form-horizontal">
    		<div align="center" style="background-color:white;width: 20%;margin:0 auto;">
    			<h1>Edit Details</h1>
    			<input type="hidden" name="_token" id="token" ng-model="token" value="{{ Session::token() }}">
    			<input type="hidden" name="id" id="id" ng-model="id" value="<% id %>">
    			<div class="control-group">
    				<label class="control-label" for="inputEditName">Name:</label>
    				<div class="controls">
       					<input type="text" id="inputEditName" ng-model="editName"/>
    				</div>
    			</div>
        		<div class="control-group">
            		<label class="control-label" for="inputEditPhone">Phone:</label>
            		<div class="controls">
                		<input type="text" id="inputEditPhone" ng-model="editPhone"/>
            		</div>
        		</div>
        		<div class="control-group">
            		<label class="control-label" for="inputEditEmail">Email:</label>
            		<div class="controls">
                		<input type="text" id="inputEditEmail" ng-model="editEmail"/>
            		</div>
        		</div>        	
        		<div class="control-group">
            		<div class="controls">
                		<input type="button" value="Edit Contact" ng-click="editContact()" class="btn btn-small btn-primary">
                		<input type="button" value="Cancel" data-dismiss="modal" class="btn btn-small btn-primary">
            		</div>
        		</div>
        	</div> 
    	</form>
	</div>     
	
	<div class="modal fade" id="modalDelete" role="dialog">  		
    	<form name="formEdit" novalidate="novalidate" class="form-horizontal">
    		<div align="center" style="background-color:white;width: 20%;margin:0 auto;">
    			<h3>Do you want to remove this contact?</h3>
    			<input type="hidden" name="_token" id="token" ng-model="token" value="{{ Session::token() }}">
    			<input type="hidden" name="id" id="id" ng-model="id" value="<% id %>">
    			<div class="control-group">    				
    				<label for="inputEditName">Name: <%editName%></label>
    			</div>
        		<div class="control-group">
            		<label for="inputEditPhone">Phone: <%editPhone%></label>
        		</div>
        		<div class="control-group">
            		<label for="inputEditEmail">Email: <%editEmail%></label>
        		</div>        	
        		<div class="control-group">
            		<div class="controls">
                		<input type="button" value="Delete" ng-click="deleteContact()" class="btn btn-small btn-primary">
                		<input type="button" value="Cancel" data-dismiss="modal" class="btn btn-small btn-primary">
            		</div>
        		</div>
        	</div> 
    	</form>
	</div>         		

        	       		
        		
  @stop
