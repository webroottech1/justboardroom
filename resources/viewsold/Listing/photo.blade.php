<div class="card2 ml-2 photoslisting">
    <div class="alert alert-danger mt-3" id="photo-error-bag">
        <ul id="list-photo-errors">
        </ul>
    </div>
    <div class="row px-3">
        <div class="col-12"><p class="step-title">PHOTOS</p></div>
        <div class="col-12"><p class="mb-0 mt-4 requiredstar photos-desc">What does your boardroom look like? Share up to 5 photos</p></div>
        <div class="col-12"><p class="mb-2 photos-sub-desc">Be sure to include photos from different angles to show all sides of the room. 
            Each photo must be at least 300 pixels wide or tall, in jpg or png format.</p>
        </div>
        <div class="col-12"><p class="mb-2 photos-sub-desc">To add additional pictures, please select the box below.</p>
        </div>
        <div class="col-12">
            <div class="mb-4 dropzone dz-clickable" id="myDrop">
                <div class="dz-default dz-message" data-dz-message="">
                    <span class="photos-drag-desc">Drag images here, or <br></span><button class="photos-select-image">SELECT IMAGE</button>
                </div>
            </div>
            <div>
                <p class="mb-0 jb-text-color required-field">*Required Field</p>
            </div>
            <input type="button" id="add_file" value="Save"
            class="btn btn-primary mt-3">
            <div class="mb-4">
                <input id="listing_id" name="listing_id" type="hidden"
                value="{{isset($address->listing_id)?$address->listing_id:0}}">
            </div>
            
        </div>

    </div>
</div>