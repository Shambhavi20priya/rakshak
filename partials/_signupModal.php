<div class="modal modal-signin" tabindex="-1" aria-labelledby="signupModalLabel" id="signupModal" aria-hidden="true">
  <div class="modal-dialog" style=" width: 600px;
  transition: bottom .75s ease-in-out;" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Patient Sign up </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form action="/rakshak/partials/_handleSignup.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="patientFirstName" name="patientFirstName" placeholder="First Name" aria-describedby="patientLastName" required>
            <label for="patientFirstName">First Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="patientLastName" name="patientLastName" placeholder="Last Name" aria-describedby="emailHelp" required>
            <label for="patientLastName">Last Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control rounded-3" id="patientDOB" name="patientDOB" placeholder="Date of Birth" aria-describedby="DOB" required>
            <label for="patientDOB">Date of Birth</label>
          </div>
          <div class="form-floating mb-3">
          <h6 class="mb-2">Gender: </h6>
            <div class="form-check form-check-inline mb-3 me-4">
                    <input class="form-check-input" type="radio" name="patientGender" id="patientGender"
                      value="female" />
                    <label class="form-check-label" for="patientGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-3 me-4">
                    <input class="form-check-input" type="radio" name="patientGender" id="patientGender"
                      value="male" />
                    <label class="form-check-label" for="patientGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="patientGender" id="patientGender"
                      value="other" />
                    <label class="form-check-label" for="patientGender">Other</label>
                  </div>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="signupEmail" name="signupEmail" placeholder="name@example.com" aria-describedby="emailHelp" required>
            <label for="signupEmail">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="signupPassword" name="signupPassword" placeholder="Password">
            <label for="signupPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="signupcPassword" name="signupcPassword" placeholder="Confirm Password" required>
            <label for="signupcPassword">Confirm Password</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
</div>