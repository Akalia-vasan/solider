
const msgs = {
    login_first: 'Please login before continuing',
    csrf: "CSRF TOKEN MISMATCH! please reload this page.",
    addressError: 'Please select an Address before continuing',
    loader: '<i class="fa fa-refresh fa-spin"></i>'
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#login").submit((e) => {
    e.preventDefault();
    let email = $("#loginEmail");
    let pwd = $("#loginPassword");
    email.removeClass('ErrorMsg');
    pwd.removeClass('ErrorMsg');
    $('#loginEmail + p').remove();
    $('#loginPassword + p').remove();
    if(email.val() == null || email.val() == '' || email.val().length <= 0){

        email.addClass('ErrorMsg').after(`<p>Email Is required</p>`);

    }
    if(pwd.val() == null || pwd.val() == '' || pwd.val().length <= 0){

        pwd.addClass('ErrorMsg').after(`<p>Password Is required</p>`);

    }
    $("._login").html('<i class="fa fa-spin fa-refresh"></i>');
    $.ajax({
        type : 'POST',
        data : {
            email : email.val(),
            password : pwd.val()
        },
        url: urls.login,
        success:function(e){
            toastr.success('Successfully, Logged In').fadeOut('2000');
            window.location.href = "http://localhost/solid/public/";
        },
        error:function(w){
            $("._login").html("Login");
            if(w.status == 419){
                //toastr.error(msgs.csrf);
                // toastr.error("CSRF TOKEN MISMATCH! please reload the page.")
            }
            // console.log(w.responseJSON.errors);'
            if(pwd.val() != '' && email.val() != '' && email.val().length >= 0)
            {
                email.addClass('ErrorMsg').after(`<p>These credentials do not match our records.</p>`);
            }

            var response = w.responseJSON.errors;
            //ajaxErrors(response)
        }
    });

});
function ajaxErrors(response){
    $("input + p").remove()
    $(":input").removeClass('ErrorMsg');
    var loop_ = 0;
    for(err in response){
        var er = err.split('.');
        toastr.error(response[err][0]);
        if(loop_ == 0){
            if(er[1] == undefined){
                $(`input[name='${er[0]}']`).addClass('ErrorMsg').after(`<p>${response[err][0]}</p>`);
            }else{
                $(`input[name='${er[0]}[${er[1]}]']`).addClass('ErrorMsg').after(`<p>${response.err[0]}</p>`);
            }
        }
        loop_++;
        // console.log(response[err][0]);
        // toastr.error(response[err][0]);
    }
}

const checkLogin = function(){
    if(!user){
        $("#loginModal").modal();
        toastr.error(msgs.login_first);
        $("._login-info").text(msgs.login_first);
        return false;
    }
}

