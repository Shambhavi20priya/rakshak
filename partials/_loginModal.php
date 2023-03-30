
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Patient Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/rakshak/partials/_handleLogin.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="loginEmail">Patient Id</label>
                            <input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <label for="loginPass">Password</label>
                            <input type="password" class="form-control" id="loginPass" name="loginPass">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>