$(document).ready(function() {
    var validator = $('#cadastrar').validate({
        rules: {
            name: {
                required: true,
                maxlength: 100,
                minlength: 10,
                minWords: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required:true,
                maxlength: 15,
                minlength: 10
            },
            username: {
                required: true,
                maxlength: 12,
                minlength: 4,
            },
            password: {
                required: true,
                maxlength: 12,
                minlength: 6
            },
            password2: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                remote: 'Esse username já está em uso.'
            }
        }

    });
    validator.resetForm();
});