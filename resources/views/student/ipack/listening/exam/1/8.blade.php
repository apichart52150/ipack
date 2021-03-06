<link rel="stylesheet" href="{{ asset('public/css/draggable.css') }}">
<style>
    table tr td {
        vertical-align: top;
        padding-top: 10px;
    }

    .input-con {
        display: inline-block;
        position: relative;
        width: 100%;
    }

    .drag-container {
        margin-bottom: 25px;
    }

    .answers-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px 0;
    }


    .answers-container p {
        font-size: 16px;
    }

    .dropbox {
        border: 2px dashed #ccc;
        padding: 3px;
        border-radius: 5px;
        min-width: 240px;
        width: auto;
        height: 100%;
        min-height: 40px;
    }

    .dropbox .drag {
        margin: 0;
        vertical-align: middle;
    }

    .grid-5 {
        grid-template-columns: repeat(1, 1fr);
    }

    .aw {
        display: none;
    }

    .line-break {
        width: 100%;
        height: 4px;
        margin: 10px 0 20px;
        background: var(--drag-primary-color);
    }
</style>
@php

$caller_2 = new stdClass();
$caller_2_choice = new stdClass();

$caller_2->aw1 = "Food leftovers in the bin; lawn clippings in the rubbish bin.";
$caller_2->aw2 = "When we buy processed food and finished goods.";
$caller_2->aw3 = "$90";
$caller_2->aw4 = "800,000 cubic metres";
$caller_2->aw5 = "Litter; smell; vermin.";
$caller_2->aw6 = "Recycling; shoppers refusing plastic bags; breaking sown garden waste; re-education program";

$caller_2_choice->e1 = "Litter; smell; vermin.";
$caller_2_choice->e2 = "When we buy processed food and finished goods.";
$caller_2_choice->e3 = "800,000 cubic metres";
$caller_2_choice->e4 = "Food leftovers in the bin; lawn clippings in the rubbish bin.";
$caller_2_choice->e5 = "$90";
$caller_2_choice->e6 = "Recycling; shoppers refusing plastic bags; breaking sown garden waste; re-education program";

@endphp
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card-box text-dark font-16">
            <p class="lead">
                {{ $pageTitle['sub_menu_name'] }}
            </p>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Note-Taking Practice</h2>
                    <table class="w-100 py-2">
                        <tr>
                            <td>1.</td>
                            <td colspan="2">You are going to listen to a talk entitled:
                                <br>
                                <b>'Problems of Solid Waste Disposal'</b>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                Follow the procedure set out in previous units to brainstorm ideas about this topic and to
                                predict any vocabulary you think may appear in the talk.
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center mb-2 mt-2">
                        <div class="col-md-12">
                            <div class="border border-dark px-2 text-center">
                                <div class="drag-container">
                                    <div class="d-grid grid-5" id="choices">
                                        @foreach($caller_2_choice as $choice)
                                        <div class="drag">{{$choice}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-12">
                            <table class="w-100 py-2">
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">As you listen to the talk for the first time, find answers to the following questions:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.1</td>
                                    <td>
                                        Give 2 examples of how we produce solid waste <b>directly</b>.
                                        <br>
                                        Give an example of how we produce solid waste <b>indirectly</b>.
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: directly</b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-1" aw="{{$caller_2->aw1}}"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: indirectly</b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-2" aw="{{$caller_2->aw2}}"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.2</td>
                                    <td>How much does it cost each household a year to dispose of solid waste?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: </b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-3" aw="{{$caller_2->aw3}}"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.3</td>
                                    <td>What volume of solid waste is buried every year in Perth?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: </b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-4" aw="{{$caller_2->aw4}}"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.4</td>
                                    <td>Give three examples of environmental problems which are strikingly obvious at a landfill site.</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: </b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-5" aw="{{$caller_2->aw5}}"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.5</td>
                                    <td> In the talk, the speaker mentions 4 ways in which the problems of solid waste disposal can be tackled. What are they?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <b>Answer: </b>
                                            <div class="dropbox w-75 q ml-2" show-aw="caller_2-6" aw="{{$caller_2->aw6}}"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <table class="w-100 py-2">
                        <tr>
                            <td>3.</td>
                            <td colspan="2">Check your answers to the above questions with the person sitting next to you.
                                When you have found these answers, it's time to listen to the talk again.
                            </td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td colspan="2">
                                Listen to the talk again. This time, take notes using the conventions mentioned in Unit 1.
                            </td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td colspan="2">
                                At the end of the talk, compare your notes with the person sitting behind you. Which set of notes is better?
                                <br>
                                How is it better? (more comprehensive, more concise, easier to follow ???) Fill any gaps you have in your notes with the help of other people in the room.
                            </td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td class="pb-2" colspan="2">
                                Write a summary of the talk in about 100 - 150 words.
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <textarea name="" class="form-control w-100" style="resize: none;" id="" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <h5 class="mt-3 aw text-success">Problems of Solid Waste Disposal (possible answer)</h5>
                                <span class="aw text-success">
                                    We all produce solid waste of some sort. Getting rid of this waste costs Perth thirty-five million dollars
                                    each year. Landfill sites are also a waste of space, almost 800,000 cubic metres every year.
                                    Environmental costs are also high. Immediate problems include rubbish, air pollution and bad smell,
                                    and pests. Related problems include groundwater pollution and greenhouse gas emission.
                                    One solution to these problems is recycling materials such as glass, aluminium and paper. In addition,
                                    people can use fewer plastic bags for shopping. Garden waste can also be used for mulch and compost.
                                    Education is the key to solving these problems and securing a healthy future.
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-12">
                    <table class="w-100">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="sound-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary py-2">
                <h4 class="modal-title text-white mx-auto">Listening - 
 {{$pageTitle['sub_menu_name'] }}</h4>
            </div>
            <div class="modal-body text-center">
                <button id="sound-intro" class="btn btn-bordered-primary">Play Sound</button>
                <audio data-sound="sound-intro">
                    <source src="{{ asset('public/isac_listening/'.$pageTitle['sub_menu_type'] .'/' .$pageTitle['name_audio']) }}" type="audio/mp3">
                </audio>
            </div>
        </div>
    </div>
</div>


@section('button-control')
<button id="check-answer" class="btn btn-info">Check Answers</button>
<button id="show-answer" class="d-none btn btn-info">
    Show Answers
  </button>
@endsection

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>

    $('#check-answer').on('click', () => {
        $("#show-answer").addClass("d-block");
$("#show-answer").removeClass("d-none");
$("#check-answer").addClass("d-none");
        $('#check-answer').prop('disabled',true)
        $('.q').each((idx, item) => {
            if ($(item).text().trim().toUpperCase() == $(item).attr('aw').trim().toUpperCase())
                    {show_aw($(item).attr('show-aw'), item)
                $(item).children().addClass('bg-success')
            }else{
                    if($(item).text().trim().toUpperCase()!="")
                        $(item).children().addClass('bg-danger')
                    show_error(item)
                }
        })
        $('.q-text').each((idx, item) => {
            if ($(item).val().trim().toUpperCase() == $(item).attr('aw').trim().toUpperCase())
                show_aw($(item).attr('show-aw'), item)
            else
                show_error(item)
        })
        $('.aw').removeClass('aw')
        $("#check-answer").prop('disabled', true);
    })
$('#show-answer').on('click', function() {
    $('check-answer').addClass('d-none')
    $('.dropbox').each((idx, item) => {

        if($(item).children().length == 1) {
            if($(item).children().hasClass('bg-danger')) {
                if($(item).children().text($(item).attr('aw'))) {
                    $(item).children().removeClass('bg-danger')
                }
            }
        } else {
            $(item).append(`<div class="drag">`+$(item).attr('aw')+`</div>`)
        }

        $('.drag-container .drag').remove();
    })
    $("#show-answer").hide();
});
    function show_aw(aw, item) {
        $(item).addClass('border border-success')
        $('.' + aw).addClass('text-success')
        $('.' + aw).removeClass('text-danger')
    }

    function show_error(item) {
        $(item).addClass('border border-danger')
    }


    $('#sound-modal').modal({
        'show': true,
        'backdrop': "static",
        'keyboard': false
    })
    $('#sound-intro').on('click', (e) => {
        $('#sound-modal').modal('hide')
        const audio = document.querySelector('audio[data-sound="sound-intro"]');
        audio.play()
    })

    $(".drag").draggable({
        revert: "invalid",
        cursor: "move",
        opacity: 0.7,
        zIndex: 100,
        containment: ".card-box",
        stop: function(event, ui) {
            if ($("#choices").children().length == 0) {
                $("#check-answer").prop("disabled", false);
            }
        },
    });

    $(".dropbox").droppable({
        accept: ".drag",
        tolerance: "touch",
        zIndex: 100,
        over: function(event, ui) {
            $(this).css("border-color", "#777");
        },
        out: function(event, ui) {
            $(this).css("border-color", "#ccc");
        },
        drop: function(event, ui) {
            if ($(this).children().length > 0) {
                var move = $(this).children().detach();
                $(ui.draggable).css({
                    top: 0,
                    left: 0
                }).parent().append(move);
            }
            $(this).css("border-color", "#ccc");
            $(this).append($(ui.draggable).css({
                top: 0,
                left: 0
            }));
        },
    });
</script>

@stop