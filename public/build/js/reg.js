$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'form[prenom]': {
                validators: {
                    stringLength: {
                        min: 2,
                        max: 10,
                    },
                    notEmpty: {
                        message: 'Veuillez saisir votre prénom'
                    }
                }
            },
            'form[nom]': {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Veuillez saisir votre nom'
                    }
                }
            },
            'form[motdepasse]': {
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
                    notEmpty: {
                        message: 'Confirmez votre mot de passe'
                    },
                    identical: {
                        field: 'password',
                        message: 'Le mot de passe et sa confirmation ne sont pas les mêmes'
                    }
                }
            },
            'form[mail]': {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre adresse e-mail'
                    },
                    emailAddress: {
                        message: 'Veuillez saisir une adresse e-mail valide'
                    }
                }
            },
            'form[telephone]': {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de téléphone'
                    },
                    stringLength: {
                        message:'Veuillez saisir un numéro de téléphone valide',
                        min: 8,
                        max: 10,
                    }
                }
            },

            'form[siren]': {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de SIREN valide'
                    },
                }
            },

            'form[assurance]': {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro d\'assurance'
                    },
                }
            },

            objet: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir l\'objet de votre demande'
                    },
                }
            },

/*            description_activite: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez saisir votre numéro de SIREN valide'
                    },
                }
            },*/




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
