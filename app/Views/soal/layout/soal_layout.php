<?= $this->extend('soal/layout/page_layout') ?>

<?= $this->section('content') ?>
    <div class="d-none d-lg-block">
        <form action="<?= base_url()?>/addJawabanIelts" method="post" id="formIelts">
            <div class="page page-center" id="login">
                <div class="container py-7">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
                            <div class="card">
                                <div class="card-body" style="color: black">
                                    <div class="text-center mt-4 mb-4">
                                        <?= $pertemuan['tipe_latihan']?>
                                    </div>
                                    <div class="form-footer">
                                        <button type="button" class="btn bg-gradient-info w-100 btnTransisiSatu">Mulai</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

            <div id="worksheet">
                <div class="page page-center" id="transisi-sesi-1" style="display: none">
                    <div class="container py-7">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <a href="javascript:void()"><img src="<?= $logo?>" alt="" class="img-fluid" style="max-height: 60px"></a>
                                        </div>
                                        <center>
                                            <p><b><span class="urutanSession">First</span> Session : LISTENING</b></p>
                                            <p><i>Time : 40 Minutes</i></p>
                                        </center>
                                        <div class="form-footer">
                                            <button type="button" class="btn bg-gradient-info w-100 btnListening" >Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="page page-center" id="transisi-sesi-2" style="display: none">
                    <div class="container py-7">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <a href="javascript:void()"><img src="<?= $logo?>" alt="" class="img-fluid" style="max-height: 60px"></a>
                                        </div>
                                        <center>
                                            <p><b><span class="urutanSession">Second</span> Session : READING</b></p>
                                            <p><i>Time : 60 Minutes</i></p>
                                        </center>
                                        <div class="form-footer">
                                            <button type="button" class="btn bg-gradient-info w-100 btnReading">Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="page page-center" id="transisi-sesi-3" style="display: none">
                    <div class="container py-7">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <a href="javascript:void()"><img src="<?= $logo?>" alt="" class="img-fluid" style="max-height: 60px"></a>
                                        </div>
                                        <center>
                                            <p><b><span class="urutanSession">Third</span> Session : WRITING</b></p>
                                            <p><i>Time : 60 Minutes</i></p>
                                        </center>
                                        <div class="form-footer">
                                            <button type="button" class="btn bg-gradient-info w-100 btnWriting">Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div id="soal_tes" style="display: none; color: black;">
                    <div class="wrapper" id="elementtoScrollToID">
                        <div class="page-wrapper" id="">
                            <div class="page-body">
                                <!-- <div class="container-xl"> -->
                                    
                                    <input type="hidden" name="id_kelas_member" value="<?= $id_kelas_member?>">
                                    <input type="hidden" name="id_pertemuan" value="<?= $id_pertemuan?>">
        
                                    <div class="sesi-listening" style="display: none">
                                        
                                        <?= $this->renderSection('sesi-listening') ?>
        
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:void(0)" class="btn btn-success btnTransisiDua" id="btnTransisiDua">Next</a>
                                        </div>
                                    </div>
        
                                    <div class="sesi-reading" style="display: none">
                                        
                                        <?= $this->renderSection('sesi-reading') ?>
        
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:void(0)" class="btn btn-success btnTransisiTiga" id="btnTransisiTiga">Next</a>
                                        </div>
                                    </div>
        
                                    <div class="sesi-writing" style="display: none">
                                        <?= $this->renderSection('sesi-writing') ?>
        
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:void(0)" class="btn bg-gradient-info btnSimpan">Save</a>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="d-block d-lg-none">
        <div class="container py-7">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4 mb-4">
                                <a href="javascript:void()"><img src="<?= $logo?>" alt="" class="img-fluid" style="max-height: 60px"></a>
                            </div>
                            <div class="mb-2 mt-3">
                                <b>Your device screen is too small to take the test. Please replace your device first</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur bg-danger" id="alertModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alert</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <p>Leaving the worksheet is not allowed. You'll lose your progress and your test result will be unvalid</p>
                    <p>You will lose your progress in <span id="count">10</span> seconds</p>
                </div>
                <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3 btn-primary" data-bs-dismiss="modal">Stay on the Worksheet</button>
                </div>
            </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
    let start = false;

    let listening = 0;
    let reading = 0;
    let writing = 0;

    $(document).mouseleave(function () {
        showAlertWithCountdown(10)
    });

    $(document).mouseenter(function () {
        returnWorkSheet()
    });

    $(".btnSignIn").click(function(){
        Swal.fire({
            icon: 'success',
            title: '',
            text: 'Success!',
            showConfirmButton: false,
            timer: 1500
        })
        $("#formLogin").hide();
        $("#formData").show();

        listening = <?= $listening?>;
        reading = <?= $reading?>;
        writing = <?= $writing?>;

        if (listening != 1 || reading != 1 || writing != 1) {
            $(".urutanSession").hide();
        }

        if(listening == 1 && reading == 0 && writing == 0){
            $('#btnTransisiDua').removeClass('btnTransisiDua');
            $('#btnTransisiDua').removeClass('btn-success');
            $('#btnTransisiDua').addClass('btnSimpan');
            $('#btnTransisiDua').addClass('bg-gradient-info');
            $('#btnTransisiDua').html('Save');
        } else if((listening == 1 || listening == 0) && reading == 1 && writing == 0){
            $('#btnTransisiTiga').removeClass('btnTransisiTiga');
            $('#btnTransisiTiga').removeClass('btn-success');
            $('#btnTransisiTiga').addClass('btnSimpan');
            $('#btnTransisiTiga').addClass('bg-gradient-info');
            $('#btnTransisiTiga').html('Save');
        } else if(listening == 1 && reading == 0 && writing == 1){
            $('#btnTransisiDua').removeClass('btnTransisiDua');
            $('#btnTransisiDua').removeClass('btn-success');
            $('#btnTransisiDua').addClass('btnTransisiTiga');
            $('#btnTransisiDua').addClass('btn-success');
            $('#btnTransisiDua').html('Next');
        }
    })

    $("#textarea-1").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        $('#count-textarea-1').text(words);
    });

    $("#textarea-2").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        $('#count-textarea-2').text(words);
    });

    // autosize 
    $('.form-autosize').on('input', function () {
        this.style.width = '50px';
        this.style.width = (this.scrollWidth + 5) + 'px';
    });

    $(document).on("click", ".btnTransisiSatu", function(){
        listening = <?= $listening?>;
        reading = <?= $reading?>;
        writing = <?= $writing?>;

        if (listening != 1 || reading != 1 || writing != 1) {
            $(".urutanSession").hide();
        }

        if(listening == 1 && reading == 0 && writing == 0){
            $('#btnTransisiDua').removeClass('btnTransisiDua');
            $('#btnTransisiDua').removeClass('btn-success');
            $('#btnTransisiDua').addClass('btnSimpan');
            $('#btnTransisiDua').addClass('bg-gradient-info');
            $('#btnTransisiDua').html('Save');
        } else if((listening == 1 || listening == 0) && reading == 1 && writing == 0){
            $('#btnTransisiTiga').removeClass('btnTransisiTiga');
            $('#btnTransisiTiga').removeClass('btn-success');
            $('#btnTransisiTiga').addClass('btnSimpan');
            $('#btnTransisiTiga').addClass('bg-gradient-info');
            $('#btnTransisiTiga').html('Save');
        } else if(listening == 1 && reading == 0 && writing == 1){
            $('#btnTransisiDua').removeClass('btnTransisiDua');
            $('#btnTransisiDua').removeClass('btn-success');
            $('#btnTransisiDua').addClass('btnTransisiTiga');
            $('#btnTransisiDua').addClass('btn-success');
            $('#btnTransisiDua').html('Next');
        }


        $("#login").hide();
        // $("#transisi-sesi-1").show();
        if(listening == 0 && reading == 1){
            $("#transisi-sesi-2").show();
        } else if(listening == 0 && reading == 0 && writing == 1){
            $("#transisi-sesi-3").show();
        } else {
            $("#transisi-sesi-1").show();
        }
        start = true;

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#elementtoScrollToID").offset().top
            }, 1000);
        }

    })

    $(document).on("click", ".btnTransisiDua", function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);
                $("#navbarTes").hide();
                $("#soal_tes").hide();
                $("#transisi-sesi-2").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                var audios = document.getElementsByTagName('audio');  
                for(var i = 0, len = audios.length; i < len;i++){  
                    if(audios[i]){  
                        audios[i].pause();  
                    }  
                }
            }
        })
    })

    $(document).on("click", ".btnTransisiTiga", function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);
                $("#navbarTes").hide();
                $("#soal_tes").hide();
                $("#transisi-sesi-3").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
            }
        })
    })

    $(".btnListening").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then(function (result) {
            if (result.value) {
                $("#navbarTes").show();
                $("#transisi-sesi-1").hide();
                $("#soal_tes").show();
                $(".sesi-listening").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                // clearInterval(countDown);
                
                sec = 40 * 60;
                // sec = 30;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-listening");
                }, 1000);
            }
        })
    })

    $(".btnReading").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#navbarTes").show();
                $("#transisi-sesi-2").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                // clearInterval(countDown);
                if(listening == 1){
                    clearInterval(countDown);
                }

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-reading");
                }, 1000);
            }
        })
    })

    $(".btnWriting").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#navbarTes").show();
                $("#transisi-sesi-3").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").hide();
                $(".sesi-writing").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                // clearInterval(countDown);
                if(reading == 1){
                    clearInterval(countDown);
                }

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-writing");
                }, 1000);
            }
        })
    })

    $(document).on("click", ".btnSimpan", function(){
        Swal.fire({
            icon: 'question',
            html: 'Finish the test?',
            showCloseButton: true,
            showCancelButton: true,
            target: '#worksheet',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $("#formIelts").submit()
            }
        })
    })

    $('input:radio').click(function () {
        let id = $(this).data("id");
        let value = $(this).val();

        $(`[name="`+id+`"]`).val(value);
    });

    function secpass(id) {
        'use strict';
        var min = Math.floor(sec / 60),
        remSec  = sec % 60;
        if (remSec < 10) {
            remSec = '0' + remSec;
        }
        if (min < 10) {
            min = '0' + min;
        }

        countDiv.innerHTML = min + ":" + remSec;
        if (sec > 0) {
            sec = sec - 1;
        } else {
            if(id == 'sesi-listening'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                    target: '#worksheet'
                }).then(function (result) {
                    
                    $("#navbarTes").hide();
                    $("#soal_tes").hide();
                    $("#transisi-sesi-2").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-reading'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                    target: '#worksheet'
                }).then(function (result) {
                    
                    $("#navbarTes").hide();
                    $("#soal_tes").hide();
                    $("#transisi-sesi-3").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-writing'){
                clearInterval(countDown);

                // scroll to top 
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                swal.fire({
                    title: 'Time out',
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    target: '#worksheet',
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $(".btnBack").prop("disabled", true);
                $("#formIelts").submit()
            }
        }
    }

    for (let i = 1; i < 54; i++) {
        // var words = $( ".reading-"+i).first().text().split( /\s+/ );
        var words = $( ".reading-"+i).first().text().split(" ");
        var text = words.join( "</span> <span>" );

        text = text.replace("()", "<i>");
        text = text.replace("(*)", "</i>");

        text = text.replace("((b))", "<b>");
        text = text.replace("((/b))", "</b>");
        
        text = text.replace("((u))", "<u>");
        text = text.replace("((/u))", "</u>");

        text = text.replace("((p))", "<p>");
        text = text.replace("((/p))", "</p>");

        text = text.replace("((br))", "</br>");
        text = text.replace("((hr))", "</hr>");

        for (let z = 0; z < 50; z++) {
            text = text.replace("((i"+z+"))", "<i>");
            text = text.replace("((/i"+z+"))", "</i>");
    
            text = text.replace("((b"+z+"))", "<b>");
            text = text.replace("((/b"+z+"))", "</b>");
            
            text = text.replace("((u"+z+"))", "<u>");
            text = text.replace("((/u"+z+"))", "</u>");
    
            text = text.replace("((p"+z+"))", "<p>");
            text = text.replace("((/p"+z+"))", "</p>");

            
            text = text.replace("((sup"+z+"))", "<sup>");
            text = text.replace("((/sup"+z+"))", "</sup>");
    
            text = text.replace("((br"+z+"))", "</br>");
            text = text.replace("((hr"+z+"))", "</hr>");
        }

        $( ".reading-"+i ).first().html( "<span>" + text + "</span>" );
    }

    $( "span" ).on( "click", function() {
        $( this ).toggleClass( "highlight" );
        return false;
    });

    // audio
        $('.audio').on('timeupdate', function() {
            let id = $(this).data("id");
            $('#seekbar-'+id).attr("value", this.currentTime / this.duration);
        });

        $(".btnAudio").click(function(){
            id = $(this).data("id");
            $("#audio-"+id)[0].play();
            $(this).hide();
        })

        document.addEventListener('play', function(e){  
            var audios = document.getElementsByTagName('audio');  
            for(var i = 0, len = audios.length; i < len;i++){  
                if(audios[i] != e.target){  
                    audios[i].pause();  
                }  
            }  
        }, true);
    // audio 

    $("textarea").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
                end = this.selectionEnd;

            var $this = $(this);

            // set textarea value to: text before caret + tab + text after caret
            $this.val($this.val().substring(0, start)
                        + "\t"
                        + $this.val().substring(end));

            // put caret at right position again
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            return false;
        }
    });

    let countdownInterval;

    function showAlertWithCountdown(seconds) {
        if(start){
            clearInterval(countdownInterval);
            $("#count").html(`<b>10</b>`);
            $("#alertModal").modal('show');
            countdownInterval = setInterval(() => {
                $("#count").html(`<b>${seconds}</b>`);
                seconds--;
    
                if(seconds === 0){
                    clearInterval(countdownInterval);
                    location.reload();
                }
            }, 1000);
        }
    }

    function returnWorkSheet() {
        if(start){
            // $("#alertModal").modal('hide');
            clearInterval(countdownInterval);
        }
    }

</script>
<?= $this->endSection() ?>