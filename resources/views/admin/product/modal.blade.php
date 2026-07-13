<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-md-down">
<!-- <div class="modal-dialog modal-xl"> -->
        <div class="modal-content">

            <form id="productForm" enctype="multipart/form-data">
                    <input type="hidden" id="product_id" name="product_id">
                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Product
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <!-- Product Name -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Product Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="product_name"
                                name="product_name">

                            <div
                                class="invalid-feedback"
                                id="product_name_error">
                            </div>

                        </div>

                        <!-- Category -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Category <span class="text-danger">*</span>
                            </label>

                            <select
                                class="form-select"
                                id="category_id"
                                name="category_id">

                                <option value="">
                                    Select Category
                                </option>

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->category_name }}
                                    </option>

                                @endforeach

                            </select>

                            <div
                                class="invalid-feedback"
                                id="category_id_error">
                            </div>

                        </div>

                        <!-- SKU -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                SKU
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="sku"
                                name="sku">

                            <div
                                class="invalid-feedback"
                                id="sku_error">
                            </div>

                        </div>

                        <!-- Slug -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Slug
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="slug"
                                name="slug">

                            <div
                                class="invalid-feedback"
                                id="slug_error">
                            </div>

                        </div>

                        <!-- Price -->
                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Price
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                id="price"
                                name="price">

                            <div
                                class="invalid-feedback"
                                id="price_error">
                            </div>

                        </div>

                        <!-- Sale Price -->
                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Sale Price
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                id="sale_price"
                                name="sale_price">

                            <div
                                class="invalid-feedback"
                                id="sale_price_error">
                            </div>

                        </div>

                        <!-- Quantity -->
                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="qty"
                                name="qty">

                            <div
                                class="invalid-feedback"
                                id="qty_error">
                            </div>

                        </div>

                        <!-- Short Description -->
                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Short Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="3"
                                id="short_description"
                                name="short_description"></textarea>

                            <div
                                class="invalid-feedback"
                                id="short_description_error">
                            </div>

                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="5"
                                id="description"
                                name="description"></textarea>

                            <div
                                class="invalid-feedback"
                                id="description_error">
                            </div>

                        </div>

                        <!-- Thumbnail -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Thumbnail
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                id="thumbnail"
                                name="thumbnail"
                                accept="image/*">

                            <div
                                class="invalid-feedback"
                                id="thumbnail_error">
                            </div>

                        </div>

                        <!-- Gallery Images -->
                        <!-- <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Gallery Images
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                id="images"
                                name="images[]"
                                multiple
                                accept="image/*">

                            <div
                                class="invalid-feedback"
                                id="images_error">
                            </div>

                        </div> -->

                        <!-- Featured -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Featured
                            </label>

                            <select
                                class="form-select"
                                id="is_featured"
                                name="is_featured">

                                <option value="1">
                                    Yes
                                </option>

                                <option value="0">
                                    No
                                </option>

                            </select>

                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                class="form-select"
                                id="status"
                                name="status">

                                <option value="1">
                                    Active
                                </option>

                                <option value="0">
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        id="saveBtn"
                        class="btn btn-primary">

                        Save Product

                    </button>

                </div>

            </form>

        </div>

    </div>
<div id="thumbnailPreview" class="mt-2">



</div>
</div>