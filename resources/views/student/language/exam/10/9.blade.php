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
 $Q=["q1" => "When it comes to children's education, parents are faced with a lot of choices. They can choose to send their children to a government or private school or they can opt to teach their children themselves in their own home. There are advantages and disadvantages of both",
    "q2" => ", and this essay will outline some of these. There are",
    "q3" => "advantages of choosing to send your child to a formal school learning",
    "q4" => ". First of all, the school is staffed by trained specialists who can teach a variety of subjects with a",
    "q5" => "of educational",
    "q6" => "",
    "q7" => ". In addition, schools provide a variety of extra-curricular activities such as sports and clubs which will help children to develop in non-academic fields. Probably the most important",
    "q8" => "of school-life, however, is the fact that it gives young children the chance to meet other young people and learn how to socialise at an early age. Socialisation at school also helps develop other skills such as team-work skills and group",
    "q9" => "skills. There are, however, a number of arguments in favour of educating children in the safety and comfort of one's own home. First of all, although school gives the opportunity for children to meet and socialise with other children it also",
    "q10" => "them to",
    "q11" => "such as bullying, which can have a long-term detrimental effect on a child's development. In addition, school classes tend to be rather large with up to 50 students in a class. If that case, it is easy for a child with learning difficulties to slip through the system and not receive the special attention he/she needs. Learning at home is also much less",
    "q12" => "in terms of the competitive nature of schools. Some young learners do not fare well in a competitive learning",
    "q13" => "and prefer the more",
    "q14" => "",
    "q15" => "of the home. From the arguments above, it is",
    "q16" => "that there are pros and cons of choosing to educate children at school or at home. An important",
    "q17" => "in reaching such a decision will depend on the nature of the child, and the quality of the schools",
    "q18" => "for the child in the neighbourhood. At the end of the day, the most important",
    "q19" => "is how to produce a well-balanced happy",];
    $end = ".";
$A=[
    "a1" => "approach",
    "a2" => "aspect",
    "a3" => "available",
    "a4" => "available",
    "a5" => "dynamic",
    "a6" => "environment",
    "a7" => "environment",
    "a8" => "equipment",
    "a9" => "exposes",
    "a10" => "factor",
    "a11" => "factor",
    "a12" => "individual",
    "a13" => "issues",
    "a14" => "obvious",
    "a15" => "obvious",
    "a16" => "options",
    "a17" => "range",
    "a18" => "relaxed",
    "a19" => "stressful",];
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
         $q1 = "<?php echo $A['a16'] ?>",
         $q2 = "<?php echo $A['a14'] ?>",
         $q3 = "<?php echo $A['a6'] ?>",
         $q4 = "<?php echo $A['a17'] ?>",
         $q5 = "<?php echo $A['a8'] ?>",
         $q6 = "<?php echo $A['a3'] ?>",
         $q7 = "<?php echo $A['a2'] ?>",
         $q8 = "<?php echo $A['a5'] ?>",
         $q9 = "<?php echo $A['a9'] ?>",
         $q10 = "<?php echo $A['a13'] ?>",
         $q11 = "<?php echo $A['a19'] ?>",
         $q12 = "<?php echo $A['a6'] ?>",
         $q13 = "<?php echo $A['a18'] ?>",
         $q14 = "<?php echo $A['a1'] ?>",
         $q15 = "<?php echo $A['a14'] ?>",
         $q16 = "<?php echo $A['a10'] ?>",
         $q17 = "<?php echo $A['a3'] ?>",
         $q18 = "<?php echo $A['a10'] ?>",
         $q19 = "<?php echo $A['a12'] ?>",
    ];

    console.log(answers);

    $(".drag").draggable({
        revert: "invalid",
        cursor: "move",
        opacity: 0.7,
        zIndex: 100,
        containment: ".card-box",
        stop: function (event, ui) {
          if ($("#choices").children().length == 0) {
            $("#check-answer").prop("disabled", false);
          }
        },
    });

    $(".dropbox").droppable({
        accept: ".drag",
        tolerance: "touch",
        zIndex: 100,
        over: function (event, ui) {
            $(this).css("border-color", "#777");
        },
        out: function (event, ui) {
            $(this).css("border-color", "#ccc");
        },
        drop: function (event, ui) {
            if ($(this).children().length > 0) {
                var move = $(this).children().detach();
                $(ui.draggable).css({ top: 0, left: 0 }).parent().append(move);
            }
            $(this).css("border-color", "#ccc");
            $(this).append($(ui.draggable).css({ top: 0, left: 0 }));
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

    function checkAnswer(ele, status) {
        let bgColor;

        status == 'correct' ? (bgColor = 'color-success') : (bgColor = 'color-danger')

        ele.addClass(bgColor)
    }
</script>
@stop