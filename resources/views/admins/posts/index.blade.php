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
                            Posts data table
                        </h2>
                    </div>
                    <div class="container-fluid">
                    	<a class="btn btn-primary" data-toggle="modal" href='#add'>Add new</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   	@foreach ($posts as $post)
                                   		<tr>
	                                        <td>{{ $post->id}}</td>
	                                        <td>{{ $post->title}}</td>
	                                        <td>
	                                        	<img width="100px" height="100px" src="{{$post->image}}">
	                                        </td>
	                                        <td>{{ $post->description}}</td>
	                                        <td>{{ $post->created_at->diffForHumans()}}</td>
	                                        <td>{{ $post->updated_at->diffForHumans()}}</td>
	                                        <td>
	                                        	<a class="btn btn-info btn-xs" data-toggle="modal" href='#view-{{$post->id}}'>View</a>
	                                        	<a class="btn btn-warning btn-xs" data-toggle="modal" href='#edit-{{$post->id}}'>Edit</a>
                                                {{-- <a class="btn btn-danger btn-xs delete-post" href="" post-id="{{$post->id}}" >Delete</a> --}}
                                                <form onsubmit="return confirm('Do you really want  to delete?');" style="display: inline-block;" method="post" action="Posts/{{$post->id}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    {{method_field('delete')}}
                                                    <button style="cursor: pointer;" class="btn btn-danger btn-xs" type="submit" role="button">
                                                        Delete
                                                    </button>
                                                </form>
                                                
	                                        </td>

                                           {{-- <script type="text/javascript">
                                                    $('a.delete-post').click(function(){
                                                        var postId=$(this).attr("post-id");
                                                        deletePost(postId);
                                                    });

                                                    function deletePost(postId){
                                                        swal({
                                                            title: "Are you sure?",
                                                            text: "Are you sure that you want to delete this post?",
                                                            type: "warning",
                                                            showCancelButton:true,
                                                            closeOnConfirm:false,
                                                            confirmButtonText: "Yes,delete it!",
                                                            confirmButtonColor: "#ec6c62"
                                                        },function(isConfirm){
                                                            if(isConfirm){
                                                                $.post('Posts/postId').then(function(){
                                                                    swal("Deleted!","Your post is successful deleted!","success");
                                                                });
                                                            }else{
                                                                swal("Cancel", "Your post is safe!","error");
                                                            }
                                                            
                                                        });
                                                    }
                                            </script>  --}}



	                                   
	                                        <div class="modal fade" id="view-{{$post->id}}">
	                                        	<div class="modal-dialog" style="width: 60%">
	                                        		<div class="modal-content" >
	                                        			<div class="modal-header">
	                                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                                        				<h4 class="modal-title">Infomation of post</h4>
	                                        			</div>
	                                        			<div class="modal-body">
	                                        				<div class="container-fluid">
	                                        					<h1>{{$post->title}}</h1>
	                                        				</div>
	                                        				<div class="container-fluid">
	                                        					<h4>{{$post->description}}</h4>
	                                        				</div>
															<div class="container-fluid">
																{!!$post->content!!}
															</div>

	                                        			</div>
	                                        			<div class="modal-footer">
	                                        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                        			</div>
	                                        		</div>
	                                        	</div>
	                                        </div>



	                                        <div class="modal fade" id="edit-{{$post->id}}">
                                                {{csrf_token()}}
	                                        	<div class="modal-dialog" style="width: 60%;">
	                                        		<div class="modal-content">
	                                        			<div class="modal-header">
	                                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                                        				<h4 class="modal-title">Update infomation of post</h4>
	                                        			</div>
	                                        			<div class="modal-body">
	                                        				<form action="Posts/{{$post->id}}" method="POST" role="form" id="form_validation">
	                                        				   {{csrf_field()}}
                                                               {{method_field('put')}}
	                                        					<div class="form-group form-float">
	                                        						{{-- <div class="form-line"> --}}
								                                        <input type="hidden" class="form-control" name="id" value="{{$post->id}}" disabled="" required>
								                                        {{-- <label class="form-label">ID</label> --}}
								                                    {{-- </div> --}}
	                                        					</div>

	                                        					<div class="form-group form-float">
	                                        						<div class="form-line">
								                                        <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
								                                        <label class="form-label">Title</label>
								                                    </div>
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label for="">Image</label>
	                                        						<input type="file" name="image">
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label class="form-label">Description</label>
	                                        						<div class="form-line">
								                                        <textarea class="form-control no-resize" name="description">
								                                        	{{$post->description}}
								                                        </textarea>
								                                    </div>
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label>Content</label>
							                                        <textarea class="" id="ckeditor-content-2" name="content">
							                                        	{{$post->content}}
							                                        </textarea>
	                                        					</div>

	                                        					<div class="form-group">
	                                        						<label>Category</label>
	                                        						<select class="form-control" name="category_id">
	                                        							@foreach ($cates as $cate)
	                                        								<option>{{$cate->name}}</option>
	                                        							@endforeach
	                                        						</select>
	                                        					</div>

                                                                <div class="form-group">
                                                                    <label>User</label>
                                                                    <select class="form-control" name="user_id">
                                                                        @foreach ($users as $user)
                                                                            <option>{{$user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

	                                        					<div class="form-group">
	                                        						{{-- <div class="form-line"> --}}
								                                        <input type="hidden" class="form-control" name="slug" value="" >
								                                        {{-- <label class="form-label">Slug</label> --}}
								                                    {{-- </div> --}}
	                                        					</div>
	                                        					
	                                        				
	                                        				
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
    	<div class="modal-dialog" style="width: 60%">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Add new post</h4>
    			</div>
    			<div class="modal-body">
    				<form action="{{ route('Posts.store') }}" method="POST" role="form" id="form_validation">
    				    {{csrf_field()}}
    					<div class="form-group form-float">
    						<div class="form-line">
                                <input type="hidden" class="form-control" name="id">
                                <label class="form-label"></label>
                            </div>
    					</div>

    					<div class="form-group form-float">
                            <label class="form-label">Title</label>
    						<div class="form-line">
                                <input type="text" class="form-control" name="title" placeholder="Title of post..." required>
                            </div>
    					</div>

    					<div class="form-group form-float">
    						<label for="">Image</label>
    						<input type="file" name="image">
    					</div>

    					<div class="form-group form-float">
    						<label class="form-label">Description</label>
    						<div class="form-line">
                                <textarea class="form-control no-resize" name="description" placeholder="Description of post...">
                                	
                                </textarea>
                            </div>
    					</div>

    					<div class="form-group">
    						<label>Content</label>
    						<div class="row clearfix">
    							<div class="card">
		                            <textarea  id="ckeditor-content-3" name="content" placeholder="Content of post...">
		                            </textarea>
    							</div>
    						</div>
    					</div>

    					<div class="form-group">
    						<label>Category</label>
    						<select class="form-control" name="category_id">
    							@foreach ($cates as $cate)
    								<option>{{$cate->name}}</option>
    							@endforeach
    						</select>
    					</div>

    					<div class="form-group">
    						{{-- <label class="form-label">Slug</label> --}}
    						{{-- <div class="form-line"> --}}
                                <input type="hidden" class="form-control" name="slug" required>
                            {{-- </div> --}}
    					</div>
    					<div class="form-group">
    						<label>User</label>
    						<select class="form-control show-tick" name="user_id">
    							@foreach ($users as $user)
    								<option>{{$user->name}}</option>
    							@endforeach
    						</select>
    					</div>
    				
    				
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

@section('foot')
	<script type="text/javascript">
		CKEDITOR.replace('ckeditor-content-3');
	</script>
	<script type="text/javascript">
		CKEDITOR.replace('ckeditor-content-2');
	</script>
	<script type="text/javascript">
		CKEDITOR.replace('ckeditor-content-1');
	</script>
@endsection

