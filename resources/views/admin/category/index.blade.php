@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Category</h3>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#categoryModal">

            Add Category

        </button>

    </div>

</div>

@include('admin.category.modal')

@endsection

@push('scripts')

<script>
$(document).ready(function () {

    console.log("jQuery Loaded");

    $("#categoryForm").on("submit", function (e) {

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({

            url: "{{ route('category.store') }}",

            type: "POST",

            data: formData,

            processData: false,

            contentType: false,

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                // alert(response.message);

                const modal = bootstrap.Modal.getInstance(document.getElementById('categoryModal'));

                modal.hide();

                $("#categoryForm")[0].reset();

                $(".text-danger").text("");

            },

            error: function (xhr) {

                $(".text-danger").text("");

                if (xhr.status == 422) {

                    $.each(xhr.responseJSON.errors, function (key, value) {

                        $("#" + key + "_error").text(value[0]);

                    });

                } else {

                    console.log(xhr.responseText);

                }

            }

        });

    });

});
</script>

@endpush