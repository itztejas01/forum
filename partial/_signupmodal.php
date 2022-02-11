<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an iDiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partial/_handleSignup.php" method="post">
                <div class="modal-body">
                    <?php
                    if (isset($_GET['value']) && $_GET['value'] == 'false') {
                        echo 'please enter all the details';
                    }

                    ?>
                    <div class="form-group">
                        <label for="exampleInputTextarea1">Enter Your Full Name</label>

                        <input type="text" class="form-control" id="text_name" name="text_name" aria-describedby="namehelp" required>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                    </div>
                   
                    <div class="form-group">
                        <="form-check form-check-inline">
                        <input class="form-check-input my-2" type="radio" name="gender" id="gender" value="Female" required>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div clalabel for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="gender">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mx-2 my-2" type="radio" name="gender" id="gender" value="Male" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div classss="form-check form-check-inline">
                        <input class="form-check-input my-2" type="radio" name="gender" id="gender" value="Other" required>
                        <label class="form-check-label" for="inlineRadio2">Other</label>
                    </div>
                </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Signup</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>