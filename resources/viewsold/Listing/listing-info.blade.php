@extends('layouts.master')

@section('content')
<div class="container listaddress">
    <h2>List your boardroom</h2>
    <p>start earning right away by listing your boardroom with us!</p>
    <form id="frmlistinginfo">
       <div class="form-group">
            <label for="bd-name">Give your boardroom a name</label>
            <input type="text" class="form-control" id="bd-name" placeholder="Enter Name" name="bdname">
        </div>
        <div class="form-group">
            <label for="bd-capacity">What is the Capacity:</label>
            <select class="form-control" id="bd-capacity">
                @foreach ($capacity as $k=>$val)
                    <option value="{{ $k }}">{{ $val}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bd-desc">Tell us about your boardroom</label>
            <textarea class="form-control rounded-0" id="bd-desc" rows="3" name=bd-desc></textarea>
        </div>

        <div class="form-group">
            <label for="bd-amenities">What amenities do you offer</label>
        </div>

     <!-- Default inline 1-->
        <div class="building-ch">
            <div class="form-group">
                <p>Building</p>
            @foreach ($amenities_building as $k=>$val)
                <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="building-check" id="bd-{{$k}}" value={{$k}}>
                    <label class="custom-control-label" for="bd-{{$k}}">{{$val}}</label>
                </div>
            @endforeach
            </div>
        </div>
        <div class="boardroom-ch">
            <div class="form-group">
                <p>Boardroom</p>
                @foreach ($amenities_boardroom as $k=>$val)
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="boardroom-check" id="board-{{$k}}" value={{$k}}>
                        <label class="custom-control-label" for="board-{{$k}}">{{$val}}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tech-ch">
            <div class="form-group">
                <p>Technology</p>
                @foreach ($amenities_tech as $k=>$val)
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="tech-check" id="tech-{{$k}}" value={{$k}}>
                        <label class="custom-control-label" for="tech-{{$k}}">{{$val}}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="multi-field-wrapper">
            <div class="multi-fields">
                <div class="multi-field">
                    <input type="text" name="stuff[]">
                    <button type="button" class="remove-field">Remove</button>
                </div>
            </div>
            <button type="button" class="add-field">Add field</button>
        </div>

        <button onclick="event.preventDefault();addBoardroomInfo();" type="submit" class="btn btn-primary" id="btn-bd-info">Save</button>
    </form>
</div>

@endsection
