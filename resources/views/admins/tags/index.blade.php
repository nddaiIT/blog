@extends('admins.layouts.master')
@section('content')
	<div class="container-fluid">
        <div class="block-header">
            <h2>
                DATATABLES
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           	Tag data table
                        </h2>
                    </div>
                    <div class="container-fluid">
                    	<a class="btn btn-primary" data-toggle="modal" href='#add'>Add new</a>	
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   	@foreach ($tags as $tag)
                                   		<tr>
	                                        <td>{{ $tag->id}}</td>
	                                        <td>{{ $tag->name}}</td>
	                                        <td>{{ $tag->slug}}</td>
	                                        <td>{{ $tag->created_at}}</td>
	                                        <td>{{ $tag->updated_at}}</td>
	                                        <td>
	                                        	<a class="btn btn-info btn-xs" data-toggle="modal" href='#view-{{$tag->id}}'>View</a>
	                                        	<a class="btn btn-warning btn-xs" data-toggle="modal" href='#edit-{{$tag->id}}'>Edit</a>
	                                        	<form onsubmit="return confirm('Do you really want to delete?');" style="display: inline-block;" method="post" action="Tags/{{$tag->id}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    {{method_field('delete')}}
                                                    <button style="cursor: pointer;" class="btn btn-danger btn-xs" type="submit" role="button">
                                                        Delete
                                                    </button>
                                                </form>

	                                        </td>


	                                   
	                                        <div class="modal fade" id="view-{{$tag->id}}">
	                                        	<div class="modal-dialog">
	                                        		<div class="modal-content">
	                                        			<div class="modal-header">
	                                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                                        				<h4 class="modal-title">Infomation of tag</h4>
	                                        			</div>
	                                        			<div class="modal-body">
	                                        				<form action="" method="POST" role="form">
	                                        				
	                                        					<div class="form-group">
	                                        						<label for="">ID</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" value="{{ $tag->id}}" disabled="" name="id">
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label for="">Name</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" value="{{ $tag->name}}" name="name" disabled="">
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label for="">Slug</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" name="slug" value="{{ $tag->slug}}" disabled="">
	                                        					</div>
	                                        					<div class="form-group">
	                                        						<label for="">Created at</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" value="{{ $tag->created_at}}" disabled="">
	                                        					</div>
	                                        					<div class="form-group">
	                                        						<label for="">Updated at</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" value="{{ $tag->updated_at}}" disabled="">
	                                        					</div>
	                                        				
	                                        					

	                                        				</form>
	                                        			</div>
	                                        			<div class="modal-footer">
	                                        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                        			</div>
	                                        		</div>
	                                        	</div>
	                                        </div>



	                                        <div class="modal fade" id="edit-{{$tag->id}}">
	                                        	{{csrf_token()}}
	                                        	<div class="modal-dialog">
	                                        		<div class="modal-content">
	                                        			<div class="modal-header">
	                                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                                        				<h4 class="modal-title">Update infomation of tag</h4>
	                                        			</div>
	                                        			<div class="modal-body">
	                                        				<form action="Tags/{{$tag->id}}" method="POST" role="form">
	                                        					{{csrf_field()}}
	                                        					{{method_field('put')}}
	                                        					<div class="form-group">
	                                        						<label for="">ID</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" name="id" value="{{$tag->id}}">
	                                        					</div>
	                                        					<div class="form-group">
	                                        						<label for="">Name</label>
	                                        						<input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $tag->name}}" disabled="">
	                                        					</div>

	                                        					{{-- <div class="form-group"> --}}
	                                        						{{-- <label for="">Slug</label> --}}
	                                        						<input type="hidden" class="form-control" id="" placeholder="" name="slug" value="{{$tag->slug}}">
	                                        					{{-- </div> --}}
	                                        				
	                                        					<div class="modal-footer">
			                                        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                                        				<button type="submit" class="btn btn-primary">Save changes</button>
			                                        			</div>
	                                        				</form>
	                                        			</div>
	                                        			
	                                        		</div>
	                                        	</div>
	                                        </div>
	                                    </tr>
                                   	@endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>


    <div class="modal fade" id="add">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Add new tag</h4>
    			</div>
    			<div class="modal-body">
    				<form action="{{ route('Tags.store') }}" method="POST" role="form">
    					{{csrf_field()}}
    					<div class="form-group">
    						<label for=""></label>
    						<input type="hidden" class="form-control" id="" placeholder="" name="id">
    					</div>

    					<div class="form-group">
    						<label for="">Name</label>
    						<input type="text" class="form-control" id="" placeholder="Tag's name" name="name">
    					</div>

    					{{-- <div class="form-group"> --}}
    						{{-- <label for="">Slug</label> --}}
    						<input type="hidden" class="form-control" id="" placeholder="Tag's slug" name="slug">
    					{{-- </div> --}}
    				
    					<div class="modal-footer">
		    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    				<button type="submit" class="btn btn-primary">Save</button>
		    			</div>
    				</form>
    			</div>
    			
    		</div>
    	</div>
    </div>
@endsection