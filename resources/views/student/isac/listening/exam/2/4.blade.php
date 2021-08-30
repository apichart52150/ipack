<style>
    .mark,
    mark {
        padding: .2em;
        background-color: #ffc107;
    }

    #show-answer {
        display: none;
    }

    .box-shadow {
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2);
    }

    .aw {
        display: none;
    }

    .input-con {
        display: inline-block;
        position: relative;
    }
    .input-con2 {
        width: 100px;
    }

    .input-text {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 3px;
        width: 100%;
        height: auto;
        min-width: 80px;
        min-height: 40px;
    }

    .input-container {
        position: relative;
        height: 40px;
        width: 80px;
        margin: 0;
    }

    .radio-button {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        margin: 0;
        cursor: pointer;
    }

    .radio-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        border: 2px solid #079ad9;
        border-radius: 5px;
        padding: 1rem;
        transition: transform 300ms ease;
    }

    .icon svg {
        fill: #079ad9;
        width: 3rem;
        height: 3rem;
    }

    .radio-tile-label {
        text-align: center;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #079ad9;
    }

    .radio-button:checked+.radio-tile {
        background-color: #079ad9;
        border: 2px solid #079ad9;
        color: white;
        transform: scale(1.1, 1.1);
    }

    .icon svg {
        fill: white;
        background-color: #079ad9;
    }

    .radio-tile-label {
        color: white;
        background-color: #079ad9;
    }
</style>
@php

$caller_4 = new stdClass();
$caller_4->e1 = new stdClass();
$caller_4->e1->q = "Population (m)";
$caller_4->e1->aw = ["16.5 m.","3.7 m."];
$caller_4->e2 = new stdClass();
$caller_4->e2->q = "GNP per capita ("."$"."US)";
$caller_4->e2->aw = ["US$11,910","US$ 690"];
$caller_4->e3 = new stdClass();
$caller_4->e3->q = "Life expectancy";
$caller_4->e3->aw = ["76 years","54 years"];
$caller_4->e4 = new stdClass();
$caller_4->e4->q = "Literacy rate: m.";
$caller_4->e4->aw = ["100% ","55%"];
$caller_4->e5 = new stdClass();
$caller_4->e5->q = "f.";
$caller_4->e5->aw = ["100%","35%"];
$caller_4->e6 = new stdClass();
$caller_4->e6->q = "Kilojoules per day (% of total required)";
$caller_4->e6->aw = ["114%","79%"];

@endphp
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card-box text-dark font-16">
            <p class="lead">
                {{$pageTitle['sub_menu_name']}}
            </p>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="font-italic">Caller 1</h4>
                    <h5>Listen to the tape and then complete the table below: </h5>
                        <table>
                            <tr class="text-center">
                                <td></td>
                                <td>Australia</td>
                                <td></td>
                                <td>PNG</td>
                                <td></td>
                            </tr>
                            @foreach($caller_4 as $index => $caller_4)
                            <tr>
                                <td class="pr-3">{{$caller_4->q}}</td>

                                @foreach($caller_4->aw as $index2 => $aw)
                                <td>
                                    <input type="text" class="form-control caller_4" aw="{{$aw}}" show-aw="caller_4-{{$index}}-{{$index2}}" autocomplete="off">
                                </td>
                                <td>
                                    <span class="pl-2 px-0 aw caller_4-{{$index}}-{{$index2}} text-danger">{{$aw}}</span>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
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
                <h4 class="modal-title text-white mx-auto">Activity 1 - Intro</h4>
            </div>
            <div class="modal-body text-center">
                <button id="sound-intro" class="btn btn-bordered-primary">Play Sound</button>
                <audio data-sound="sound-intro">
                    <source src="{{asset('public/isac_listening/'.$pageTitle['sub_menu_id'].'/'.$pageTitle['name_audio'])}}" type="audio/mp3">
                </audio>
            </div>
        </div>
    </div>
</div>


@section('button-control')
<button id="check-answer" class="btn btn-info">Check Answersss</button>
<!-- <button id="show-answer" class="btn btn-success">Show Answer</button> -->
@endsection

@section('js')

<script>
    $('.q-caller-3').each((idx, item) => {
        let text = $(item).html()
        let new_text = $(item).html()
        let aw = $(item).attr('aw').split("***")
        for (let i = 0; i < text.split("...").length - 1; i++) {
            let input = '<div class="input-con input-con2 caller_3 pb-1 "><input type="text" class="input-text caller_3" aw="' + aw[i] + '" show-aw="caller_3-' + idx + '-' + i + '" autocomplete="off"></div>' +
                '<labal class="w-100 px-2 aw caller_3-' + idx + '-' + i + ' text-danger">' + aw[i] + '</labal>'
            new_text = new_text.replace("...", input)
        }
        $('.q-caller-3-e' + (idx + 1)).html(new_text)
    })

    $('#check-answer').on('click', () => {
        $('.caller_1:checked').each((idx, item) => {
            if ($(item).val() == $(item).attr('aw'))
                show_aw($(item).attr('show-aw'))
        })
        $('.caller_2').each((idx, item) => {
            if ($(item).val() == $(item).attr('aw'))
                show_aw($(item).attr('show-aw'))
        })
        $('.caller_3').each((idx, item) => {
            if ($(item).val() == $(item).attr('aw'))
                show_aw($(item).attr('show-aw'))
        })
        $('.caller_4').each((idx, item) => {
            if ($(item).val() == $(item).attr('aw').toUpperCase())
                show_aw($(item).attr('show-aw'))
        })
        $('.aw').removeClass('aw')
    })

    function show_aw(aw) {
        $('.' + aw).addClass('text-success')
        $('.' + aw).removeClass('text-danger')
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
</script>

@stop