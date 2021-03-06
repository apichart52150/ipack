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
"q1" => "Some parents believe that watching television is bad for their children. So they try to",
"q2" => "their children from watching TV. However, other parents think that there is nothing bad in watching TV. Personally, I think that watching TV brings children only",
"q3" => "unless they sit in front of TV set less then a",
"q4" => "of hours daily. For the following reasons, which I will mention below, I believe that television plays an essential",
"q5" => "in a child's development. First of all, television helps a child to extent his or her",
"q6" => "of interests. Children can find out many new things and make many exciting discoveries for themselves. In addition to these practical",
"q7" => "television improves children's vocabulary, their memory and gives them the opportunity to gain more knowledge. I think it is essential for a child. Of course, someone can say that there are plenty of different sources of information such as books and teachers. But I think in our modern world children must learn faster and use all",
"q8" => "",
"q9" => "in order to succeed. Second, watching documentary programs helps children to learn more about wild life, our",
"q10" => "and about the importance of preserving our forest and wild animals that live there. Scientists say that a child should not watch TV more then 40 minutes",
"q11" => ". For example, my mother always made us have a break after watching TV more then half an hour and let our eyes rest for several minutes before turning on the TV again. I think it is the best solution. To",
];

$end = "up, I believe that television gives children and all people the opportunity to learn what cannot be learnt from books. Television and movies in particular allow people to feel the reality and see what they will most likely not be able to see in their lives. Personally, when I was a child I liked to watch cognitive programs about wild animals. Unfortunately, my family had only one TV, but these programs were the only ones we all wanted to watch. So, we gathered in our living room and watched them in complete silence and I always remember those moments with a smile on my face.";

$A = [
"a1" => "benefits",
"a2" => "benefits",
"a3" => "contemporary",
"a4" => "couple",
"a5" => "environment",
"a6" => "range",
"a7" => "restrict",
"a8" => "role",
"a9" => "successively",
"a10" => "sum",
"a11" => "technology",
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
        $q1 = "<?php echo $A['a7'] ?>",
        $q2 = "<?php echo $A['a1'] ?>",
        $q3 = "<?php echo $A['a4'] ?>",
        $q4 = "<?php echo $A['a8'] ?>",
        $q5 = "<?php echo $A['a6'] ?>",
        $q6 = "<?php echo $A['a1'] ?>",
        $q7 = "<?php echo $A['a3'] ?>",
        $q8 = "<?php echo $A['a11'] ?>",
        $q9 = "<?php echo $A['a5'] ?>",
        $q10 = "<?php echo $A['a9'] ?>",
        $q11 = "<?php echo $A['a10'] ?>",
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