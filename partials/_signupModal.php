<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
  SignUp Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModal">Sign Up / Create an Healthify Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="/partials/_handleSignup.php" method="POST" class="needs-validation" novalidate>

                <div class="modal-body ">

                    <div class="d-flex justify-content-left">

                        <div class="mb-3 col-md-5">

                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control col-15" autofocus id="fullname"
                                aria-describedby="fullname" name="fullname" required>
                            <div class="invalid-feedback">
                                Please provide a valid div
                            </div>
                        </div>

                        <!-- <div class="mb-3 col-md-2">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control col-12 " id="age" aria-describedby="age" name="age" required>
                            <div class="invalid-feedback">
                                Please provide a valid Age.
                            </div>
                        </div> -->

                        <?php  require '_dob.php' ?>







                        <!-- <div class="mb-3 col-md-5">
                            <label for="" class="form-label" required>Appointment Type</label>
                            <div class="form-check">
                                <label class="form-check-label" for="a_type">
                                    <input class=" form-check-input " type="radio" name="a_type" id="a_type" value="New" >
                                    New
                                </label>

                                <br>
                                <input class="form-check-input" type="radio" name="a_type" id="a_type2" value="Visited in Last 14 days">
                                <label class="form-check-label" for="a_type2">
                                    Visited in Last 14 Days.
                                </label>
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Appointment Type.
                            </div>
                        </div> -->

                    </div>



                    <div class="d-flex  justify-content-left row">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control col-7 " id="location" aria-describedby="location"
                                name="location" required>
                            <div class="invalid-feedback">
                                Please provide a valid Location.
                            </div>
                        </div>
                    </div>






                    <div class="mb-3 col-md-12 form-inline">


                        <input type="hidden" name="country" id="countryId" value="IN" />

                        <div class="form-group col-6">
                            <label for="stateId" class="form-label">Select State : </label>
                            <select name="state" class="states order-alpha mt-1 form-select " id="stateId">
                                <option value="">Select State</option>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="cityId" class="form-label ">Select City :</label>
                            <select name="city" class="cities order-alpha mt-1 form-select" id="cityId">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>









                    <div class="mb-3 form-group">
                        <label for="signupEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control col-7" id="signupEmail" aria-describedby="emailHelp"
                            name="signupEmail" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email ID
                        </div>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control col-7" id="signupPassword" name="signupPassword"
                            placeholder="Enter a Dummy Password" required>
                        <div class="invalid-feedback">
                            Please provide a valid Password.
                        </div>

                    </div>

                    <div class="mb-3 form-group">
                        <label for="signupcPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control col-7" id="signupcPassword" name="signupcPassword"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Password.
                        </div>

                    </div>
                </div>

                <div class="modal-footer align-left justify-content-start">
                    <button type="submit" class="btn btn-danger fw-bold" style="background-color: #FC810C;">Sign
                        Up</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </form>

        </div>
    </div>
</div>