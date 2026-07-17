<div class="modal fade" id="addressModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            <form id="addressForm"
                  action="{{ route('address.store') }}"
                  method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                        Add Delivery Address
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    @include('frontend.address.form')

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-light"
                            data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit"
                            class="btn btn-warning">

                        <i class="fas fa-save me-1"></i>

                        Save Address

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>