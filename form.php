<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    #fileInput {
        display: none;
    }

    #fileInputLabel {
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
<body style="background-color: #f0f0f0;">
    <div class="container mt-3">
        <div style="background-color: #f0f0f0;">
            <form action="cv_create.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="login_username" value="<?php echo $user_name; ?>">

                <!-- Personal Details -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Personal Details
                    </div>

                    <div class="card-body">

                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="wanted_job">Wanted Job:</label>
                                <input type="text" class="form-control" name="wanted_job" value="<?php echo isset($wanted_job) ? $wanted_job : ''; ?>">
                            </div>
                            
                            <div class="col text-center">
                                <label id="fileInputLabel" for="fileInput" class="btn btn-primary" style="color:white">Choose File</label>
                                <input type="file" id="fileInput" class="form-control-file" name="upload_photo" accept="image/*" onchange="displayImage(this)">
                                <div class="mt-2" id="imageContainer">
                                    <img src="no_profile.jpg" alt="Temporary Profile Photo" id="upload_photo" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>">
                            </div>
                        </div>
                        
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" name="country" value="<?php echo isset($country) ? $country : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" value="<?php echo isset($city) ? $city : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="<?php echo isset($address) ? $address : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="date" class="form-control" name="date_of_birth" value="<?php echo isset($date_of_birth) ? $date_of_birth : ''; ?>">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Details -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Contact Details
                    </div>
                    
                    <div class="card-body">

                        <!-- Initial Contact Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control" name="phone_number[]" value="<?php echo isset($phone_numbers[0]) ? $phone_numbers[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="address" value="<?php echo isset($email) ? $address : ''; ?>">
                            </div>
                        </div>

                        <!-- Additional Contact Fields (Hidden by default) -->
                        <div class="additionalContactFields" style="display: none;">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="phone_number">Phone Numbers:</label>
                                    <input type="text" class="form-control" name="phone_number[]" pattern="\d{10}" placeholder="Please enter a 10-digit phone number" >
                                </div>
                            </div>
                        </div>
                        <?php for ($i = 1; $i < count($phone_numbers); $i++) { ?>
                            <div class="form-row mb-3 additionalContactFields">
                                <div class="col">
                                    <label for="phone_number">Additional Phone Number:</label>
                                    <input type="text" class="form-control" name="phone_number[]" value="<?php echo $phone_numbers[$i]; ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Add/Remove Buttons -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeContactFields(this)">Remove</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success" onclick="addContactFields()">Add Additional Contact</button>
                            </div>
                        </div>

                    </div>
                </div>
                
                <!-- Personal Summary/Profile -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
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
                                <textarea name="profile" placeholder="e.g Passionate science teacher with 8+ years of experience and a track record of ..." class="form-control" maxlength="200"><?php echo isset($profile) ? $profile : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Experience
                    </div>

                    <div class="card-body">

                        <!-- Initial Experience Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="exp_job">Job Title:</label>
                                <input type="text" class="form-control" name="exp_job[]" value="<?php echo isset($exp_jobs[0]) ? $exp_jobs[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="exp_startDay">Start Day:</label>
                                <input type="date" class="form-control" name="exp_startDay[]" value="<?php echo isset($exp_startDays[0]) ? $exp_startDays[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="exp_endDay">End Day:</label>
                                <input type="date" class="form-control" name="exp_endDay[]" value="<?php echo isset($exp_endDays[0]) ? $exp_endDays[0] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="exp_description">Personal Summary:</label>
                                <textarea name="exp_description[]" placeholder="e.g Create and implemented lesson plans based on child-led interests and curiosities." class="form-control" maxlength="200"><?php echo isset($exp_descriptions[0]) ? $exp_descriptions[0] : ''; ?></textarea>
                            </div>
                        </div>
                        <!-- Additional Experience Fields -->
                        <?php for ($i = 1; $i < count($exp_jobs); $i++) { ?>
                            <div class="form-row mb-3 additionalExperienceFields">
                                <div class="col">
                                    <label for="exp_job">Job Title:</label>
                                    <input type="text" class="form-control" name="exp_job[]" value="<?php echo $exp_jobs[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="exp_startDay">Start Day:</label>
                                    <input type="date" class="form-control" name="exp_startDay[]" value="<?php echo $exp_startDays[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="exp_endDay">End Day:</label>
                                    <input type="date" class="form-control" name="exp_endDay[]" value="<?php echo $exp_endDays[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="exp_description">Personal Summary:</label>
                                    <textarea name="exp_description[]" placeholder="e.g Create and implemented lesson plans based on child-led interests and curiosities." class="form-control" maxlength="200"><?php echo $exp_descriptions[$i]; ?></textarea>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Add/Remove Buttons -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeExperienceFields(this)">Remove</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success" onclick="addExperienceFields()">Add Additional Experience</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Education -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Education
                    </div>
                    <div class="card-body">

                        <!-- Initial Education Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="edu_school">School:</label>
                                <input type="text" class="form-control" name="edu_school[]" value="<?php echo isset($edu_schools[0]) ? $edu_schools[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="edu_degree">Degree:</label>
                                <input type="text" class="form-control" name="edu_degree[]" value="<?php echo isset($edu_degrees[0]) ? $edu_degrees[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="edu_startDay">Start Day:</label>
                                <input type="date" class="form-control" name="edu_startDay[]" value="<?php echo isset($edu_startDays[0]) ? $edu_startDays[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="edu_endDay">End Day:</label>
                                <input type="date" class="form-control" name="edu_endDay[]" value="<?php echo isset($edu_endDays[0]) ? $edu_endDays[0] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="edu_description">Description:</label>
                                <textarea name="edu_description[]" placeholder="e.g Graduated with honors." class="form-control" maxlength="200"><?php echo isset($edu_descriptions[0]) ? $edu_descriptions[0] : ''; ?></textarea>
                            </div>
                        </div>

                        <!-- Additional Education Fields (Hidden by default) -->
                        <?php for ($i = 1; $i < count($edu_schools); $i++) { ?>
                            <div class="form-row mb-3 additionalEducationFields">
                                <div class="col">
                                    <label for="edu_school">School:</label>
                                    <input type="text" class="form-control" name="edu_school[]" value="<?php echo $edu_schools[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="edu_degree">Degree:</label>
                                    <input type="text" class="form-control" name="edu_degree[]" value="<?php echo $edu_degrees[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="edu_startDay">Start Day:</label>
                                    <input type="date" class="form-control" name="edu_startDay[]" value="<?php echo $edu_startDays[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="edu_endDay">End Day:</label>
                                    <input type="date" class="form-control" name="edu_endDay[]" value="<?php echo $edu_endDays[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="edu_description">Description:</label>
                                    <textarea name="edu_description[]" placeholder="e.g Graduated with honors." class="form-control" maxlength="200"><?php echo $edu_descriptions[$i]; ?></textarea>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Add/Remove Buttons -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeEducationFields(this)">Remove</button>
                            </div>
                            <div class="col">
                            <button type="button" class="btn btn-success" onclick="addEducationFields()">Add Additional Education</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Certification -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Certification
                    </div>
                    <div class="card-body">

                        <!-- Initial Certification Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="certi_name">Certification Name:</label>
                                <input type="text" class="form-control" name="certi_name[]" value="<?php echo isset($certi_names[0]) ? $certi_names[0] : ''; ?>">
                            </div>
                            <div class="col">
                                <label for="certi_description">Description:</label>
                                <textarea name="certi_description[]" placeholder="e.g Certified Web Developer." class="form-control" maxlength="200"><?php echo isset($certi_descriptions[0]) ? $certi_descriptions[0] : ''; ?></textarea>
                            </div>
                        </div>

                        <!-- Additional Certification Fields (Hidden by default) -->
                        <?php for ($i = 1; $i < count($certi_names); $i++) { ?>
                            <div class="form-row mb-3 additionalCertificationFields">
                                <div class="col">
                                    <label for="certi_name">Certification Name:</label>
                                    <input type="text" class="form-control" name="certi_name[]" value="<?php echo $certi_names[$i]; ?>">
                                </div>
                                <div class="col">
                                    <label for="certi_description">Description:</label>
                                    <textarea name="certi_description[]" placeholder="e.g Certified Web Developer." class="form-control" maxlength="200"><?php echo $certi_descriptions[$i]; ?></textarea>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Add/Remove Buttons -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeCertificationFields(this)">Remove</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success" onclick="addCertificationFields()">Add Additional Certification</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Skill -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Skill
                    </div>
                    <div class="card-body">

                        <!-- Skill Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="skills">Skill:</label>
                                <input type="text" class="form-control" name="skills[]" value="<?php echo isset($skills[0]) ? $skills[0] : ''; ?>">
                            </div>
                        </div>

                        <!-- Additional Skill Fields -->
                        <?php for ($i = 1; $i < count($skills); $i++) { ?>
                            <div class="form-row mb-3 additionalSkillFields">
                                <div class="col">
                                    <label for="skills">Skill:</label>
                                    <input type="text" class="form-control" name="skills[]" value="<?php echo $skills[$i]; ?>">
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-danger" onclick="removeSkillFields(this)">Remove</button>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Add/Remove Buttons for Skill -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeSkillFields(this)">Remove</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success" onclick="addSkillFields()">Add Additional Skill</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Languages -->
                <div class="card mt-3">
                    <div class="card-header background-color: #f0f0f0;">
                        Languages
                    </div>
                    <div class="card-body">

                        <!-- Languages Fields -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="languages">Language (optional):</label>
                                <input type="text" class="form-control" name="languages[]" value="<?php echo isset($languages[0]) ? $languages[0] : ''; ?>">
                            </div>
                        </div>

                        
                        <!-- Additional Languages Fields -->
                        <?php for ($i = 1; $i < count($languages); $i++) { ?>
                            <div class="form-row mb-3 additionalLanguagesFields">
                                <div class="col">
                                    <label for="languages">Language (optional):</label>
                                    <input type="text" class="form-control" name="languages[]" value="<?php echo $languages[$i]; ?>">
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Add/Remove Buttons for Languages -->
                        <div class="form-row">
                            <div class="col">
                                <button type="button" class="btn btn-danger" onclick="removeLanguagesFields(this)">Remove</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success" onclick="addLanguagesFields()">Add Additional Language</button>
                            </div>
                        </div>

                    </div>
                </div>

                    <!-- Submit Button with Validation -->
                    <div class="form-row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            // Personal detail
            var wantedJob = document.getElementsByName("wanted_job")[0].value;
            var firstName = document.getElementsByName("first_name")[0].value;
            var lastName = document.getElementsByName("last_name")[0].value;
            var country = document.getElementsByName("country")[0].value;
            var city = document.getElementsByName("city")[0].value;
            var address = document.getElementsByName("address")[0].value;
            var dateOfBirth = document.getElementsByName("date_of_birth")[0].value;
            var uploadPhoto = document.getElementsByName("upload_photo")[0].value;
            // Contact
            var userPhoneNumberElements = document.getElementsByName("phone_number[]");

            // Profile
            var profileElement = document.getElementsByName("profile")[0];

            // Experience
            var expJobElements = document.getElementsByName("exp_job[]");
            var expStartElements = document.getElementsByName("exp_startDay[]");
            var expEndElements = document.getElementsByName("exp_endDay[]");
            var expDescriptionElements = document.getElementsByName("exp_description[]");

            // Education
            var eduSchoolElements = document.getElementsByName("edu_school[]");
            var eduDegreeElements = document.getElementsByName("edu_degree[]");
            var eduStartElements = document.getElementsByName("edu_startDay[]");
            var eduEndElements = document.getElementsByName("edu_endDay[]");
            var eduDescriptionElements = document.getElementsByName("edu_description[]");

            // Certification
            var certiNameElements = document.getElementsByName("certi_name[]");
            var certiDescriptionElements = document.getElementsByName("certi_description[]");

            // Check specific empty inputs
            if (wantedJob.trim() === '' || firstName.trim() === '' || lastName.trim() === '' || country.trim() === '' || city.trim() === ''|| address.trim() === ''|| dateOfBirth.trim() === ''|| uploadPhoto.trim() === '') {
                alert('Please fill in all required fields.');
                return false;
            }

            if (!checkFields(userPhoneNumberElements) ||
            !checkField(profileElement) ||
            !checkFields(expStartElements) ||
            !checkFields(expEndElements) ||
            !checkFields(expDescriptionElements) ||
            !checkFields(eduSchoolElements) ||
            !checkFields(eduDegreeElements) ||
            !checkFields(eduStartElements) ||
            !checkFields(eduEndElements) ||
            !checkFields(eduDescriptionElements) ||
            !checkFields(certiNameElements) ||
            !checkFields(certiDescriptionElements)) {
            alert("Please fill in all required fields.");
            return false;
            }
            return true;
        }

        function checkField(element) {
            return element.value.trim() !== "";
        }

        function checkFields(elements) {
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].offsetParent !== null && !checkField(elements[i])) {
                    return false;
                }
            }
            return true;
        }
    </script>

    <script>
        function submitForm() {
            if (validateForm()) {
                document.forms["cvForm"].submit();
            }
        }
    </script>

    <script>
        function displayImage(input) {
            var fileInput = input;
            var imgElement = document.getElementById('upload_photo');
            var containerElement = document.getElementById('imageContainer');
            var labelElement = document.getElementById('fileInputLabel');

            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                imgElement.src = e.target.result;
                containerElement.style.display = 'block';
            };

            reader.readAsDataURL(file);
            labelElement.innerText = 'Change File';
        }
    </script>

    <script>
        function addEducationFields() {
            var additionalEducationFields = document.querySelector('.additionalEducationFields');
            var newEducationFields = additionalEducationFields.cloneNode(true);

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

    <script>
        function addSkillFields() {
            var additionalSkillFields = document.querySelector('.additionalSkillFields');
            var newSkillFields = additionalSkillFields.cloneNode(true);

            // Reset values in the cloned fields
            newSkillFields.querySelectorAll('input').forEach(function (input) {
                input.value = '';
            });

            // Append the new fields and make them visible
            additionalSkillFields.parentNode.appendChild(newSkillFields);
            newSkillFields.style.display = 'block';
        }

        function removeSkillFields(button) {
            var additionalSkillFields = document.querySelectorAll('.additionalSkillFields');

            // Ensure there is at least one additional skill field
            if (additionalSkillFields.length > 1) {
                var lastSkillFields = additionalSkillFields[additionalSkillFields.length - 1];
                lastSkillFields.parentNode.removeChild(lastSkillFields);
            }
        }
    </script>

    <script>
        function addLanguagesFields() {
            var additionalLanguagesFields = document.querySelector('.additionalLanguagesFields');
            var newLanguagesFields = additionalLanguagesFields.cloneNode(true);

            // Reset values in the cloned fields
            newLanguagesFields.querySelectorAll('input').forEach(function (input) {
                input.value = '';
            });

            // Append the new fields and make them visible
            additionalLanguagesFields.parentNode.appendChild(newLanguagesFields);
            newLanguagesFields.style.display = 'block';
        }

        function removeLanguagesFields(button) {
            var additionalLanguagesFields = document.querySelectorAll('.additionalLanguagesFields');

            // Ensure there is at least one additional languages field
            if (additionalLanguagesFields.length > 1) {
                var lastLanguagesFields = additionalLanguagesFields[additionalLanguagesFields.length - 1];
                lastLanguagesFields.parentNode.removeChild(lastLanguagesFields);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
