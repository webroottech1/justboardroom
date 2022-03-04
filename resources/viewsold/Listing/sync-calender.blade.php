<div class="card2 ml-2 sync-calender">
    <div class="row px-3 mt-3">
            <div class="mt-3 mb-4 question-wrapper">
                <div class="txt-switch-wrapper">
                    <div class="qus-text">Would you like to sync your boardroom calender with just Boardroom ?</div>
                    <span class="switch-wrapper">
                        <div class="switch switch-yellow">
                            <input type="radio" class="switch-input" name="synccalendar" value="synccalendaryes"
                                id="synccalendaryes" >
                            <label for="synccalendaryes" class="switch-label switch-label-off">YES</label>
                            <input type="radio" class="switch-input" name="synccalendar" value="synccalendarno"
                                id="synccalendarno" >
                            <label for="synccalendarno" class="switch-label switch-label-on">NO</label>
                            <span class="switch-selection"></span>
                        </div>
                    </span>
                </div>
            </div>




            <div class="form-group"> 
            <button onclick="event.preventDefault();syncCalender();"
                    type="submit" class="btn btn-primary"
                    id="btn-bd-calendar">Save</button>
              
            </div>
      
    </div>
</div>
