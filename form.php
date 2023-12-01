<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color: rgb(243, 237, 237);">
    <div class="container mt-3">
        <div class="row">

            <!-- Personal Details -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Personal Details
                </div>

                <div class="card-body">
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="wanted_job">Wanted Job Title:</label>
                            <input type="text" class="form-control" name="wanted_job" placeholder="e.g Teacher" required>
                        </div>
                        <div class="col">
                            <label for="upload_photo">Profile Picture:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="upload_photo" name="upload_photo" accept="image/*" required>
                                    <label class="custom-file-label" for="upload_photo">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="upload_link">Upload</button>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center">
                            <img src="image/user.png" alt="Profile Picture" id="profile_image" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="col">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="col">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="email">Email Address:</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="col">
                            <label for="date_of_birth">Date Of Birth:</label>
                            <input type="date" class="form-control" name="date_of_birth" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Contact Details
                </div>
                
                <div class="card-body">

                    <!-- Initial Contact Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="phone_number">Phone Numbers:</label>
                            <input type="text" class="form-control" name="phone_number[]" pattern="\d{10}" title="Please enter a 10-digit phone number" required>
                        </div>
                    </div>

                    <!-- Additional Contact Fields (Hidden by default) -->
                    <div class="additionalContactFields" style="display: none;">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="phone_number">Additional Phone:</label>
                                <input type="text" class="form-control" name="phone_number[]" pattern="\d{10}" title="Please enter a 10-digit phone number">
                            </div>
                        </div>
                    </div>

                    <!-- Add/Remove Buttons -->
                    <div class="form-row">
                        <div class="col">
                            <button type="button" class="btn btn-danger" onclick="removeContactFields(this)">Remove</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" onclick="addContactFields()">Add More Contacts</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Personal Summary/Profile -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Profile
                </div>
                <div class="card-body">

                    <div class="form-row mb-3">
                        <div class="col">
                            <small>Write 2-4 short & energetic sentences to interest the leader! Mention your role, experience & most importantly - your biggest achievements, best qualities, and skills.</small>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="profile">Personal Summary:</label>
                            <textarea name="profile" placeholder="e.g Passionate science teacher with 8+ years of experience and a track record of ..." class="form-control" maxlength="200" required></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Experience -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Experience
                </div>
                <div class="card-body">

                    <!-- Initial Experience Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="exp_job">Job Title:</label>
                            <input type="text" class="form-control" name="exp_job[]" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="exp_startDay">Start Day:</label>
                            <input type="date" class="form-control" name="exp_startDay[]" required>
                        </div>
                        <div class="col">
                            <label for="exp_endDay">End Day:</label>
                            <input type="date" class="form-control" name="exp_endDay[]" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="exp_description">Personal Description:</label>
                            <textarea name="exp_description[]" placeholder="e.g Create and implemented lesson plans based on child-led interests and curiosities." class="form-control" maxlength="200" required></textarea>
                        </div>
                    </div>

                    <!-- Additional Experience Fields (Hidden by default) -->
                    <div class="additionalExperienceFields" style="display: none;">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="exp_job">Job Title:</label>
                                <input type="text" class="form-control" name="exp_job[]">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="exp_startDay">Start Day:</label>
                                <input type="date" class="form-control" name="exp_startDay[]">
                            </div>
                            <div class="col">
                                <label for="exp_endDay">End Day:</label>
                                <input type="date" class="form-control" name="exp_endDay[]">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="exp_description">Personal Description:</label>
                                <textarea name="exp_description[]" placeholder="e.g Create and implemented lesson plans based on child-led interests and curiosities." class="form-control" maxlength="200"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Add/Remove Buttons -->
                    <div class="form-row">
                        <div class="col">
                            <button type="button" class="btn btn-danger" onclick="removeExperienceFields(this)">Remove</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" onclick="addExperienceFields()">Add More Experiences</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Education -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Education
                </div>
                <div class="card-body">

                    <!-- Initial Education Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="edu_school">School:</label>
                            <input type="text" class="form-control" name="edu_school[]" required>
                        </div>
                        <div class="col">
                            <label for="edu_degree">Degree:</label>
                            <input type="text" class="form-control" name="edu_degree[]" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="edu_startDay">Start Day:</label>
                            <input type="date" class="form-control" name="edu_startDay[]" required>
                        </div>
                        <div class="col">
                            <label for="edu_endDay">End Day:</label>
                            <input type="date" class="form-control" name="edu_endDay[]" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="edu_description">Personal Description:</label>
                            <textarea name="edu_description[]" placeholder="e.g Graduated with High Honors." class="form-control" maxlength="200" required></textarea>
                        </div>
                    </div>

                    <!-- Additional Education Fields (Hidden by default) -->
                    <div class="additionalEducationFields" style="display: none;">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="edu_school">School:</label>
                                <input type="text" class="form-control" name="edu_school[]">
                            </div>
                            <div class="col">
                                <label for="edu_degree">Degree:</label>
                                <input type="text" class="form-control" name="edu_degree[]">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="edu_startDay">Start Day:</label>
                                <input type="date" class="form-control" name="edu_startDay[]">
                            </div>
                            <div class="col">
                                <label for="edu_endDay">End Day:</label>
                                <input type="date" class="form-control" name="edu_endDay[]">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="edu_description">Personal Description:</label>
                                <textarea name="edu_description[]" placeholder="e.g Graduated with High Honors." class="form-control" maxlength="200"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Add/Remove Buttons -->
                    <div class="form-row">
                        <div class="col">
                            <button type="button" class="btn btn-danger" onclick="removeEducationFields(this)">Remove</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" onclick="addEducationFields()">Add More Educations</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Certification -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Certification
                </div>
                <div class="card-body">

                    <!-- Initial Certification Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="certi_name">Certification Name:</label>
                            <input type="text" class="form-control" name="certi_name[]" required>
                        </div>
                        <div class="col">
                            <label for="certi_description">Certification Description:</label>
                            <input type="text" class="form-control" name="certi_description[]" required>
                        </div>
                    </div>

                    <!-- Additional Certification Fields (Hidden by default) -->
                    <div class="additionalCertificationFields" style="display: none;">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="certi_name">Certification Name:</label>
                                <input type="text" class="form-control" name="certi_name[]">
                            </div>
                            <div class="col">
                                <label for="certi_description">Certification Description:</label>
                                <input type="text" class="form-control" name="certi_description[]">
                            </div>
                        </div>
                    </div>

                    <!-- Add/Remove Buttons -->
                    <div class="form-row">
                        <div class="col">
                            <button type="button" class="btn btn-danger" onclick="removeCertificationFields(this)">Remove</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" onclick="addCertificationFields()">Add More Certifications</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Skill -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Skill
                </div>
                <div class="card-body">

                    <!-- Skill Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="user_skill">Personal Skill (optional):</label>
                            <textarea name="user_skill" maxlength="200" class="form-control" required></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Languages -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Languages
                </div>
                <div class="card-body">

                    <!-- Languages Fields -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="user_languages">Languages (optional):</label>
                            <textarea name="user_languages" class="form-control" required></textarea>
                        </div>
                    </div>

                </div>
            </div>
            

        </div>
    </div>
    <script>
        window.onload =function(){
            var inputEducationFields = document.querySelector('.additionalEducationFields').querySelectorAll('input, textarea');
            var inputContactFields = document.querySelector('.additionalContactFields').querySelectorAll('input, textarea');
            var inputExperienceFields = document.querySelector('.additionalExperienceFields').querySelectorAll('input, textarea');
            var inputCertificationFields = document.querySelector('.additionalCertificationFields').querySelectorAll('input, textarea');
            for (var i = 0; i < inputEducationFields.length; i++){
                inputEducationFields[i].disabled = true;
            }
            for (var i = 0; i < inputContactFields.length; i++){
                inputContactFields[i].disabled = true;
            }
            for (var i = 0; i < inputExperienceFields.length; i++){
                inputExperienceFields[i].disabled = true;
            }
            for (var i = 0; i < inputCertificationFields.length; i++){
                inputCertificationFields[i].disabled = true;
            }
        }
    </script>
    <script>
        function addEducationFields() {
            var additionalEducationFields = document.querySelector('.additionalEducationFields');
            var newEducationFields = additionalEducationFields.cloneNode(true);

            inputEducationFields = newEducationFields.getElementsByTagName("input");
            for (var i = 0; i < inputEducationFields.length; i++){
                inputEducationFields[i].disabled = false;
                inputEducationFields[i].required = true;
            }

            // Reset values in the cloned fields
            newEducationFields.querySelectorAll('input, textarea').forEach(function (input) {
                input.value = '';
            });

            // Append the new fields and make them visible
            additionalEducationFields.parentNode.appendChild(newEducationFields);
            newEducationFields.style.display = 'block';
        }

        function removeEducationFields(button) {
            var additionalEducationFields = document.querySelectorAll('.additionalEducationFields');

            // Ensure there is at least one additional education field
            if (additionalEducationFields.length > 1) {
                var lastEducationFields = additionalEducationFields[additionalEducationFields.length - 1];
                lastEducationFields.parentNode.removeChild(lastEducationFields);
            }
        }
    </script>

    <script>
    function addContactFields() {
        var additionalContactFields = document.querySelector('.additionalContactFields');
        var newContactFields = additionalContactFields.cloneNode(true);

        inputContactFields = newContactFields.getElementsByTagName("input");
        for (var i = 0; i < inputContactFields.length; i++){
            inputContactFields[i].disabled = false;
            inputContactFields[i].required = true;
        }
        // Reset values in the cloned fields
        newContactFields.querySelectorAll('input').forEach(function (input) {
            input.value = '';
        });

        // Append the new fields and make them visible
        additionalContactFields.parentNode.appendChild(newContactFields);
        newContactFields.style.display = 'flex';
    }

    function removeContactFields(button) {
        var additionalContactFields = document.querySelectorAll('.additionalContactFields');

        // Ensure there is at least one additional contact field
        if (additionalContactFields.length > 1) {
            var lastContactFields = additionalContactFields[additionalContactFields.length - 1];
            lastContactFields.parentNode.removeChild(lastContactFields);
        }
    }
    </script>

    <script>
        function addExperienceFields() {
            var additionalExperienceFields = document.querySelector('.additionalExperienceFields');
            var newExperienceFields = additionalExperienceFields.cloneNode(true);

            inputExperienceFields = newExperienceFields.getElementsByTagName("input");
            for (var i = 0; i < inputExperienceFields.length; i++){
                inputExperienceFields[i].disabled = false;
                inputExperienceFields[i].required = true;
            }
            // Reset values in the cloned fields
            newExperienceFields.querySelectorAll('input, textarea').forEach(function (input) {
                input.value = '';
            });

            // Append the new fields and make them visible
            additionalExperienceFields.parentNode.appendChild(newExperienceFields);
            newExperienceFields.style.display = 'block';
        }

        function removeExperienceFields(button) {
            var additionalExperienceFields = document.querySelectorAll('.additionalExperienceFields');

            // Ensure there is at least one additional experience field
            if (additionalExperienceFields.length > 1) {
                var lastExperienceFields = additionalExperienceFields[additionalExperienceFields.length - 1];
                lastExperienceFields.parentNode.removeChild(lastExperienceFields);
            }
        }
    </script>

    <script>
        function addCertificationFields() {
            var additionalCertificationFields = document.querySelector('.additionalCertificationFields');
            var newCertificationFields = additionalCertificationFields.cloneNode(true);

            inputCertificationFields = newCertificationFields.getElementsByTagName("input");
            for (var i = 0; i < inputCertificationFields.length; i++){
                inputCertificationFields[i].disabled = false;
                inputCertificationFields[i].required = true;
            }
            // Reset values in the cloned fields
            newCertificationFields.querySelectorAll('input').forEach(function (input) {
                input.value = '';
            });

            // Append the new fields and make them visible
            additionalCertificationFields.parentNode.appendChild(newCertificationFields);
            newCertificationFields.style.display = 'block';
        }

        function removeCertificationFields(button) {
            var additionalCertificationFields = document.querySelectorAll('.additionalCertificationFields');

            // Ensure there is at least one additional certification field
            if (additionalCertificationFields.length > 1) {
                var lastCertificationFields = additionalCertificationFields[additionalCertificationFields.length - 1];
                lastCertificationFields.parentNode.removeChild(lastCertificationFields);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
