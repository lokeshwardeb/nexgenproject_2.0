function showPass() {
    var show_pass_icon = document.getElementById('show_pass_icon');
    var hide_pass_icon = document.getElementById('hide_pass_icon');

    var password = document.getElementById('password')

    if (show_pass_icon.classList.contains == 'd-none') {
        hide_pass_icon.classList.toggle('d-none')

        if(password.type == 'password'){
            password.type = 'text'
        }else{
            password.type = 'password'
        }
        
        // show_pass_icon.classList.add('d-none')
    } else {
        hide_pass_icon.classList.toggle('d-none')
        show_pass_icon.classList.toggle('d-none')

        if(password.type == 'password'){
            password.type = 'text'
        }else{
            password.type = 'password'
        }

    }
    // else{
    //     show_pass_icon.classList.toggle('fa-eye');
    // }

}

function showConfirmPassword(){
    var show_cpass_icon = document.getElementById('show_cpass_icon');
    var hide_cpass_icon = document.getElementById('hide_cpass_icon');

    var cpassword = document.getElementById('cpassword')

    if (show_cpass_icon.classList.contains == 'd-none') {
        hide_cpass_icon.classList.toggle('d-none')

        if(cpassword.type == 'password'){
            cpassword.type = 'text'
        }else{
            cpassword.type = 'password'
        }
        
        // show_pass_icon.classList.add('d-none')
    } else {
        hide_cpass_icon.classList.toggle('d-none')
        show_cpass_icon.classList.toggle('d-none')

        if(cpassword.type == 'password'){
            cpassword.type = 'text'
        }else{
            cpassword.type = 'password'
        }

    }
    // else{
    //     show_pass_icon.classList.toggle('fa-eye');
    // }
}



// function signup_page(){
//     document.getElementById("signUp").addEventListener("click", function(event){
//         event.preventDefault()
//       });
// }

// document.getElementById("main_content").addEventListener("click", function(event){
//     event.preventDefault()
//   });
// main_content




// the login and signup handler after reload

// JavaScript to handle the fragment

document.addEventListener("DOMContentLoaded", function() {
    var fragment = window.location.hash;
    var container = document.getElementById("container");

    // Check if the fragment contains 'signup'
    if (fragment.includes("page=signup")) {
        container.classList.add("right-panel-active");
    }else if (fragment.includes("page=login")) {
        container.classList.remove("right-panel-active");
    }
});

