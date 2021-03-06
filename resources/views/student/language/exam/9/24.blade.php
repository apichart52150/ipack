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
$Q=[
"q1" => "Over the past few",
"q2" => ", the increasing amount of industrial waste and household garbage has become a",
"q3" => "problem in many countries. People have questioned what caused this problem and what can be done to improve the situation. In my opinion, two of the most critical causes of this waste material problem are the increased",
"q4" => "and a shortage of space for landfill. To begin with, modern lifestyle has",
"q5" => "greatly to the increasing amount of waste and garbage we produce everyday. In other words, we have turned into a materialistic and mass-consumption society where we use more and throw away more than ever before. Moreover, countries are running out of space to store garbage and waste material. In fact,",
"q6" => "land for waste",
"q7" => "raises",
"q8" => "in many countries. To solve this intractable problem, every citizen needs to",
"q9" => "in producing less garbage. For example, we can bring our own personal shopping bags instead of using plastic bags provided by stores and shops. Besides, the government can",
"q10" => "stricter laws on companies to use biodegradable packaging or use recycled material. Indeed, this alone can",
"q11" => "much of the waste which is sent to at land fills. Companies can also",
"q12" => "by developing new raw material which is recyclable and will",
"q13" => "lead to less garbage. One good example of this is that tyre companies develop new tyres for cars which are not made of rubber but of new biodegradable material. As discussed above,",
"q14" => ", business and the government can share the responsibility to reduce the amount of waste material and to save the earth. I hope that in the future our offspring will be better off with the well-preserved",

];
$end = ".";
$A=[
"a1" => "consumption",
"a2" => "contribute",
"a3" => "controversies",
"a4" => "decades",
"a5" => "disposal",
"a6" => "eliminate",
"a7" => "enforce",
"a8" => "environment",
"a9" => "individuals",
"a10" => "major",
"a11" => "participate",
"a12" => "securing",
"a13" => "ultimately",
"a14" => "contributed",
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
        $q1 = "<?php echo $A['a4'] ?>",
        $q2 = "<?php echo $A['a10'] ?>",
        $q3 = "<?php echo $A['a1'] ?>",
        $q4 = "<?php echo $A['a14'] ?>",
        $q5 = "<?php echo $A['a12'] ?>",
        $q6 = "<?php echo $A['a5'] ?>",
        $q7 = "<?php echo $A['a3'] ?>",
        $q8 = "<?php echo $A['a11'] ?>",
        $q9 = "<?php echo $A['a7'] ?>",
        $q10 = "<?php echo $A['a6'] ?>",
        $q11 = "<?php echo $A['a2'] ?>",
        $q12 = "<?php echo $A['a13'] ?>",
        $q13 = "<?php echo $A['a9'] ?>",
        $q14 = "<?php echo $A['a8'] ?>",
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