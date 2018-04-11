
$(document).ready(function(){
    $('#forgotpwdForm').formValidation({
        framework: 'bootstrap4',
        icon:{
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields:{
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of aplphabetical, number and underscore'
                    }
                }
            },
            email:{
                validators: {
                    notEmpty: {
                        message: 'The email is required'
                    }
                }
            }
        }
    });
});


// var x="";
// $("#email").blur(function(e){
//     x=document.getElementById("email").value;
//     myfunctions();
// });

// $("#name").blur(function(e){
//     x=document.getElementById("email").value;
//     myfunctions();
// });

// function myfunctions() {
//     for(var i=0; i<5; i++){
//         console.log(x);
//     }
//     if (!x){
//         alert("ok");
//     }
// };

