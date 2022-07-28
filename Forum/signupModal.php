<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an iForum Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="handleSignup.php" method="post">
                    <div class="mb-3">
                        <label for="emailSignup" class="form-label">Username</label>
                        <input type="text" class="form-control" id="emailSignup" name="emailSignup" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="passwordSignup" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordSignup" name="passwordSignup">
                    </div>
                    <div class="mb-3">
                        <label for="cpasswordSignup" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpasswordSignup" name="cpasswordSignup">
                    </div>
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>