<div class="card2 first-screen show ml-2">
        <form id="frmlistingaddress" autocomplete="none">
            <p class="step-title"> Building Info</p>
            <div class="alert alert-danger" id="address-error-bag">
                <ul id="list-address-errors">
                </ul>
            </div>
            <div class="row px-3 mt-4">
                <div class="form-group mt-1 mb-1"> 
                <label for="list-address" class="requiredstar">What is the address of your building? Make sure the pin in the map below is in the correct location.</label> 
                @php    
                    if(isset($address->formatted_address)){
                        $btnClass = 'listaddress-btn-active';
                        $btndisabled = '';
                    }
                    else{
                        $btnClass = 'listaddress-btn-notactive';
                        $btndisabled = 'disabled';
                    }
                @endphp
                <input type="text" class="input-bb-orange form-control" id="list-address"
                        value="{{isset($address->formatted_address)?$address->formatted_address:''}}"
                        placeholder="Enter Address" name="listA" onFocus="geolocate()" list="autocompleteOff">
                </div>

                <div class="form-group mt-1 mb-1 addressmap">
                    <div id="map"></div> 
                    <script defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
                    </script>
                </div>

                
                <input id="postalcode" name="postal_code" type="hidden" value="{{isset($address->postal_code)?$address->postal_code:''}}">
                <input id="country" name="country" type="hidden" value="{{isset($address->city)?$address->city:''}}">
                <input id="province" name="province" type="hidden" value="{{isset($address->province)?$address->province:''}}">
      
                <input id="lat" name="lat" type="hidden" value="{{isset($address->lat)?$address->lat:''}}">
                <input id="lng" name="lng" type="hidden" value="{{isset($address->lng)?$address->lng:''}}">
                <input id="list_id" name="=list_id" type="hidden"
                    value="{{isset($list_id)?$list_id:0}}">
                <div class="form-group mt-1 mb-1">
                    <label for="building-name">Enter your building name</label>
                    <p>(If applicable)</p>
                    <input type="text" class="input-bb-gray form-control" id="building-name" placeholder="Enter name" name="buildingName"
                        value="{{isset($address->building_name)?$address->building_name:''}}"  maxLength="100">
                </div>
                <div class="form-group btn-submit">
                    <div class="mb-2 mt-2">
                        <p class="mb-0 jb-text-color required-field">*Required Field</p>
                    </div>
                    <div> <button type="submit" class="btn btn-secondary  {{$btnClass}}" id="btn-address"  {{$btndisabled}}>Save</button> </div>
                </div>
            </div>
        </form>
        <!--<div class="row px-3 mt-4">
            <div class="form-group mt-1 mb-1"> <input type="text" id="email" class="form-control" required> <label class="ml-3 form-control-placeholder" for="email">Email</label> </div>
            <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div 
        </div>-->
    
    </div>
    