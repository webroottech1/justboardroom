<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places"></script>

@extends('layouts.master')
@section('content')
<div class="container-fluid px-1 px-md-4 py-5 mx-auto  page-content">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 col-xl-9">
            <div class="card card0 border-0">
                <div class="row">
                    <div class="col-12 page-content-wrapper">
                        <div class="card card00 m-2 border-0 page-title-top">
                            <div class="row text-center px-3 page-title">
                                {{-- <p class="prev text-danger"><span class="fa fa-long-arrow-left"> Go Back</span></p
                                    id="back"> --}}
                                <div class="px-3 title row col-12">
                                    <h3 class="mt-4">List your boardroom with us</h3>
                                </div>
                                <div class="sub-title row col-12">
                                <p>Start earning extra income with your boardroom</p>
                                </div>

                            </div>
                            <div class=" px-3 mt-1  page-1 building-info">
                            <div class="listing-create-edit" style="display:none;">1</div>
                            <div class="latest-step" style="display:none;">{{isset($about->step)?$about->step:""}}</div>
                            <div class="latest-status" style="display:none;">{{isset($about->status)?$about->status:""}}</div>
                            <div class="listing-alert-1 col-md-8" id="1" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-2 0-md-8" id="2" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-3 col-md-8" id="3" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-4 col-md-8" id="4" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-5 col-md-8" id="5" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-6 col-md-8" id="6" style="display:none; height: 30px; border-radius: 5px;"></div>
                            <div class="listing-alert-7 col-md-8" id="7" style="display:none; height: 30px; border-radius: 5px;"></div>
                            </div>
                            <div class="d-flex flex-md-row mt-4 flex-column-reverse building-info">

                                <div class="col-md-8 content-form p-0">
                                    <div class="p-3 bg-white mb-3 br-5 tip-container">

                                        @include('Listing.tips')
                                    </div>
                                    <div class="p-3 bg-white br-5">
                                    @include('Listing.address')
                                    @include('Listing.about')
                                    @include('Listing.photo')
                                    @include('Listing.price')
                                    @include('Listing.hosting')
                                    @include('Listing.request')
                                    </div>

                                </div>

                              @include('Listing.progress')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row px-3">
                                <h2 class="text-muted get-bonus mt-4 mb-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- <div class="modal"  id="hosting-terms">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div>
                    <h3 class="modal-title">Almost done</h3>
                </div>
            </div>
            <div class="modal-body term-body">
                <div class="card example-1 border-0 scrollbar-ripe-malinka">
                    <div class="card-body p-0">
                      <p>
                        <iframe id="agreement" src="https://jb.ttldev.net/api/terms_host.php"
                        height="315" width="485" allowfullscreen="" frameborder="0">
                        </iframe>
                    </p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <div class="term-footer">
                    <button type="submit" class="btn btn-secondary mr-4" id="btn-accept-hosting-submit">AGREE</button>
                    <button type="submit" class="btn btn-secondary btn-decline" id="btn-decline-hosting-submit">DECLINE</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal"  id="thank-you-listing">
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
                        <button type="button" class="close" data-dismiss="modal">??</button>
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

<div class="modal"  id="request-approve">
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

<div class="modal listing-cancellation"  id="listing-cancellation">
    <div class="modal-dialog modal-lg" >
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
                        <iframe src=""
                            allowfullscreen="" frameborder="0" style="width:100%;border:none;height: 483px;">
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



<div class="modal"  id="error-account-verification">
    <div class="modal-dialog " >
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

<div class="modal hosting-submit"  id="hosting-submit">
    <div class="modal-dialog modal-lg" >
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
                        <iframe src=""
                            allowfullscreen="" frameborder="0" style="width:100%;border:none;height: 483px;">
                        </iframe>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <div class="term-footer">
                    <button type="submit" class="btn btn-secondary mr-4" id="btn-accept-hosting-submit">AGREE</button>

                    <button type="submit" class="btn btn-secondary btn-decline" id="btn-decline-hosting-submit">DECLINE</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal"  id="hst-check">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Note About Collecting Tax</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Items to consider as they pertain to your obligation to collect tax or not.</p>
                <p>(1) The fees are exclusive of taxes;</p>
                <p>(2) As a Host you are solely responsible for determining your obligations to report, collect, remit, and/or include in your Host listing any taxes; </p>
                <p>(3) Any failure to collect monies on account of such taxes will not constitute a waiver of the right to do so;</p>
                <p>(4) Tax regulations may require us to collect appropriate tax information from you, or to withhold taxes from payouts to you, or both; </p>
                <p>(5) Governmental or regulatory authorities, including where your Host Spaces or Host Services are located, may require taxes to be collected
                from you or Guests in connection with bookings and associated fees and charges and to be remitted to the respective governmental or regulatory
                authority, including as a percentage of the fees and charges or any fees and charges charged by you.</p>

            </div>
            <div class="modal-footer term-footer">
                <button type="submit" class="btn btn-secondary" id="hst-yes">Got it</button>
            </div>
        </div>
    </div>
</div>

<div class="modal"  id="update-tax-id-modal">
    <div class="modal-dialog" >
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

<div class="modal"  id="calendar-sync">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Calendar Reminder</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out
                 qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                 mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim
                 qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic.
                 Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>

            </div>
            <div class="modal-footer term-footer">
                <button type="submit" class="btn btn-primary btn-decline" id="calendar-yes">Got it</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $(".listing-alert-3").html('');
       // $("#photo-error-bag").hide();
        $(function () {
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

        Dropzone.options.myDrop = {
            paramName: "files",
            addRemoveLinks: true,
            autoProcessQueue: false,
            maxFiles: 5,
            minImageWidth:300,
            minImageHeight:300,
            url: "{{ url('/api/listing/add/photos')}}",
            removedfile: function (file) {
                if (file.name) {
                    var name = file.name;
                } else {
                    var name = file.upload.filename;
                }

                $.ajax({
                    type: 'POST',
                    url: '{{ url("api/listing/delete/photos") }}',
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
        }

        var myDropzone = new Dropzone("div#myDrop", {
            paramName: "files", // The name that will be used to transfer the file
            addRemoveLinks: true,
            uploadMultiple: true,
            autoProcessQueue: false,
            parallelUploads: 50,
            maxFilesize: 5, // MB
            maxFiles: 5,
            acceptedFiles: ".png, .jpeg, .jpg, .gif",
            minImageWidth:300,
            minImageHeight:300,
            url: "/api/listing/add/photos",

        });

        myDropzone.on("sending", function (file, xhr, formData) {
            var filenames = [];

            var files = [];
            $('.dz-preview .dz-filename').each(function () {
                filenames.push($(this).find('span').text());

            });

            $.each(myDropzone.files, function (key, value) {
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
        myDropzone.on("success", function (file, message) {
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

            $('.listing-alert-3').append('<li> Photos: Save Sucessfully </li>').show().delay(2000).hide(500);
                        $('.listing-alert-3').addClass('alert-success').removeClass('alert-danger');
                        current_fs = $("#add_file").parent().parent().parent();
                        next_fs = current_fs.next();
                        $(".prev").css({
                            'display': 'block'
                        });
            $('.card2').removeClass("show");
                        $('.price-availability').addClass("show");
                        var active = jQuery('.building-info #progressbar .active').length ;
                        if(active > 3){
                            addPriceInfo(); //4
                        }
                        $("#progressbar li").eq($(".card2").index(next_fs)).addClass(
                            "active");

            timoutsubmit();
            /* Tip Box Pop Up */
            var indexbar = $('div .card2.show').index() ;
            indexbar = indexbar + 1;
            $('.building-info .content-form .tip-box .tips-content').hide();
            $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
            $( ".building-info .content-form .tip-container" ).show();
        });

        myDropzone.on("error", function (file,message) {
            $(".listing-alert-3").html('');
            $('.listing-alert-3').append('<li>' + message + '</li>');
            $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
            myDropzone.removeFile(file);
        });

        myDropzone.on("maxfilesexceeded", function (file) {
            var message = 'Maximum files exceeded'
            $(".listing-alert-3").html('');
            $(".listing-alert-3").append('<li>' + message + '</li>');
            $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
        });

        myDropzone.on("error", function (file, message) {
            $(".listing-alert-3").html('');
            $(".listing-alert-3").append('<li>' + message + '</li>');
            $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');

            this.removeFile(file);
        });

        myDropzone.on("addedfile", function() {
        if (this.files[5]!=null){
            var message = 'Maximum 5 files allowed'
            $(".listing-alert-3").html('');
            $(".listing-alert-3").append('<li>' + message + '</li>');
            $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');
            this.removeFile(this.files[5]);
        }
        });


        $("#add_file").on("click", function () {
            addfilefunction();
        });

        function addfilefunction(){
            $(".listing-alert-3").html('');
            myDropzone.processQueue();
            if (myDropzone.getUploadingFiles().length == 0) {
                var filenames = [];

                var files = [];
                $('.dz-preview .dz-filename').each(function () {
                    filenames.push($(this).find('span').text());

                });

                $.each(myDropzone.files, function (key, value) {

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
                    url: '/api/listing/add/photos',
                    type: 'post',
                    data: {
                        filenames: f,
                        files: details
                    },
                    async: false,
                    success: function (response) {
                        $('.listing-alert-3').append('<li> Photos: Save Sucessfully </li>').show().delay(2000).hide(500);
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
                        var active = jQuery('.building-info #progressbar .active').length ;
                        if(active > 3){
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
                        timoutsubmit();
                        /* Tip Box Pop Up */
                        var indexbar = $('div .card2.show').index() ;
                        indexbar = indexbar + 1;
                        $('.building-info .content-form .tip-box .tips-content').hide();
                        $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
                        $( ".building-info .content-form .tip-container" ).show();
                        /* / */

                    },
                    error: function (response) {
                        //console.log(response.responseText);
                     var errors = $.parseJSON(response.responseText);
                    // $('#list-photo-errors').html('');
                    // $('#list-photo-errors').append('<li>' + errors.error + '</li>');
                    // $("#photo-error-bag").show();

                    $(".listing-alert-3").html('');
                    $(".listing-alert-3").append('<li>' + errors.error + '</li>');
                    $(".listing-alert-3").show().addClass('alert-danger').removeClass('alert-success');

                }


                });
            }
        }




    });

</script>
@endsection
