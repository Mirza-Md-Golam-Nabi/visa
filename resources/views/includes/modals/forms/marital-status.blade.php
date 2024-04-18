<div class="modal fade" id="storeMaritalStatusFormModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marital Status Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('marital-statuses.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="marital-status-title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="marital-status-title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
