<link rel="stylesheet" href="{{ asset('public/css/draggable.css') }}">
<style>
    .drag-container {
        margin-bottom: 25px;
    }


    .answers-container .dropbox {
        display: inline-block;
    }

    .dropbox {
        border: 2px dashed #ccc;
        border-radius: 5px;
        padding: 3px;
        margin: 5px;
        min-width: 150px;
        min-height: 40px;
        vertical-align: middle;
    }

    .dropbox .drag {
        margin: 0;
    }

    .grid-5 {
        grid-template-columns: repeat(6, 1fr);
    }
</style>
@php

$Q = [
"q1" => "Today",
"q2" => "are used almost everywhere. It is impossible to imagine our life without PCs, Internet, hand phones and other",
"q3" => "",
"q4" => ". But what of the future? In what fields will",
"q5" => "be used and what",
"q6" => "will humans have in this world in the future? Computers certainly make our life easier; we can easily get information about any product we plan to buy or place we plan to visit within a few seconds using personal",
"q7" => "and Internet. Scientists",
"q8" => "that in the near future it will be possible to smell a new perfume using Internet and watch 3D scenes at home like we do in the theater. According to forecasts of HR agencies, machines will replace the",
"q9" => "of cashiers,",
"q10" => "and",
"q11" => "pilots. Some",
"q12" => "in Japan are already selling housewife-robots, which help old people to keep their home clean.",
"q13" => "the fact that",
"q14" => "help us, they make us dependent.",
"q15" => ", people spend more time behind",
"q16" => "than ever before. And some of them feel a need for more time to be spent with people in live",
"q17" => ". In addition, system failure of one of the important modules of a",
"q18" => "can bring about serious",
"q19" => ". Suffice to mention",
"q20" => "problems which",
"q21" => "at the end of the 1990s, problems concerning the coming year 2000 (Y2K) and catastrophes that were",
"q22" => ". Fortunately imminent disasters did not happen. However, it is difficult to imagine what could have happened if all the",
"q23" => "had",
"q24" => ". We live in a",
"q25" => "era:",
"q26" => "penetrate everywhere with all the",
"q27" => "they provide and all the dangers they hide. However we are satisfied with them and sometimes we even thank them because they help us in",
];

$end = ", studying, doing business, entertaining and saving lives in critical situations.";

$A = [
"a1" => "apparently",
"a2" => "benefits",
"a3" => "civil",
"a4" => "communicating",
"a5" => "computer",
"a6" => "computer",
"a7" => "computer",
"a8" => "computers",
"a9" => "computers",
"a10" => "computers",
"a11" => "computers",
"a12" => "computers",
"a13" => "consequences",
"a14" => "contact",
"a15" => "corporations",
"a16" => "despite",
"a17" => "devices",
"a18" => "job",
"a19" => "military",
"a20" => "monitors",
"a21" => "occurred",
"a22" => "occurred",
"a23" => "predict",
"a24" => "predicted",
"a25" => "predictions",
"a26" => "role",
"a27" => "technological",
];


@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card-box text-dark font-15">
            <div class="row justify-content-center mb-2">
                <div class="col-md-12">
                    <div class="border border-dark px-2 text-center">
                        <h5>The table shows annual budget allocation for defence and education in a number of different countries.</h5>
                        <div class="drag-container">
                            <div class="d-grid grid-5" id="choices">
                                @foreach ($A as $choices)
                                <div class="drag">{{ $choices }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-2">
                <div class="col-md-12">
                    <div class="border border-dark p-2" style="line-height: 35px;">
                        <div class="answers-container">
                            @foreach($Q as $q)
                            {{ $q }}
                            <div class="dropbox"></div>
                            @endforeach
                            {{ $end }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('button-control')
<button id="check-answer" class="btn btn-info">Check Answers</button>
<button id="show-answer" class="d-none btn btn-info">Show Answers</button>
@endsection

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>
    $("#show-answer").prop("disabled", true);

    const answers = [
        $q1 = "<?php echo $A['a8'] ?>",
        $q2 = "<?php echo $A['a27'] ?>",
        $q3 = "<?php echo $A['a17'] ?>",
        $q4 = "<?php echo $A['a8'] ?>",
        $q5 = "<?php echo $A['a26'] ?>",
        $q6 = "<?php echo $A['a8'] ?>",
        $q7 = "<?php echo $A['a23'] ?>",
        $q8 = "<?php echo $A['a18'] ?>",
        $q9 = "<?php echo $A['a3'] ?>",
        $q10 = "<?php echo $A['a19'] ?>",
        $q11 = "<?php echo $A['a15'] ?>",
        $q12 = "<?php echo $A['a16'] ?>",
        $q13 = "<?php echo $A['a8'] ?>",
        $q14 = "<?php echo $A['a1'] ?>",
        $q15 = "<?php echo $A['a20'] ?>",
        $q16 = "<?php echo $A['a14'] ?>",
        $q17 = "<?php echo $A['a5'] ?>",
        $q18 = "<?php echo $A['a13'] ?>",
        $q19 = "<?php echo $A['a5'] ?>",
        $q20 = "<?php echo $A['a21'] ?>",
        $q21 = "<?php echo $A['a24'] ?>",
        $q22 = "<?php echo $A['a25'] ?>",
        $q23 = "<?php echo $A['a21'] ?>",
        $q24 = "<?php echo $A['a5'] ?>",
        $q25 = "<?php echo $A['a8'] ?>",
        $q26 = "<?php echo $A['a2'] ?>",
        $q27 = "<?php echo $A['a4'] ?>",
    ];

    console.log(answers);

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

        $("#check-answer").on("click", () => {
$('#show-answer').addClass('d-block')
$('#show-answer').removeClass('d-none')
$('#check-answer').addClass('d-none')
        let score = 0
        let droppables = $(".dropbox");

        droppables.each((idx, item) => {
            if ($(item).children().text().trim() == answers[idx]) {
                checkAnswer($(item).children(), 'correct');
                score++
            } else {
                checkAnswer($(item).children(), 'incorrect');
            }
        });

        $(".drag").draggable({
            disabled: true,
        });
        let title = ""
        let text = "You got "+score + "/" + droppables.length + " points."
        if (score == droppables.length)
            title = "Congratulations!"
        else
            text = text + " Try again."

        Swal.fire({
            title: title,
            text: text,
            timer: 5000,
        }).then(() => {
            $(item).css({
                "font-weight": "bold",
                'color': '#2bc3a5'
            });
        });

        $("#check-answer").prop("disabled", true);
        $("#show-answer").prop("disabled", false);
    });

    $('#show-answer').on('click', () => {

        $('.dropbox').each((idx, item) => {

            if ($(item).children().length == 1) {
                if ($(item).children().hasClass('color-danger')) {
                    if ($(item).children().text(answers[idx])) {
                        $(item).children().removeClass('color-danger')
                    }
                }
            } else {
                $(item).append(`<div class="drag">${ answers[idx] }</div>`)
            }

            $('.drag-container .drag').remove();
        })
    });

    function checkAnswer(ele, status) {
        let bgColor;

        status == 'correct' ? (bgColor = 'color-success') : (bgColor = 'color-danger')

        ele.addClass(bgColor)
    }
$('#show-answer').on('click', function() {
        $('check-answer').addClass('d-none')
        $('.dropbox').each((idx, item) => {

            if($(item).children().length == 1) {
                if($(item).children().hasClass('color-danger')) {
                    if($(item).children().text(answers[idx])) {
                        $(item).children().removeClass('color-danger')
                    }
                }
            } else {
                $(item).append(`<div class="drag">${ answers[idx] }</div>`)
            }

            $('.drag-container .drag').remove();
        })
        $("#show-answer").hide();
    });
</script>
@stop