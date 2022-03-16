@extends('layouts.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript" src="{{asset('js/progress.js')}}"></script>
    <div class="listing-building-info py-5">
        <div class="container">
            <section class="listing-pg-title">
                <h2 class="title">List your boardroom <span>w</span>ith us</h2>
                <p class="sub-title">Start earning extra income <span>w</span>ith your boardroom</p>
            </section>
            <div class=" px-3 mt-1  page-1 building-info">
                <div class="listing-create-edit" style="display:none;">1</div>
                <div class="latest-step" style="display:none;">
                    {{ isset($about->step) ? $about->step : '' }}</div>
                <div class="latest-status" style="display:none;">
                    {{ isset($about->status) ? $about->status : '' }}</div>
                <div class="listing-alert-1 col-md-8" id="1" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-2 0-md-8" id="2" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-3 col-md-8" id="3" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-4 col-md-8" id="4" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-5 col-md-8" id="5" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-6 col-md-8" id="6" style="display:none; height: 30px; border-radius: 5px;"></div>
                <div class="listing-alert-7 col-md-8" id="7" style="display:none; height: 30px; border-radius: 5px;"></div>
            </div>
            <section class="listing-midprt pt-5">
                <div class="row mx-auto">
                    <div class="col-md-9">

                        @include('listing.listing-buildinginfo')
                        @include('listing.listing-about')
                        @include('listing.listing-photos')
                        @include('listing.listing-price-availability')
                        @include('listing.listing-hosting-pref')
                        @include('listing.listing-approve-setting')

                    </div>
                    <div class="col-md-3">
                        <div class="right-listing position-relative">
                            <ul id="progressbar" class="progressbar text-center">
                                <li class="step0 active" id="step-circle-1" onclick="changeListing(1)" ></li>
                                <li class="step0" id="step-circle-2" onclick="changeListing(2)"></li>
                                <li class="step0" id="step-circle-3" onclick="changeListing(3)"></li>
                                <li class="step0" id="step-circle-4" onclick="changeListing(4)"></li>
                                <li class="step0" id="step-circle-5" onclick="changeListing(5)"></li>
                                <li class="step0" id="step-circle-6" onclick="changeListing(6)"></li>
                            </ul>
                            <h6 class="mb-5 side-graph-step">Building Info</h6>
                            <h6 class="mb-5 side-graph-step">About Your Boardroom</h6>
                            <h6 class="mb-5 side-graph-step">Photos</h6>
                            <h6 class="mb-5 side-graph-step">Price &amp; Availability</h6>
                            <h6 class="mb-5 side-graph-step">Hosting Preference</h6>
                            <h6 class="mb-5 side-graph-step">Approval Settings</h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal" id="thank-you-listing">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-11 justify-content-center">
                        <div class="col-12 align-self-center">
                            <h3 class="modal-title" style="text-align-last: center;">Done</h3>
                        </div>
                    </div>
                    <div class="col-1 justify-content-center">
                        <div class="align-self-center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body term-body">
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">

                            <h4 class="d-flex justify-content-center">Thank you for listing your boardroom</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="term-footer">
                        <button type="submit" class="btn btn-secondary mr-4" id="btn-thank-you-okay">OKAY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="request-approve">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body term-body">
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="term-footer">
                        <button type="submit" class="btn btn-secondary mr-4" id="btn-thank-you-okay">OKAY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal listing-cancellation" id="listing-cancellation">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-11 justify-content-center">
                        <div class="col-12 align-self-center">
                            <h3 class="modal-title">Listing Cancellation Policy</h3>
                        </div>
                    </div>
                    <div class="col-1 justify-content-center">
                        <div class="align-self-center">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body listing-cancellation">
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">
                            <iframe src="" allowfullscreen="" frameborder="0" style="width:100%;border:none;height: 483px;">
                            </iframe>
                            <!-- <p>
                                    <iframe src="https://jb.ttldev.net/api/terms_host.php#hosting-cancellations"
                                        allowfullscreen="" frameborder="0" onload="this.style.height=(this.contentDocument.body.scrollHeight+45) +'px';" style="width:100%;border:none;">
                                    </iframe>
                                </p>     -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="term-footer">
                        <button type="submit" class="btn btn-secondary mr-4" id="btn-cancellation-got-it">GOT IT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal" id="error-account-verification">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-11 justify-content-center">
                        <div class="col-12 align-self-center text-center">
                            <h4 class="modal-title">Account Verification</h4>
                        </div>
                    </div>
                    <div class="col-1 justify-content-center">
                        <div class="align-self-center">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body term-body">
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">
                            <h3>
                                Your account still not validated.Please check your email to verify your account.
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="term-footer">
                        <button type="submit" class="btn btn-secondary mr-4" id="btn-error-acct-ver-got-it">GOT IT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal hosting-submit" id="hosting-submit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-11 justify-content-center">
                        <div class="col-12 align-self-center">
                            <h3 class="modal-title" style="text-align-last: center;">Almost done</h3>
                        </div>
                    </div>
                    <div class="col-1 justify-content-center">
                        <div class="align-self-center">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body term-body p-2">
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">
                            <!-- <h4 id="section1"><strong>Hosting submit</strong></h4> -->
                            <iframe src="" allowfullscreen="" frameborder="0" style="width:100%;border:none;height: 483px;">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="term-footer">
                        <button type="submit" class="btn btn-secondary mr-4" id="btn-accept-hosting-submit">AGREE</button>

                        <button type="submit" class="btn btn-secondary btn-decline"
                            id="btn-decline-hosting-submit">DECLINE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="hst-check">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Note About Collecting Tax</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Items to consider as they pertain to your obligation to collect tax or not.
                    </p>
                    <p>(1) The fees are exclusive of taxes;</p>
                    <p>(2) As a Host you are solely responsible for determining your obligations to report, collect, remit,
                        and/or include in your Host listing any taxes; </p>
                    <p>(3) Any failure to collect monies on account of such taxes will not constitute a waiver of the right
                        to do so;</p>
                    <p>(4) Tax regulations may require us to collect appropriate tax information from you, or to withhold
                        taxes from payouts to you, or both; </p>
                    <p>(5) Governmental or regulatory authorities, including where your Host Spaces or Host Services are
                        located, may require taxes to be collected
                        from you or Guests in connection with bookings and associated fees and charges and to be remitted to
                        the respective governmental or regulatory
                        authority, including as a percentage of the fees and charges or any fees and charges charged by you.
                    </p>

                </div>
                <div class="modal-footer term-footer">
                    <button type="submit" class="btn btn-secondary" id="hst-yes">Got it</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="update-tax-id-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="company profile-textbox">
                        <div class="company profilelabel">Tax ID (mandatory if you plan to charge Sales Tax)</div>
                        <input type="text" class="form-control" id="tax_id" placeholder="Tax ID" name="tax_id" value="">
                    </div>
                    <span class="success-resp"></span>
                    <span class="error-resp"></span>
                </div>
                <div class="modal-footer term-footer">
                    <button type="submit" class="btn btn-secondary" id="save-tax-id">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="calendar-sync">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Calendar Reminder</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out
                        qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                        mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim
                        qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson
                        aesthetic.
                        Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>

                </div>
                <div class="modal-footer term-footer">
                    <button type="submit" class="btn btn-primary btn-decline" id="calendar-yes">Got it</button>
                </div>
            </div>
        </div>
    </div>

<script>
    function changeListing(stepNo){
        $('.listingStepp').hide();
        $('#listing-step-'+stepNo).show();

        $('.step0').removeClass('active');
        $('#step-circle-'+stepNo).addClass('active');
    }
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log($('meta[name="csrf-token"]').attr('content'));
            $(".listing-alert-3").html('');
            // $("#photo-error-bag").hide();
            $(function() {
                $("#myDrop").sortable({
                    items: '.dz-preview',
                    cursor: 'move',
                    opacity: 0.5,
                    containment: '#myDrop',
                    distance: 20,
                    tolerance: 'pointer',
                });

                $("#myDrop").disableSelection();
            });

            //Dropzone script
            Dropzone.autoDiscover = false;

            /* Dropzone.options.myDrop = {
                paramName: "files",
                addRemoveLinks: true,
                autoProcessQueue: false,
                maxFiles: 5,
                minImageWidth:300,
                minImageHeight:300,
                url: "{{ route('add-boardroomphotos') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                },

                removedfile: function (file) {
                    if (file.name) {
                        var name = file.name;
                    } else {
                        var name = file.upload.filename;
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ url('api/listing/delete/photos') }}',
                        data: {
                            filename: name,
                            list_id: $("#listing_id").val()
                        },
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },



                init: function () {
                    var submitButton = document.querySelector("#add_file");
                    var drop = this;
                    $.ajax({
                        url: '/api/listing/get/photos',
                        type: 'post',
                        dataType: 'json',
                        data: {
                           photo_list_id: $("#list_id").val()
                        },
                        async: false,
                        success: function (response) {
                            $.each(response, function (key, value) {
                                console.log(value);
                                var mockFile = {
                                    name: value.name,
                                    size: value.size,
                                    id: value.id
                                };
                                drop.options.addedfile.call(drop, mockFile);
                                drop.emit("thumbnail", mockFile, value.path);
                                drop.emit("success", mockFile);
                                drop.emit("complete", mockFile);
                                drop.files.push(mockFile);
                            });
                        }

                    });



                    this.on("addedfile", function() {
                        console.log(this.files);

                    });


                    this.on("thumbnail", function(file) {
                        console.log(file.width);
                        console.log(file.height);
                        $("#photo-error-bag").hide();
                        if (file.width < 300 || file.height < 300) {
                            $('#list-photo-errors').html('');
                            $('#list-photo-errors').append('<li>Please make sure the image width and height should be 300*300</li>');
                            $("#photo-error-bag").show();
                            myDropzone.removeFile(file);

                        }else {
                            file.acceptDimensions();
                        }
                    })

                    submitButton.addEventListener("click", function (e) {
                        $("#photo-error-bag").hide();
                        e.preventDefault();
                        e.stopPropagation();
                        drop.processQueue();

                    });



                },
                accept: function(file, done) {
                    file.rejectDimensions = function() {
                        console.log('reject dimension called');
                        $("#photo-error-bag").hide();
                        $('#list-photo-errors').html('');
                        $('#list-photo-errors').append('<li>Please make sure the image width and height should be 300*300</li>');
                        $("#photo-error-bag").show();
                        done("Please make sure the image width and height should be  minimum 300*300");
                        myDropzone.removeFile(file);
                    };
                    file.acceptDimensions = done;
                 }
            } */

            var myDropzone = new Dropzone("div#myDrop", {
                paramName: "files", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: true,
                autoProcessQueue: false,
                parallelUploads: 50,
                maxFilesize: 5, // MB
                maxFiles: 5,
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                minImageWidth: 300,
                minImageHeight: 300,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('add-boardroomphotos') }}",

            });

            myDropzone.on("sending", function(file, xhr, formData) {
                var filenames = [];

                var files = [];
                $('.dz-preview .dz-filename').each(function() {
                    filenames.push($(this).find('span').text());

                });

                $.each(myDropzone.files, function(key, value) {
                    //var allFiles  = [];
                    // allFiles['id']   = value.id;
                    // allFiles['name'] = value.name;
                    //files.push(allFiles);
                    //files[value.id] = value.name;
                    if (!value.id) {
                        files.push({
                            id: null,
                            name: value.name
                        });
                    } else {
                        files.push({
                            id: value.id,
                            name: value.name
                        });
                    }


                });

                var details = JSON.stringify(files);
                var list_id = $("#listing_id").val();
                formData.append('list_id', list_id);
                formData.append('files', details);
                formData.append('filenames', JSON.stringify(filenames));

            });

            /* Add Files Script*/
            myDropzone.on("success", function(file, message) {
                $(".listing-alert-3").html('');
                current_fs = $("#add_file").parent().parent().parent();
                next_fs = current_fs.next();
                $(".prev").css({
                    'display': 'block'
                });
                //$(current_fs).removeClass("show");
                //$(next_fs).addClass("show");
                $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");
                /*current_fs.animate({}, {
                    step: function () {
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'display': 'block'
                        });
                    }
                });*/

                /* test */

                $('.listing-alert-3').append('<li> Photos: Save Sucessfully </li>').show().delay(2000).hide(
                    500);
                $('.listing-alert-3').addClass('alert-success').removeClass('alert-danger');
                current_fs = $("#add_file").parent().parent().parent();
                next_fs = current_fs.next();
                $(".prev").css({
                    'display': 'block'
                });
                $('.card2').removeClass("show");
                $('.price-availability').addClass("show");
                var active = jQuery('.building-info #progressbar .active').length;
                if (active > 3) {
                    addPriceInfo(); //4
                }
                $("#progressbar li").eq($(".card2").index(next_fs)).addClass(
                    "active");

             //   timoutsubmit();
                /* Tip Box Pop Up */
                var indexbar = $('div .card2.show').index();
                indexbar = indexbar + 1;
                $('.building-info .content-form .tip-box .tips-content').hide();
                $(".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")").show();
                $(".building-info .content-form .tip-container").show();
            });

            myDropzone.on("error", function(file, message) {
                $(".listing-alert-3").html('');
                $('.listing-alert-3').append('<li>' + message + '</li>');
                $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
                myDropzone.removeFile(file);
            });

            myDropzone.on("maxfilesexceeded", function(file) {
                var message = 'Maximum files exceeded'
                $(".listing-alert-3").html('');
                $(".listing-alert-3").append('<li>' + message + '</li>');
                $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
            });

            myDropzone.on("error", function(file, message) {
                $(".listing-alert-3").html('');
                $(".listing-alert-3").append('<li>' + message + '</li>');
                $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');

                this.removeFile(file);
            });

            myDropzone.on("addedfile", function() {
                if (this.files[5] != null) {
                    var message = 'Maximum 5 files allowed'
                    $(".listing-alert-3").html('');
                    $(".listing-alert-3").append('<li>' + message + '</li>');
                    $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
                    this.removeFile(this.files[5]);
                }
            });


            $("#add_file").on("click", function() {
                addfilefunction();
            });

            function addfilefunction() {
                $(".listing-alert-3").html('');
                myDropzone.processQueue();
                if (myDropzone.getUploadingFiles().length == 0) {
                    var filenames = [];

                    var files = [];
                    $('.dz-preview .dz-filename').each(function() {
                        filenames.push($(this).find('span').text());

                    });

                    $.each(myDropzone.files, function(key, value) {

                        if (!value.id) {
                            files.push({
                                id: null,
                                name: value.name
                            });
                        } else {
                            files.push({
                                id: value.id,
                                name: value.name
                            });
                        }


                    });

                    var details = JSON.stringify(files);
                    var f = JSON.stringify(filenames);
                    $.ajax({
                        url: '{{ route('add-boardroomphotos') }}',
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            filenames: f,
                            files: details
                        },
                        async: false,
                        success: function(response) {
                            $('.listing-alert-3').append('<li> Photos: Save Sucessfully </li>').show()
                                .delay(2000).hide(500);
                            $('.listing-alert-3').addClass('alert-success').removeClass('alert-danger');
                            current_fs = $("#add_file").parent().parent().parent();
                            next_fs = current_fs.next();
                            $(".prev").css({
                                'display': 'block'
                            });
                            //$(current_fs).removeClass("show");
                            //$(next_fs).addClass("show");
                            $('.card2').removeClass("show");
                            $('.price-availability').addClass("show");
                            var active = jQuery('.building-info #progressbar .active').length;
                            if (active > 3) {
                                addPriceInfo(); //4
                            }
                            $("#progressbar li").eq($(".card2").index(next_fs)).addClass(
                                "active");
                            /*current_fs.animate({}, {
                                step: function () {
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({
                                        'display': 'block'
                                    });
                                }
                            });*/
                            //timoutsubmit();
                            /* Tip Box Pop Up */
                            var indexbar = $('div .card2.show').index();
                            indexbar = indexbar + 1;
                            $('.building-info .content-form .tip-box .tips-content').hide();
                            $(".building-info .content-form .tip-box .tips-content:nth-child(" +
                                indexbar + ")").show();
                            $(".building-info .content-form .tip-container").show();
                            /* / */

                        },
                        error: function(response) {
                            //console.log(response.responseText);
                            var errors = $.parseJSON(response.responseText);
                            // $('#list-photo-errors').html('');
                            // $('#list-photo-errors').append('<li>' + errors.error + '</li>');
                            // $("#photo-error-bag").show();

                            $(".listing-alert-3").html('');
                            $(".listing-alert-3").append('<li>' + errors.error + '</li>');
                            $(".listing-alert-3").show().addClass('alert-danger').removeClass(
                                'alert-success');

                        }


                    });
                }
            }




        });
    </script>
@endsection
