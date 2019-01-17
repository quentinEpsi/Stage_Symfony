$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            prenom: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Veuillez saisir votre prénom'
                    }
                }
            },
            nom: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Veuillez saisir votre nom'
                    }
                }
            },
            user_name: {
                validators: {
                    stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Veuillez saisir un nom d\'utilisateur'
                    }
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Entrez un mot de passe'
                    }
                }
            },
            confirm_password: {
                validators: {
                    stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Confirmez votre mot de passe'
                    }
                }
            },
            mail: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre adresse e-mail'
                    },
                    emailAddress: {
                        message: 'Veuillez saisir une adresse e-mail valide'
                    }
                }
            },
            telephone: {
                validators: {
                    stringLength: {
                        min: 8,
                        max: 10,
                        notEmpty: {
                            message: 'Veuillez saisir votre numéro de téléphone'
                        }
                    }
                }
            },
            campus: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez indiquer votre campus'
                    }
                }
            },

            classe: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez indiquer votre classe'
                    }
                }
            },

            datenaissance: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez indiquer votre date de naissance'
                    },
                    date:{
                        format: 'YYYY-MM-DD',
                        message: 'Cette date n\'est pas au bon format'
                    }
                }
            },

        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
