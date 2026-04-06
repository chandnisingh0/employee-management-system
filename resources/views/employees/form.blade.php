
@extends('layouts.app')

@section('content')

<h4>{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</h4>

<form id="employee-form">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Name</label>
            <input type="text" name="name"
                value="{{ $employee->name ?? '' }}"
                class="form-control">
            <small class="text-danger error-name"></small>
        </div>

        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email"
                value="{{ $employee->email ?? '' }}"
                class="form-control">
            <small class="text-danger error-email"></small>
        </div>

        <div class="col-md-6 mb-3">
            <label>Position</label>
            <input type="text" name="position"
                value="{{ $employee->position ?? '' }}"
                class="form-control">
            <small class="text-danger error-position"></small>
        </div>

        <div class="col-md-6 mb-3">
            <label>Salary</label>
            <input type="number" name="salary"
                value="{{ $employee->salary ?? '' }}"
                class="form-control">
            <small class="text-danger error-salary"></small>
        </div>
    </div>

    <hr>

    <h5>Addresses</h5>

    <div id="address-container">
        @php
            $addresses = isset($employee) && $employee->addresses->count()
                ? $employee->addresses
                : [null];
        @endphp

        @foreach($addresses as $addr)
        <div class="address-block border p-3 mb-2 position-relative">

            <button type="button" class="btn btn-danger btn-sm remove-btn"
                style="position:absolute; top:5px; right:5px;">X</button>

            <input type="text" name="address_line[]" 
                value="{{ $addr->address_line ?? '' }}" 
                class="form-control mb-2" placeholder="Address Line">
            <small class="text-danger error-address_line"></small>

            <input type="text" name="city[]" 
                value="{{ $addr->city ?? '' }}" 
                class="form-control mb-2" placeholder="City">
            <small class="text-danger error-city"></small>

            <input type="text" name="state[]" 
                value="{{ $addr->state ?? '' }}" 
                class="form-control mb-2" placeholder="State">
            <small class="text-danger error-state"></small>

            <input type="text" name="zip_code[]" 
                value="{{ $addr->zip_code ?? '' }}" 
                class="form-control mb-2" placeholder="Zip Code">
            <small class="text-danger error-zip_code"></small>

        </div>
        @endforeach

    </div>

    <button type="button" id="add-more" class="btn btn-secondary mb-3">
        + Add More Address
    </button>

    <br>

    <button class="btn btn-success">
        {{ isset($employee) ? 'Update' : 'Save' }}
    </button>

</form>

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#add-more').click(function(){

        let html = `
        <div class="address-block border p-3 mb-2 position-relative">
            <button type="button" class="btn btn-danger btn-sm remove-btn"
                style="position:absolute; top:5px; right:5px;">X</button>
            <input type="text" name="address_line[]" class="form-control mb-2" placeholder="Address Line">
            <small class="text-danger error-address_line"></small>
            <input type="text" name="city[]" class="form-control mb-2" placeholder="City">
            <small class="text-danger error-city"></small>
            <input type="text" name="state[]" class="form-control mb-2" placeholder="State">
            <small class="text-danger error-state"></small>
            <input type="text" name="zip_code[]" class="form-control mb-2" placeholder="Zip Code">
            <small class="text-danger error-zip_code"></small>

        </div>
        `;

        $('#address-container').append(html);
    });
    $(document).on('click', '.remove-btn', function(){
        let total = $('.address-block').length;
        if (total <= 1) {
            alert('At least one address is required.');
            return;
        }
        $(this).closest('.address-block').remove();
    });
    $('#employee-form').submit(function(e){
    e.preventDefault();

    let formData = $(this).serialize();

    $('.text-danger').text('');
    $('input').removeClass('is-invalid');

    let isEdit = "{{ isset($employee) ? true : false }}";
    let url = "{{ route('employees.save') }}";

    if (isEdit) {
        url += "/{{ $employee->id ?? '' }}";
    }

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response){
            alert('Success');
            window.location.href = "/employees";
        },
        error: function(xhr){
            let errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value){
                let field = key.split('.')[0];
                $('[name="'+field+'[]"], [name="'+field+'"]').addClass('is-invalid');
                $('.error-' + field).first().text(value[0]);
            });
        }
    });
});
});
</script>
@endpush