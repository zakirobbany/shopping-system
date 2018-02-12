<!-- Modal -->
<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalFilterLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="add-log-modal-label">Filter</h4>
            </div>

            <div class="modal-body">
                <form action="" class="form-horizontal">
                    <div class="form-group">
                        <label for="filter_name" class="control-label col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="filter_name" id="filter_name" value="">
                        </div>
                    </div><br>

                    <div class="form-action">
                        <button type="submit" class="btn btn-success">Filter</button>
                    </div>

                </form>
            </div>

            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div> --}}
        </div>
    </div>
</div>
