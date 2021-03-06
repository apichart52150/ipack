@extends('layouts.main')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><i class="mdi mdi-keyboard-return"></i> <a href="{{ route('status_writing') }}">Back</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Topic </a></li> -->
                        <li class="breadcrumb-item active">{{$data->header_test}} saved</li>
                    </ol>
                </div>
                <h4 class="page-title">Status Writing</h4>
            </div>
        </div>
    </div>     
@endsection



@section('content')

    <style>
        .card-header {
            background-color:#00BCD4 !important;
        }
    </style>

    <div class="row">
        <div class="col-12 mt-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">{{ $data->header_test }} Question</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                        <a href="{{ asset($img_path) }}" class="image-popup w-100" title="{{ $data->header_test }}">
                            <img src="{{ asset($img_path) }}" class="thumb-img w-100" alt="{{ $data->header_test }}">
                        </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-box text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">{{ $data->header_test }} Answer</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('store.sac-save') }}" method="POST" id="form_test">
                                {{ csrf_field() }}

                                <input type="hidden" name="sacId" value="{{ $data->id }}">
                                <input type="hidden" name="header_test" value="{{ $data->header_test }}">
                                <input type="hidden" name="mode" value="{{ $data->mode }}">
                                <input type="hidden" name="test_type" value="{{ $data->test_type }}">
                                <input type="hidden" name="level" value="{{ $data->level }}">
                                <input type="hidden" name="btn_status" value="">

                                <div class="form-group">
                                    <label class="col-auto col-form-label mt-3">Select target band</label>
                                    <div class="col-auto">
                                        <select name="targetbrand" class="form-control">
                                            <option value="5">5</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                            <option value="6.5">6.5</option>
                                            <option value="7">7</option>
                                            <option value="7.5">7.5</option>
                                            <option value="8">8</option>
                                            <option value="8.5">8.5</option>
                                            <option value="9">9</option>
                                        </select>
                                    </div>
                                </div>

                                <textarea id="elm1" name="text_result">{{ $data->text }}</textarea>

                            </form>

                            <div class="text-center mt-3">

                                @if($data->mode == 'practice')
                                    <button id="save" class="btn btn-info">SAVE</button>
                                @endif

                                <button id="submit" class="btn btn-success">SUBMIT</button>
                                <a href="{{ route('status_writing') }}" class="btn btn-danger">CANCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#save, #submit').on('click', function(e) {
            let text, textBtn;
            if(e.target.id == 'save') {
                text = 'You want to Save?'
                textBtn = 'Save'
                $('input[name="btn_status"]').val('save')
            } else {
                text = 'You want to Submit?'
                textBtn = 'Submit'
                $('input[name="btn_status"]').val('submit')
            }

            swal(
                {
                    title: "Are you sure",
                    text: text,
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonText: textBtn,
                    confirmButtonClass: 'btn btn-confirm btn-sm mt-2',
                    cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                }
            ).then(function (result) {

                if(result) {
                    $('#form_test').submit()
                }

            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    return
                }
            })

            e.preventDefault()
        })
    </script>
@stop