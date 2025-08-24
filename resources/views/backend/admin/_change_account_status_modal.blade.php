<div class="modal fade bd-example-modal-sm" id="accountStatusmodal" tabindex="-1" role="dialog" aria-labelledby="accountStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="post" id="account_status_modal_clear">
                @csrf
                <div class="modal-title">
                    <input type="hidden" name="account_status_id" id="account_status_id">
                    <input type="hidden" name="account_enabled" id="account_enabled">
                    <div class="text-center">
                        <img src="{{ asset('backend/assets/icon/warning.png') }}" class="img-fluid" alt="Warning">
                    </div>
                    <br>
                    <h5 id="account_status_title"></h5>
                    <p id="account_status_description"></p>
                </div>
                <br>
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="margin:0 10px">No</button>
                    <button type="submit" class="btn btn-danger account_status btn-sm" data-bs-dismiss="modal" style="margin:0 10px">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
