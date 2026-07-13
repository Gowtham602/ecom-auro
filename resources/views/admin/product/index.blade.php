@extends('layouts.admin')

@section('title', 'Products')
@push('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/admin/product/products.css') }}">

@endpush
@section('content')


    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col-lg-6 col-md-6 col-12">

                            <h3 class=" head mb-1">
                                Products
                            </h3>

                            <small class="text-muted">
                                Manage Products
                            </small>

                        </div>

                        <div class="col-lg-6 col-md-6 col-12 text-md-end mt-3 mt-md-0">

                            <button type="button" class="btn btn-primary add-product-btn" data-bs-toggle="modal"
                                data-bs-target="#productModal">

                                <i class="fa fa-plus me-2"></i>

                                Add Product

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            @include('admin.product.table')

        </div>

    </div>

    @include('admin.product.modal')

@endsection

@push('scripts')

   <script>

$(document).ready(function () {

    /* ===============================
        RESET FORM
    =============================== */

    function resetProductForm() {

        $("#productForm")[0].reset();

        $("#product_id").val("");

        $("#thumbnailPreview").html("");

        $(".invalid-feedback").text("");

        $(".form-control").removeClass("is-invalid");

        $(".form-select").removeClass("is-invalid");

        $("#saveBtn")
            .text("Save Product")
            .prop("disabled", false);

    }

    /* ===============================
        ADD PRODUCT BUTTON
    =============================== */

    $(".add-product-btn").click(function () {

        resetProductForm();

    });

    /* ===============================
        MODAL CLOSE
    =============================== */

    $("#productModal").on("hidden.bs.modal", function () {

        resetProductForm();

    });

    /* ===============================
        EDIT PRODUCT
    =============================== */

    $(document).on("click", ".editBtn", function () {

        let id = $(this).data("id");

        resetProductForm();

        $.ajax({

            url: "{{ route('product.edit', ':id') }}".replace(":id", id),

            type: "GET",

            dataType: "json",

            beforeSend: function () {

                $("#saveBtn").text("Loading...");

            },

            success: function (response) {

                if (response.status) {

                    let product = response.product;

                    $("#product_id").val(product.id);

                    $("#category_id").val(product.category_id);

                    $("#product_name").val(product.product_name);

                    $("#slug").val(product.slug);

                    $("#sku").val(product.sku);

                    $("#short_description").val(product.short_description);

                    $("#description").val(product.description);

                    $("#price").val(product.price);

                    $("#sale_price").val(product.sale_price);

                    $("#qty").val(product.qty);

                    $("#is_featured").val(product.is_featured);

                    $("#status").val(product.status);

                    if(product.thumbnail){

                        $("#thumbnailPreview").html(

                            '<img src="{{ asset("uploads/products") }}/'+product.thumbnail+'" class="img-thumbnail" width="120">'

                        );

                    }

                    $("#saveBtn").text("Update Product");

                    var modal = new bootstrap.Modal(document.getElementById('productModal'));

                    modal.show();

                }

            },

            error:function(){

                toastr.error("Unable to load product.");

                resetProductForm();

            }

        });

    });

    /* ===============================
        STORE & UPDATE
    =============================== */

    $("#productForm").submit(function(e){

        e.preventDefault();

        let id=$("#product_id").val();

        let formData=new FormData(this);

        let url="";

        if(id==""){

            url="{{ route('product.store') }}";

        }else{

            url="{{ route('product.update',':id') }}".replace(':id',id);

            formData.append("_method","PUT");

        }

        $.ajax({

            url:url,

            type:"POST",

            data:formData,

            processData:false,

            contentType:false,

            headers:{
                "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
            },

            beforeSend:function(){

                $(".invalid-feedback").text("");

                $(".form-control").removeClass("is-invalid");

                $(".form-select").removeClass("is-invalid");

                $("#saveBtn").prop("disabled",true);

            },

            success:function(response){

                toastr.success(response.message);

                bootstrap.Modal.getInstance(document.getElementById("productModal")).hide();

                resetProductForm();

                $("#productTable").DataTable().ajax.reload(null,false);

            },

            error:function(xhr){

                $("#saveBtn").prop("disabled",false);

                if(xhr.status==422){

                    $.each(xhr.responseJSON.errors,function(key,value){

                        $("#"+key).addClass("is-invalid");

                        $("#"+key+"_error").text(value[0]);

                    });

                }else{

                    toastr.error("Something went wrong.");

                }

            }

        });

    });

    /* ===============================
        DATATABLE
    =============================== */

    $("#productTable").DataTable({

        processing:true,

        serverSide:true,

        ajax:"{{ route('product.list') }}",

        columns:[

            {
                data:'DT_RowIndex',
                name:'DT_RowIndex',
                searchable:false,
                orderable:false
            },

            {
                data:'thumbnail',
                name:'thumbnail',
                searchable:false,
                orderable:false
            },

            {
                data:'product_name',
                name:'product_name'
            },

            {
                data:'category',
                name:'category.category_name'
            },

            {
                data:'sku',
                name:'sku'
            },

            {
                data:'price',
                name:'price'
            },

            {
                data:'sale_price',
                name:'sale_price'
            },

            {
                data:'qty',
                name:'qty'
            },

            {
                data:'featured',
                name:'featured',
                searchable:false,
                orderable:false
            },

            {
                data:'status',
                name:'status',
                searchable:false,
                orderable:false
            },

            {
                data:'action',
                name:'action',
                searchable:false,
                orderable:false
            }

        ]

    });

});

</script>

@endpush