$(document).ready(function() {
    $("#form").validate({
        rules: {
            title: 'required',
            description: 'required',
            fileToUpload:{
                required: true,
                accept:"jpg,png,jpeg,gif"

            }
        },
        messages: {
            title: 'This field is required.',
            description: 'This field is required.',
            fileToUpload: {
                required: "Promo image is required.",
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#editpromoform").validate({
        rules: {
            title: 'required',
            description: 'required',
            fileToUpload:{
                accept:"jpg,png,jpeg,gif"
            }
        },
        messages: {
            title: 'This field is required.',
            description: 'This field is required.',
            fileToUpload: {
                required: "Promo image is required.",
                accept: "Only image type jpg/png/jpeg/gif is allowed"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });


    $("#form-register-customer").validate({
        rules: {
            fname: 'required',
            lname: 'required',
            email:{
                required:true,
                email:true
            },
            username: 'required',

            password:{
                required: true,
                minlength:6


            },
            confirm:{
                required: true,
                equalTo: "#password"


            }

        },
        messages: {
            fname: 'This field is required',
            lname: 'This field is required',
            email: {
                required: 'This field is required'

            },
            username: 'This field is required',

            password: {
                required: 'This field is required'


            },
            confirm: {
                required: "This field is required."


            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('.deletemember').click(function() {

        if (confirm('Are you sure?')) {
            var url = $(this).attr('href');

            location.href=url;
        }
    });

    $('.saveconfirm').click(function() {

        if (confirm('Save edits?')) {
            var url = $(this).attr('href');

            location.href=url;
        }
    });



});


// Validating Image
//
// $('input[type="submit"]').prop("disabled", true);
// var a=0;
// //binds to onchange event of your input field
// $('#fileToUpload').bind('change', function() {
//     if ($('input:submit').attr('disabled',false)){
//         $('input:submit').attr('disabled',true);
//     }
//     var ext = $('#fileToUpload').val().split('.').pop().toLowerCase();
//     if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
//         $('#error1').slideDown("slow");
//         $('#error2').slideUp("slow");
//         a=0;
//     }else{
//         var picsize = (this.files[0].size);
//         if (picsize > 1000000){
//             $('#error2').slideDown("slow");
//             a=0;
//         }else{
//             a=1;
//             $('#error2').slideUp("slow");
//         }
//         $('#error1').slideUp("slow");
//         if (a==1){
//             $('input:submit').attr('disabled',false);
//         }
//     }
// });

