<?= $this->extend('template') ?>
<?= $this->section('content') ?>
    <h1 class="mt-4">CRUD</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-info" onclick="add_item()"><i class="bx bx-plus-medical"></i> Add</button>
                    <button class="btn btn-secondary" onclick="reload_table()"><i class="bx bx-refresh"></i> Reload</button>
                </div>
                <div class="card-body">
                    <table id="tblResults" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('modals') ?>
    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Rancho Orígen</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form" class="row g-3">
                        <input type="hidden" value="" name="Id"/>
                        <div class="col-12">
                            <label class="control-label">Name</label>
                            <div>
                                <input name="Name" placeholder="Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="control-label">Description</label>
                            <div>
                                <textarea name="Description" placeholder="Description" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<?= $this->include('crud/js') ?>
<?= $this->endSection() ?>