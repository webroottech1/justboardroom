
@extends('layouts.master')
@section('content')
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

<div class="container mt-110 mh-690" style="width:90%; max-width:90%">

  <form method="POST" action="{{ URL('api/listing/'.$listId.'/sendEmail' )}}">
	<div class="row">
		<div class="form-group" >
            <label for="email-template" class="template">Please Select Template</label>
            <select class="form-control select-bb-gray" id="host-email-template">
                <option value="">Select</option>
                @foreach ($template as $k=>$val)
                <option value={{ $k }}>{{ $val }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">

            <input type="text" class="input-bb-orange form-control" id="email-subject" placeholder="Subject" name="subject">
        </div>
        <div class="form-group col-12 p-0">
            <label for="email-body" class="template">Body</label>
            <textarea class="textarea-b-gray form-control rounded-0" id="email-body" rows="6" name="email-body"> </textarea>
        </div>
 		<div class="col-md-6">
			<button class="btn btn-jb btn-md">Send</button>
		</div>
	</div>
</form>
</div>
 @endsection


