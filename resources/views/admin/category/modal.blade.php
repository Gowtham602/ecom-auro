<div class="modal fade" id="categoryModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form
                id="categoryForm"
                enctype="multipart/form-data">
                <input type="hidden" id="category_id" name="category_id">
                @csrf

                <div class="modal-header">

                    <h5 id="modalTitle">Add Category</h5>

                    <button
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Category Name</label>

                            <input
                                type="text"
                                name="category_name"
                                id="category_name"
                                class="form-control">

                            <small
                                class="text-danger"
                                id="category_name_error">
                            </small>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Slug</label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control">

                            <small
                                class="text-danger"
                                id="slug_error">
                            </small>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Image</label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control">

                            <small
                                class="text-danger"
                                id="image_error">
                            </small>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Status</label>

                            <select
                                name="status"
                                class="form-select">

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
                        type="submit"
                        class="btn btn-success">

                        Save

                    </button>

                    <button
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>