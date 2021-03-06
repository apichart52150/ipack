@extends('layouts.main_admin')


@section('page-title')
<div class="row">
    <div class="col-12 m-0">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><i class="fas fa-address-card"></i> <a id="return-page"
                            href="{{ route('user-index','all__all__all') }}">Users</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Topic </a></li> -->
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h4 class="page-title">Add user</h4>
        </div>
    </div>
</div>
@endsection

@section('content')

<style>
    .day {
        cursor: pointer;
        text-align: center;
    }

    .date {
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Add user</h4>
            <div class="row">
                <div class="col-12">
                    <div class="p-2">

                        <form id="form-add-users">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="" name="email" value=""
                                        placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="password" placeholder="Password"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">First name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="first_name"
                                        placeholder="First name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Last name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="last_name"
                                        placeholder="Last name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Remark</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="remark" name="remark">
                                        <option value="idp">IDP</option>
                                        <option value="student">Student</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status-u" name="status">
                                        <option value="">wait</option>
                                        <option value="paid">paid</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row level">
                                <label class="col-sm-2 col-form-label" for="">Package</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="level" name="level">
                                        <option value="">...</option>
                                        <option value="gold">gold</option>
                                        <option value="platinum">platinum</option>
                                        <option value="extra">extra</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row pay_type">
                                <label class="col-sm-2 col-form-label" for="">Pay type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="pay_type" name="pay_type">
                                        <option value="">...</option>
                                        <option value="CC">Credit</option>
                                        <option value="Alipay">Alipay</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price" name="" readonly>
                                </div>
                            </div> --}}
                            

                            <div class="form-group row point">
                                <label class="col-sm-2 col-form-label" for="">Write point</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" id="writing_point"
                                        name="writing_point" value="0" required>
                                    <span class="default-writing_point text-success"></span>
                                </div>
                            </div>

                            <div class="form-group row point">
                                <label class="col-sm-2 col-form-label" for="">Speaking point</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" id="speaking_point"
                                        name="speaking_point" value="0" required>
                                    <span class="default-speaking_point text-success"></span>
                                </div>
                            </div>

                            <div class="form-group row point">
                                <label class="col-sm-2 col-form-label" for="">Club point</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" id="club_point" name="club_point"
                                        value="0" required>
                                </div>
                            </div>

                            <div class="form-group row point">
                                <label class="col-sm-2 col-form-label" for="">Tutorial point</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" id="tutorial_point"
                                        name="tutorial_point" value="0" required>
                                </div>
                            </div>

                            <div class="form-group row trial_point">
                                <label class="col-sm-2 col-form-label" for="">Trial point</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" id="trial_point"
                                        name="trial_point" value="0" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Expire date</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" name="expire_date" value="" class="form-control date"
                                            data-provide="datepicker" data-date-autoclose="true" readonly
                                            placeholder="mm/dd/yyyy">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Address" id="" name="address" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" id="" class="btn btn-info waves-effect waves-light">Add</button>
                                <a href="{{ route('user-index','all__all__all') }}"
                                    class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
<!-- end row -->
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
<script src="{{ asset('public/assets/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('public/assets/js/ajax.jquery.js') }}"></script>
<script>
    // $('.level').hide()
    // $('.pay_type').hide()

    // $('#status-u').on('change',function(){
    //     if($('#status-u').val()=="paid"){
    //         get_price()
    //         $('.level').show()
    //         $('.pay_type').show()
    //     }else{
    //         $('.level').hide()
    //         $('.pay_type').hide()
    //     }
    // })
    // $('#remark').on('change',function(){
    //     get_price()
    // })
    // $('#level').on('change',function(){
    //     get_price()
    // })

    // function get_price(){
    //     if($('#status-u').val()=="paid"){
    //         if(($('#remark').val()=="student" || $('#remark').val()=="other") && $('#level').val()=="extra"){
    //             if($('#remark').val()=="student"){
    //                 $('#price').val("{{ $price_extra_student->price - $price_extra_student->discount }}")
                   
    //             }else if($('#remark').val()=="other"){
    //                 $('#price').val("{{ $price_extra_other->price - $price_extra_other->discount }}")
                    
    //             }
    //         }else{
    //             if($('#level').val()=="gold"){
    //                 $('#price').val("{{ $price_gold->price - $price_gold->discount }}")
                    
    //             }else if($('#level').val()=="platinum"){
    //                 $('#price').val("{{ $price_platinum->price - $price_platinum->discount }}")
                   
    //             }else if($('#level').val()=="extra"){
    //                 $('#price').val("")
    //             }
    //         }
    //     }
    // }

    $('#form-add-users').on('submit',function(){
        let data = new FormData(this)
        $.ajax({
            type: 'POST',
            url: "{{ route('user-add-confirm') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response)
                if (response == "success") {
                    swal("Insert success", "", "success").then(()=>{
                    window.location.href = "{{ route('user-index','all__all__all') }}"
                    })
                    }
                else
                    swal("Update failed", "", "error")
            }
        })
        return false
    })
</script>

@endsection