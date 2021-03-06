@extends('layouts.main_admin')


@section('page-title')
<div class="row">
    <div class="col-12 m-0">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('admin_home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clubs-list')}}">Clubs</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
            <h4 class="page-title">History</h4>
        </div>
    </div>
</div>
@endsection


@section('content')

<style>
    .user_name {
        font-size: 20px;
    }

    .input-con {
        display: inline-block;
        position: relative;
    }

    .day {
        cursor: pointer;
        text-align: center;
    }

    .date {
        cursor: pointer;
    }
</style>


<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <label for="">Date: </label>
            <div class="input-con pr-1">
                <div class="input-group">
                    <input type="text" class="form-control date" data-provide="datepicker" data-date-autoclose="true" readonly placeholder="mm/dd/yyyy">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                    </div>
                </div>
            </div>
            <label for="">Status: </label>
            <div class="input-con pr-1">
                <select name="" class="status form-control">
                    <option value="all">Show All</option>
                    <option value="1">Approval</option>
                    <option value="2">Disapproval</option>
                </select>
            </div>
            <div class="input-con">
                <button url="{{url('clubs/history')}}" class="search-data btn btn-primary">Search</button>
            </div>
            <div class="input-con">
                <button class="reset-data btn btn-danger">Reset</button>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th class="">Club date</th>
                        <th>USER</th>
                        <th>Approved by</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($clubs)>0)
                    @foreach ($clubs as $club)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($club->club_date)) }}</td>
                        <td>{{ $club->first_name }} {{ $club->last_name }}</td>
                        <td>{{ $club->staff_username }}</td>
                        <td>
                            @if($club->status==1)
                            <span class="text-success">Approval</span>
                            @else
                            <span class="text-danger">Disapproval</span>
                            @endif
                        </td>
                        <td>{{ $club->note }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="edit_status('{{$club->clubs_id}}','{{$club->status}}','{{$club->note}}','{{$club->id}}');">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <span>Don't have data</span>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            {!! $clubs->links('pagination::bootstrap-4') !!}
        </div>
    </div>
    <div id="route" route="{{route('clubs-edit')}}"></div>
</div>

<!-- Vendor js -->
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
<script src="{{ asset('public/assets/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('public/assets/js/ajax.jquery.js') }}"></script>

<script src="{{ asset('public/assets/js/moment.min.js') }}"></script>

<script>
    let get_url = $(location).attr('href').split("history/")[1].split("?")[0]
    let url_date = get_url.split("/")[0]
    let url_status = get_url.split("/")[1]
    if (url_date == "all")
        url_date = ""
    else
        url_date = moment(url_date.replaceAll("-", "/")).format('MM-DD-YYYY')
    if (url_status == "all")
        url_status = "all"
    $('.date').val(url_date)
    $('.status').val(url_status)

    $('.search-data').on('click', () => {

        let date = $('.date').val()
        if (date == "")
            date = "all"
        else
            date = moment($('.date').val().replaceAll("/", "-")).format('YYYY-MM-DD')
        let status = $('.status').val()
        let url = $('.search-data').attr('url') + '/' + date + '/' + status
        window.location.href = url
    })

    $('.reset-data').on('click', () => {
        $('.date').val(null)
        $('.status').val("all")
    })

    function edit_status(id, status, note, student_id) {
        let select = document.createElement("select")
        let input = '<br><label class="w-100 text-left pt-2">Status</label>'
        input += '<select id="status-edit" class="swal2-input mt-0">'
        if (status == 1) {
            input += '<option value="1" selected>Approval</option>'
            input += '<option value="2">Disapproval</option>'
        } else if (status == 2) {
            input += '<option value="1">Approval</option>'
            input += '<option value="2" selected>Disapproval</option>'
        }
        input += '</select>'
        input += '<br><label class="w-100 text-left pt-2">Reasons</label>'
        input += '<input type="text" id="note-edit" class="swal2-input mt-0" value="' + note + '" placeholder="Notes">'

        Swal.fire({
            title: 'Edit',
            text: "",
            html: input,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            preConfirm: () => {
                let status = Swal.getPopup().querySelector('#status-edit').value
                let note = Swal.getPopup().querySelector('#note-edit').value
                if (!note) {
                    Swal.showValidationMessage(`Please enter note.`)
                }
                return {
                    status: status,
                    note: note,
                }
            }
        }).then((result) => {
            update_data(id, status, result.value.status, result.value.note, student_id)
        })
    }

    function update_data(id, status1, status2, note, student_id) {
        load_wait()
        let title = "Edit"
        let data = new FormData()
        data.append('_token', "{{ csrf_token() }}")
        data.append('id', id)
        data.append('status1', status1)
        data.append('status2', status2)
        data.append('note', note)
        data.append('student_id', student_id)
        $.ajax({
            type: 'POST',
            url: $('#route').attr('route'),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == "success") {
                    Swal.fire(title, "", 'success').then(()=>{
                        location.reload()
                    })
                } else if (response == "failed") {
                    Swal.fire(title, '', 'error')
                } else {
                    Swal.fire(title, 'User has 0 point.', 'warning')
                }
            }
        })
    }

    function load_wait() {
        Swal.fire({
            title: 'Please Wait',
            html: 'Data uploading in progress',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        })
    }
</script>

@endsection