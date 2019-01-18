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
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de téléphone'
                    },
                    stringLength: {
                        min: 8,
                        max: 10,
                    }
                }
            },

            siren: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de SIREN valide'
                    },
                }
            },

            assurance: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de SIREN valide'
                    },
                }
            },

            description_activite: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de SIREN valide'
                    },
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
