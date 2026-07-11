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

    <table class="table table-bordered" id="categoryTable">

    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

</table>

</div>

@include('admin.category.modal')

@endsection

@push('scripts')

<script>
$(document).ready(function () {

    console.log("Category Script Loaded");

    $("#categoryForm").on("submit", function (e) {

    e.preventDefault();

    $(".text-danger").text("");

    let id = $("#category_id").val();

    let url = id
        ? "{{ route('category.update', ':id') }}".replace(":id", id)
        : "{{ route('category.store') }}";

    let formData = new FormData(this);

    $.ajax({

        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },

        beforeSend: function () {

            $("#categoryForm button[type='submit']")
                .prop("disabled", true)
                .text("Saving...");

        },

        success: function (response) {

            toastr.success(response.message);

            $("#categoryForm")[0].reset();

            $("#category_id").val("");

            $(".text-danger").text("");

            $("#modalTitle").text("Add Category");

            bootstrap.Modal.getInstance(
                document.getElementById("categoryModal")
            ).hide();

            $("#categoryTable").DataTable().ajax.reload();

        },

        error: function (xhr) {

            $(".text-danger").text("");

            if (xhr.status == 422) {

                $.each(xhr.responseJSON.errors, function (key, value) {

                    $("#" + key + "_error").text(value[0]);

                });

                toastr.warning("Please correct the validation errors.");

            } else {

                toastr.error("Something went wrong.");

                console.log(xhr.responseText);

            }

        },

        complete: function () {

            $("#categoryForm button[type='submit']")
                .prop("disabled", false)
                .text("Save");

        }

    });

});

});


//edit the category 
$(document).on("click", ".editBtn", function () {

    let id = $(this).data("id");

    let url = "{{ route('category.edit', ':id') }}";
    url = url.replace(':id', id);

    $.ajax({

        url: url,
        type: "GET",

        success: function (res) {

            $("#category_id").val(res.id);
            $("#category_name").val(res.category_name);
            $("#slug").val(res.slug);
            $("select[name='status']").val(res.status);

            $("#modalTitle").text("Edit Category");

            $("#categoryModal").modal("show");
        }

    });

});


//deleted 

$(document).on("click", ".deleteBtn", function () {

    let id = $(this).data("id");

    let url = "{{ route('category.delete', ':id') }}";
    url = url.replace(':id', id);

    Swal.fire({

        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: url,
                type: "DELETE",

                data: {
                    _token: $('meta[name="csrf-token"]').attr("content")
                },

                success: function (response) {

                    toastr.success(response.message);

                    $("#categoryTable").DataTable().ajax.reload();

                }

            });

        }

    });

});



//data tabel 
$('#categoryTable').DataTable({

    processing: true,

    serverSide: true,

    ajax: "{{ route('category.list') }}",

    columns: [

        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },

        {
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false
        },

        {
            data: 'category_name',
            name: 'category_name'
        },

        {
            data: 'slug',
            name: 'slug'
        },

        {
            data: 'status',
            name: 'status'
        },

        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }

    ]

});

</script>

@endpush