@extends('layouts.blog-post')


@section('content')

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>

                <hr>
                @if(Session::has('comment_message'))
				{{ session('comment_message') }}
				@endif
                <!-- Blog Comments -->
@if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

	
				{!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
					<input type="hidden" name="post_id" value="{{$post->id}}">
					<div class="form-group">
						{!! Form::label('body', 'Body') !!}
						{!! Form::textarea('body', null, ['class'=>'form-control','rows'=>'3']) !!}
					</div>
					<div class="form-goup">
						{!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
					</div>
                    {!! Form::close() !!}
                    



                </div>
@endif
                <hr>

                <!-- Posted Comments -->
@if(Session::has('reply_message'))
    {{ session('reply_message') }}
@endif
@if(count($comments)>0)
@foreach($comments as $comment)



                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                    	<img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>
                        <!-- Nested Comment -->
						
						@if(count($comment->replies)>0)
						@foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <div id="comment_reply" class="media">
                            <a class="pull-left" href="#">
                                <img height="50" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>

                        </div>
                        @endif
						@endforeach
						@endif

                        <div class="comment-reply-container">
                            <button class="btn btn-primary pull-right reply-toggle">Reply</button>
                            <div class="col-sm-6 comment-reply">
                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store']) !!}
                            	<input type="hidden" name="comment_id" value="{{$comment->id}}">
	                            <div class="form-group">
	                            	{!! Form::label('body', 'Body:') !!}
	                            	{!! Form::text('body', null, ['class'=>'form-control']) !!}
	                            </div>
	                            <div class="form-group">
	                            	{!! Form::submit('Submit Reply', ['class'=>'btn btn-primary']) !!}
	                            </div>
                            {!! Form::close() !!}
                            </div>	
                            </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

@endforeach
@endif
			

@stop

@section('scripts')
<script>
    $('.comment-reply-container .reply-toggle').click(function(){
        $(this).next().slideToggle('slow');
    });
</script>
@stop