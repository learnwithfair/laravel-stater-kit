<div class="card">
    <div class="card-body">
        <h4 class="card-title text-info">Upload Logo</h4>
        <hr><br><br>
        <form action="" class="forms-sample" id="add_logo" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-form-label col-xl-3 col-md-3 col-sm-12">Logo</label>

                <div class="col-xl-9 col-md-9 col-sm-12">

                    <div class="input-group">
                        <input type="file" class="form-control" name="logo" id="logo"
                            accept="image/png,image/jpg,image/jpeg" placeholder="Upload Logo">
                        <span class="input-group-text btn btn-info" for="inputGroupFile02">Upload</span>

                    </div>

                </div>
            </div>
            <div id="addLogobtn" class="me-2 mt-5 float-end">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>

        </form>
    </div>
</div>
