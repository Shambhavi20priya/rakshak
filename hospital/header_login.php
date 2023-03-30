<?php
include_once '../assets/conn/dbconnect.php';

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rakshak</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <!-- <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .availability-form {
      margin-top: -50px;
      z-index: 3;
      position: relative;
    }

    * {
      font-family: 'Poppins', sans-serif;
    }

    .h-font {
      font-family: 'Merienda', cursive;
    }

    #home:hover {
      background-color: black;
      color: white;
    }

    @media screen and (max-width:575px) {
      .availability-form {
        margin-top: 0px;
        padding: 0 35px;
      }

    }
  </style>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shaodw-sm sticky-top">
    <div class="container-fluid">
      <img src="assets/img/logo.png" alt="Rakshak" width="150px">
      <pre>  </pre>
      <a class="navbar-brand me-5 fw-bold fs-2 h-font" href="index.php">Rakshak</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link active me-2" id="home" aria-current="page" href="project.php">Home</a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link me-2" href="#contact">Contact Us</a>
          </li>
           -->
        </ul>
        <form class="d-flex">
          <?php
          if (isset($_SESSION['hospitalloggedin']) && $_SESSION['hospitalloggedin'] == true) {
            echo '
            <a href="patient/patient.php" class="btn btn-outline-dark shadow-none me-lg-3 me-2">' . $_SESSION['hospitalSession'] . '</a>';
          } else
            echo '<a href="../hospitallogin.php" type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login
          </a>';
          ?>
          <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#RegisterModal">
            Register
          </button>

        </form>
      </div>
    </div>
  </nav>


  </div>



  <div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form method="post" autocomplete="off" action="handleadminhospital.php">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill"></i>
              <pre> </pre>User Registration
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge bg-light text-dark ">
              Note: Kindly provide correct information, as it will be cross-checked by govenment database.
            </span>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Hospital Name</label>
                  <input type="text" name="hname" class="form-control shadow-none">
                </div>
                <br>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Accreditation</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accreditation" id="inlineRadio1" value="Government">
                    <label class="form-check-label" for="inlineRadio1">Government</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accreditation" id="inlineRadio2" value="Private">
                    <label class="form-check-label" for="inlineRadio2">Private</label>
                  </div>
                </div>
                <div class="col-md-6 ps-0">
                  <label class="form-label">Health Care Provider Type: </label>
                  <div class="form-check">
                    <input class="form-check-input" name="hctype" type="radio" value="Hospital">
                    <label class="form-check-label" for="defaultCheck1">
                      Hospital
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hctype" value="Nursing Home">
                    <label class="form-check-label" for="defaultCheck1">
                      Nursing Home
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hctype" value="Medical College">
                    <label class="form-check-label" for="defaultCheck3">
                      Medical College/Institute
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hctype" value="Clinic">
                    <label class="form-check-label" for="defaultCheck4">
                      Clinic
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hctype" value="Others">
                    <label class="form-check-label" for="defaultCheck5">
                      Others
                    </label>
                  </div>
                </div>

                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Upload Image(After Registration)</label>
                  <input type="file" name="pimage" class="form-control shadow-none" disabled>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="pass" autocomplete="new-password" id="password" class="form-control shadow-none" required>
                </div>
                
                <!-- ----------------- -->
                
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Hospital Reg. Number</label>
                  
                  <input type="number" id="username" name="hno" class="form-control shadow-none" required>
                  
                </div>
                <div class="col-md-12 ps-0 mb-3" id="messages" style="font-weight:bold;color:red">
                  
                </div>
                <!-- ----------------- -->
                <!-- --------------------- -->
                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Hospital Address</label>
                  <input type="text" name="address" class="form-control shadow-none" required>
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">State</label>
                  <input type="text" name="state" id="state" value="" class="form-control shadow-none" required>
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">District</label>
                  <input type="text" name="district" id="district" value="" class="form-control shadow-none"required>
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Town</label>
                  <input type="text" name="town" id="town" value="" class="form-control shadow-none">
                </div>



                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Pincode</label>
                  <input type="text" name="pincode" id="pincode" class="form-control shadow-none" required>
                  <input type="button" class="btn btn-primary my-2" value="Get details" onclick="get_details()">
                </div>


                <!-- ------------------
                ------------------- -->

                <div class="col-md-6 ps-0">
                  <label class="form-label">Hospital Email</label>
                  <input type="email" name="email" class="form-control shadow-none" required>
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Telephone/Landline Number</label>
                  <input type="number" name="phone" class="form-control shadow-none" required>
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Mobile No.</label>
                  <input type="number" name="mobile" class="form-control shadow-none">
                </div>



                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Ambulance Phone No.</label>
                  <input type="number" name="ambulance" class="form-control shadow-none">
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Helpline No.</label>
                  <input type="number" name="helpline" class="form-control shadow-none">
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Website</label>
                  <input type="url" name="website" class="form-control shadow-none" placeholder=".com">
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Specialities :</label><br>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="speciality[]" value="Anaesthesiology" id="defaultCheck6">
                    <label class="form-check-label" for="defaultCheck1">
                      Anaesthesiology
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="speciality[]" value="Anatomy" id="defaultCheck7">
                    <label class="form-check-label" for="defaultCheck1">
                      Anatomy
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Dental" name="speciality[]" id="defaultCheck8">
                    <label class="form-check-label" for="defaultCheck1">
                      Dental
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Neurology" name="speciality[]" id="defaultCheck9">
                    <label class="form-check-label" for="defaultCheck1">
                      Neurology
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Psychiatry" name="speciality[]" id="defaultCheck10">
                    <label class="form-check-label" for="defaultCheck1">
                      Psychiatry
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Pediatrics" name="speciality[]" id="defaultCheck11">
                    <label class="form-check-label" for="defaultCheck1">
                      Pediatrics
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Kidney Transplant" name="speciality[]" id="defaultCheck12">
                    <label class="form-check-label" for="defaultCheck1">
                      Kidney Transplant
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" name="speciality[]" type="checkbox" value="Cardiology" id="defaultCheck13">
                    <label class="form-check-label" for="defaultCheck1">
                      Cardiology
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Orthopedics" name="speciality[]" id="defaultCheck14">
                    <label class="form-check-label" for="defaultCheck1">
                      Orthopedics
                    </label>
                  </div>
                </div>


                

<li style="list-style: none;"></li>

                <!-- ------------------
------------------ -->


              </div>
            </div>
            </fieldset>

            <div class="text-center my-1">
              <button type="submit" name="register" class="btn btn-dark shadow-none me-lg-2 me-3">
                Register
              </button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script>
            jQuery(document).ready(function () {
            var options = {
                
                onKeyUp: function (evt) {
                    $(evt.target).pwstrength("outputErrorList");
                }
            };
            $(':password').pwstrength(options);
        });



(function ($) {
    "use strict";

    var options = {
            errors: [],
            // Options
            minChar: 8,
            errorMessages: {
                password_to_short: "The Password is too short",
                same_as_username: "Your password cannot be the same as your username"
            },
            scores: [17, 26, 40, 50],
            verdicts: ["Weak", "Normal", "Medium", "Strong", "Very Strong"],
            showVerdicts: true,
            raisePower: 1.4,
            usernameField: "#username",
            onLoad: undefined,
            onKeyUp: undefined,
            viewports: {
                progress: undefined,
                verdict: undefined,
                errors: undefined
            },
            // Rules stuff
            ruleScores: {
                wordNotEmail: -100,
                wordLength: -100,
                wordSimilarToUsername: -100,
                wordLowercase: 1,
                wordUppercase: 3,
                wordOneNumber: 3,
                wordThreeNumbers: 5,
                wordOneSpecialChar: 3,
                wordTwoSpecialChar: 5,
                wordUpperLowerCombo: 2,
                wordLetterNumberCombo: 2,
                wordLetterNumberCharCombo: 2
            },
            rules: {
                wordNotEmail: true,
                wordLength: true,
                wordSimilarToUsername: true,
                wordLowercase: true,
                wordUppercase: true,
                wordOneNumber: true,
                wordThreeNumbers: true,
                wordOneSpecialChar: true,
                wordTwoSpecialChar: true,
                wordUpperLowerCombo: true,
                wordLetterNumberCombo: true,
                wordLetterNumberCharCombo: true
            },
            validationRules: {
                wordNotEmail: function (options, word, score) {
                    return word.match(/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i) && score;
                },
                wordLength: function (options, word, score) {
                    var wordlen = word.length,
                        lenScore = Math.pow(wordlen, options.raisePower);
                    if (wordlen < options.minChar) {
                        lenScore = (lenScore + score);
                        options.errors.push(options.errorMessages.password_to_short);
                    }
                    return lenScore;
                },
                wordSimilarToUsername: function (options, word, score) {
                    var username = $(options.usernameField).val();
                    if (username && word.toLowerCase().match(username.toLowerCase())) {
                        options.errors.push(options.errorMessages.same_as_username);
                        return score;
                    }
                    return true;
                },
                wordLowercase: function (options, word, score) {
                    return word.match(/[a-z]/) && score;
                },
                wordUppercase: function (options, word, score) {
                    return word.match(/[A-Z]/) && score;
                },
                wordOneNumber : function (options, word, score) {
                    return word.match(/\d+/) && score;
                },
                wordThreeNumbers : function (options, word, score) {
                    return word.match(/(.*[0-9].*[0-9].*[0-9])/) && score;
                },
                wordOneSpecialChar : function (options, word, score) {
                    return word.match(/.[!,@,#,$,%,\^,&,*,?,_,~]/) && score;
                },
                wordTwoSpecialChar : function (options, word, score) {
                    return word.match(/(.*[!,@,#,$,%,\^,&,*,?,_,~].*[!,@,#,$,%,\^,&,*,?,_,~])/) && score;
                },
                wordUpperLowerCombo : function (options, word, score) {
                    return word.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && score;
                },
                wordLetterNumberCombo : function (options, word, score) {
                    return word.match(/([a-zA-Z])/) && word.match(/([0-9])/) && score;
                },
                wordLetterNumberCharCombo : function (options, word, score) {
                    return word.match(/([a-zA-Z0-9].*[!,@,#,$,%,\^,&,*,?,_,~])|([!,@,#,$,%,\^,&,*,?,_,~].*[a-zA-Z0-9])/) && score;
                }
            }
        },

        setProgressBar = function ($el, score) {
            var options = $el.data("pwstrength"),
                progressbar = options.progressbar,
                $verdict;

            if (options.showVerdicts) {
                if (options.viewports.verdict) {
                    $verdict = $(options.viewports.verdict).find(".password-verdict");
                } else {
                    $verdict = $el.parent().find(".password-verdict");
                    if ($verdict.length === 0) {
                        $verdict = $('<span class="password-verdict progress-bar"></span>');
                        $verdict.insertAfter($el);
                    }
                }
            }

            if (score < options.scores[0]) {
                progressbar.addClass("bg-danger").removeClass("bg-warning").removeClass("bg-success");
                progressbar.find(".bar").css("width", "5%");
                if (options.showVerdicts) {
                    $verdict.text(options.verdicts[0]);
                }
            } else if (score >= options.scores[0] && score < options.scores[1]) {
                progressbar.addClass("bg-danger").removeClass("bg-warning").removeClass("bg-success");
                progressbar.find(".bar").css("width", "25%");
                if (options.showVerdicts) {
                    $verdict.text(options.verdicts[1]);
                }
            } else if (score >= options.scores[1] && score < options.scores[2]) {
                progressbar.addClass("bg-warning").removeClass("bg-danger").removeClass("bg-success");
                progressbar.find(".bar").css("width", "50%");
                if (options.showVerdicts) {
                    $verdict.text(options.verdicts[2]);
                }
            } else if (score >= options.scores[2] && score < options.scores[3]) {
                progressbar.addClass("bg-warning").removeClass("bg-danger").removeClass("bg-success");
                progressbar.find(".bar").css("width", "75%");
                if (options.showVerdicts) {
                    $verdict.text(options.verdicts[3]);
                }
            } else if (score >= options.scores[3]) {
                progressbar.addClass("bg-success").removeClass("bg-warning").removeClass("bg-danger");
                progressbar.find(".bar").css("width", "100%");
                if (options.showVerdicts) {
                    $verdict.text(options.verdicts[4]);
                }
            }
        },

        calculateScore = function ($el) {
            var self = this,
                word = $el.val(),
                totalScore = 0,
                options = $el.data("pwstrength");

            $.each(options.rules, function (rule, active) {
                if (active === true) {
                    var score = options.ruleScores[rule],
                        result = options.validationRules[rule](options, word, score);
                    if (result) {
                        totalScore += result;
                    }
                }
            });
            setProgressBar($el, totalScore);
            return totalScore;
        },

        progressWidget = function () {
            return '<div class="progress"><div class="bar"></div></div>';
        },

        methods = {
            init: function (settings) {
                var self = this,
                    allOptions = $.extend(options, settings);

                return this.each(function (idx, el) {
                    var $el = $(el),
                        progressbar,
                        verdict;

                    $el.data("pwstrength", allOptions);

                    $el.on("keyup", function (event) {
                        var options = $el.data("pwstrength");
                        options.errors = [];
                        calculateScore.call(self, $el);
                        if ($.isFunction(options.onKeyUp)) {
                            options.onKeyUp(event);
                        }
                    });

                    progressbar = $(progressWidget());
                    if (allOptions.viewports.progress) {
                        $(allOptions.viewports.progress).append(progressbar);
                    } else {
                        progressbar.insertAfter($el);
                    }
                    progressbar.find(".bar").css("width", "0%");
                    $el.data("pwstrength").progressbar = progressbar;

                    if (allOptions.showVerdicts) {
                        verdict = $('<span class="password-verdict">' + allOptions.verdicts[0] + '</span>');
                        if (allOptions.viewports.verdict) {
                            $(allOptions.viewports.verdict).append(verdict);
                        } else {
                            verdict.insertAfter($el);
                        }
                    }

                    if ($.isFunction(allOptions.onLoad)) {
                        allOptions.onLoad();
                    }
                });
            },

            destroy: function () {
                this.each(function (idx, el) {
                    var $el = $(el);
                    $el.parent().find("span.password-verdict").remove();
                    $el.parent().find("div.progress").remove();
                    $el.parent().find("ul.error-list").remove();
                    $el.removeData("pwstrength");
                });
            },

            forceUpdate: function () {
                var self = this;
                this.each(function (idx, el) {
                    var $el = $(el),
                        options = $el.data("pwstrength");
                    options.errors = [];
                    calculateScore.call(self, $el);
                });
            },

            outputErrorList: function () {
                this.each(function (idx, el) {
                    // var output = '<ul class="error-list">',
                        $el = $(el),
                        errors = $el.data("pwstrength").errors,
                        viewports = $el.data("pwstrength").viewports,
                        verdict;
                    $el.parent().find("ul.error-list").remove();

                    if (errors.length > 0) {
                        $.each(errors, function (i, item) {
                            // output += '<li style="list-style: none;">' + item + '</li>';
                        });
                        // output += '</ul>';
                        if (viewports.errors) {
                            $(viewports.errors).html(output);
                        } else {
                            output = $(output);
                            verdict = $el.parent().find("span.password-verdict");
                            if (verdict.length > 0) {
                                el = verdict;
                            }
                            output.insertAfter(el);
                        }
                    }
                });
            },

            addRule: function (name, method, score, active) {
                this.each(function (idx, el) {
                    var options = $(el).data("pwstrength");
                    options.rules[name] = active;
                    options.ruleScores[name] = score;
                    options.validationRules[name] = method;
                });
            },

            changeScore: function (rule, score) {
                this.each(function (idx, el) {
                    $(el).data("pwstrength").ruleScores[rule] = score;
                });
            },

            ruleActive: function (rule, active) {
                this.each(function (idx, el) {
                    $(el).data("pwstrength").rules[rule] = active;
                });
            }
        };

    $.fn.pwstrength = function (method) {
        var result;
        if (methods[method]) {
            result = methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === "object" || !method) {
            result = methods.init.apply(this, arguments);
        } else {
            $.error("Method " +  method + " does not exist on jQuery.pwstrength");
        }
        return result;
    };
}(jQuery));
</script>
  <script>
        function get_details() {
            var pincode = jQuery('#pincode').val();
            if (pincode == '') {
                jQuery('#district').val('');
                jQuery('#state').val('');
                jQuery('#town').val('');
            } else {
                jQuery.ajax({
                    url: 'get.php',
                    type: 'post',
                    data: 'pincode=' + pincode,
                    success: function(data) {
                         if (data=='no') {
                            alert('Wrong pincode');
                            jQuery('#district').val('');
                            jQuery('#state').val('');
                            jQuery('#town').val('');
                         }
                         else
                         {
                             var getData =$.parseJSON(data);
                             jQuery('#district').val(getData.district);
                             jQuery('#state').val(getData.state);
                             jQuery('#town').val(getData.town);
                        }
                        

                    }
                })
            }
        }
    </script>
</body>