<style>
    .form-control {
        border: none;
        border-bottom: 1px solid #ccc;
        display: inline-block;
        height: auto;
        width: 130px;
        padding: 0 5px;
        margin: 10px 5px;
    }

    ul.questions li {
        margin: 20px 0;
        line-height: 2rem;
    }

    .input-con {
        display: inline-block;
        position: relative;
    }

    .ans-con {
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
    }
</style>
@php
    //$question -> input
    $Q=["q1" => "The first chart gives details of the different ways students travel to a school every day, and the second chart shows how long the journey takes. Overall, it is clear that travelling by bus is the",
    "q2" => "popular means of transport and that most students spend more",
    "q3" => "30 minutes travelling to school. To begin with the travel mode, 40% of students take the bus to school. The next ",
    "q4" => "popular means of transport is the parents’ car, with 25%. Slightly",
    "q5" => "popular is the bicycle, with 20%, followed",
    "q6" => "the taxi, with 10%. The",
    "q7" => "popular way to get to school is walking, with only 5% of students choosing this option. When it comes to journey time, one",
    "q8" => "of all students, or twenty-five percent, take less than half an hour to get to school. Thirty percent of students travel",
    "q9" => "30 and 45 minutes, while a further 5%, (35%), have a journey",
    "q10" => "45 to 60 minutes. One",
    "q11" => "of all students travel for",
    "q12" => "than one hour. To sum",
];
$end = ", only one quarter of all students travel to school using human energy power (bicycle and walking), while the majority of them spend a substantial period of time on getting to school.";
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card-box text-dark font-15">
            <div class="row justify-content-center mb-2">
                <div class="col-md-12">
                    <div class="border border-dark px-2 text-center">
                        <h5>The pie-charts show how students travel to school each day, and the length of time it takes to reach school.</h5>
                        <img src="{{ asset('public/img_lang/gap1/gap1_19.jpg') }}" class="img-fluid mb-2" alt="Responsive image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border border-dark p-2">
                        @foreach ($Q as $Q)
                        <div class="line-hight d-inline w-auto mb-2 ">
                            {{ $Q }}
                            <!-- question -->
                        </div>
                        <div class="input-con">
                            <input type="text" class="form-control">
                        </div>
                        @endforeach
                        {{$end}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@section('button-control')
    <button id="check-answer" class="btn btn-info">Check Answers</button>
@endsection

@section('js')
<script>

    
    const answers = []
    answers[0]= ['most'];
    answers[1] = ['than'];
    answers[2] = ['most'];
    answers[3] = ['less'];
    answers[4] = ['by'];
    answers[5] = ['least'];
    answers[6] = ['quarter'];
    answers[7] = ['between'];
    answers[8] = ['of'];
    answers[9] = ['tenth'];
    answers[10] = ['more', 'greater', 'longer'];
    answers[11] = ['up'];

    let score = 0;

    $('#check-answer').click(checkAnswers) 
 
    function checkAnswers() {
        let icon;
        $(':text').each((idx, item) => {
            answers[idx] = answers[idx].toString().trim().toLowerCase().split(",")
            $(item).removeClass('border-success');
            $(item).removeClass('border-danger');
            
            if(jQuery.inArray($(item).val().toLowerCase(),  answers[idx]) != -1) {
                $(item).addClass('border border-success');
                score++
            } else {
                $(`<span class="text-success"><u>${answers[idx]}</u></span>`).insertAfter($(item));
                $(item).addClass('border border-danger');
            }
        })

        $('#check-answer').prop('disabled', true);
        
        let title = ""
        let text = "You got "+score + "/" + $(':text').length + " points."
        if (score == $(':text').length)
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

    }
</script>
@stop