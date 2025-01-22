const SITE_URL = 'http://localhost:8000/';

function showPass() {
    var show_pass_icon = document.getElementById('show_pass_icon');
    var hide_pass_icon = document.getElementById('hide_pass_icon');

    var password = document.getElementById('password')

    if (show_pass_icon.classList.contains == 'd-none') {
        hide_pass_icon.classList.toggle('d-none')

        if (password.type == 'password') {
            password.type = 'text'
        } else {
            password.type = 'password'
        }

        // show_pass_icon.classList.add('d-none')
    } else {
        hide_pass_icon.classList.toggle('d-none')
        show_pass_icon.classList.toggle('d-none')

        if (password.type == 'password') {
            password.type = 'text'
        } else {
            password.type = 'password'
        }

    }
    // else{
    //     show_pass_icon.classList.toggle('fa-eye');
    // }

}

function showConfirmPassword() {
    var show_cpass_icon = document.getElementById('show_cpass_icon');
    var hide_cpass_icon = document.getElementById('hide_cpass_icon');

    var cpassword = document.getElementById('cpassword')

    if (show_cpass_icon.classList.contains == 'd-none') {
        hide_cpass_icon.classList.toggle('d-none')

        if (cpassword.type == 'password') {
            cpassword.type = 'text'
        } else {
            cpassword.type = 'password'
        }

        // show_pass_icon.classList.add('d-none')
    } else {
        hide_cpass_icon.classList.toggle('d-none')
        show_cpass_icon.classList.toggle('d-none')

        if (cpassword.type == 'password') {
            cpassword.type = 'text'
        } else {
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

document.addEventListener("DOMContentLoaded", function () {
    var fragment = window.location.hash;
    var container = document.getElementById("container");

    // Check if the fragment contains 'signup'
    if (fragment.includes("page=signup")) {
        container.classList.add("right-panel-active");
    } else if (fragment.includes("page=login")) {
        container.classList.remove("right-panel-active");
    }
});





// document desktop notification
// if (!window.Notification) {
//     console.log('Browser does not support notifications.');
// } else {
//     // check if permission is already granted
//     if (Notification.permission === 'granted') {
//         // show notification here
//     } else {
//         // request permission from user
//         Notification.requestPermission().then(function(p) {
//            if(p === 'granted') {
//                // show notification here
// var notify = new Notification('Hi there!');

//            } else {
//                console.log('User blocked notifications.');
//            }
//         }).catch(function(err) {
//             console.error(err);
//         });
//     }
// }
// var notify = new Notification('Hi there!');




// Function to play notification sound
// function playNotificationSound() {
//     // var audio = new Audio('./assets/audio/notification.mp3'); // Path to your sound file

//     audio.muted = true;
// audio.play().then(() => {
//     audio.muted = false;
// });
//     var audio = new Audio('../assets/audio/custom_notification_sound.mp3'); // Path to your sound file
//     audio.play();

    
// }


// check if the audiocontext is enabled or not and it enable after the first click or the interaction

// document.addEventListener('click', function () {
//     // Check if the AudioContext is already created
//     if (!audioContext) {
//         audioContext = new (window.AudioContext || window.webkitAudioContext)();
//     }
    
//     // Now that the user has clicked, we can start the audio
//     // playNotificationSound();
// });

// document.addEventListener('DOMContentLoaded', function(){
// // Check if the AudioContext is already created
// if (!audioContext) {
//     audioContext = new (window.AudioContext || window.webkitAudioContext)();
// }
// })

// document.addEventListener('load', function(){
// // Check if the AudioContext is already created
// if (!audioContext) {
//     audioContext = new (window.AudioContext || window.webkitAudioContext)();
// }
// })





// function playNotificationSound() {
//     var audioContext = new (window.AudioContext || window.webkitAudioContext)();

//     fetch('../assets/audio/custom_notification_sound.mp3')  // Provide the path to your sound file
//         .then(response => response.arrayBuffer())
//         .then(data => audioContext.decodeAudioData(data))
//         .then(buffer => {
//             var source = audioContext.createBufferSource();
//             source.buffer = buffer;
//             source.connect(audioContext.destination);
//             source.start(0);
//         })
//         .catch(error => console.error('Error playing audio:', error));
// }

// // main send notification functino

// // Function to send desktop notification with sound
// function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
//     if (!window.Notification) {
//         console.log('Browser does not support notifications.');
//     } else {
//         // Check if permission is already granted
//         if (Notification.permission === 'granted') {
//             // Show notification
//                   // Play custom notification sound
//                   playNotificationSound();
//             var notify = new Notification(notification_title_msg, {
//                 body: notification_body_msg,
//                 icon: './assets/img/nexGenProject_logo.jpeg'
//             });

      

//             notify.addEventListener("click", function () {
//                 window.open(window_open_url);
//             });

//         } else {
//             // Request permission from user
//             Notification.requestPermission().then(function (p) {
//                 if (p === 'granted') {
//                     // Show notification
//                     var notify = new Notification('Hi there!', {
//                         body: 'Welcome to our project management community! You will be able to receive all important notifications from nexGenProject.',
//                         icon: './assets/img/nexGenProject_logo.jpeg'
//                     });

//                     // Play custom notification sound
//                     playNotificationSound();

//                     notify.addEventListener("click", function () {
//                         window.open(`${window_open_url}`);
//                     });

//                 } else {
//                     console.log('User blocked notifications.');
//                 }
//             }).catch(function (err) {
//                 console.error(err);
//             });
//         }
//     }
// }

// // // Function to play notification sound
// // function playNotificationSound() {
// //     var audio = new Audio('./assets/sounds/notification.mp3'); // Path to your custom sound
// //     audio.play().catch(function (error) {
// //         console.error('Error playing notification sound:', error);
// //     });
// // }




// // desktop notification function
// // function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
// //     if (!window.Notification) {
// //         console.log('Browser does not support notifications.');
// //     } else {
// //         // check if permission is already granted
// //         if (Notification.permission === 'granted') {
// //             // show notification here
// //             // Play custom sound
            
// //             var notify = new Notification(notification_title_msg, {
// //                 // body: 'How are you doing?',
// //                 // body: 'Jai sri ganesh',
// //                 body: notification_body_msg,
// //                 icon: './assets/img/nexGenProject_logo.jpeg'
// //                 // icon: '/assets/img/Logo.png'

// //                 // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'

// //                 // icon: 'https://bit.ly/2DYqRrh',
// //             });

// //             playNotificationSound();

// //             notify.addEventListener("click", function () {
// //                 window.open(window_open_url);
// //                 // window.open("http://localhost:8000/dashboard");
// //             })


// //         } else {
// //             // request permission from user
// //             Notification.requestPermission().then(function (p) {
// //                 if (p === 'granted') {
// //                     // show notification here
// //                     // Play custom sound
               
// //                     var notify = new Notification('Hi there!', {
// //                         body: 'Welcome to our project management community ! You will be able to receive all the important notifications from nexGenProject so that you can easily manage everything and don\'t missout anything !!',

// //                         icon: './assets/img/nexGenProject_logo.jpeg'

// //                         // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'
// //                         // icon: '/assets/img/Logo.png'
// //                         // icon: 'https://attacomsian.com/'
// //                     });

// //                     playNotificationSound();

// //                     notify.addEventListener("click", function () {
// //                         window.open(`${SITE_URL}dashboard`);
// //                         // window.open("http://localhost:8000/dashboard");
// //                     })

// //                 } else {
// //                     console.log('User blocked notifications.');
// //                 }
// //             }).catch(function (err) {
// //                 console.error(err);
// //             });
// //         }
// //     }
// // }

// // send_notification();
// // notifyMe();







// // default notification function to check is the notifications is enabled or not

// // desktop notification function
// function check_notification() {
//     if (!window.Notification) {
//         console.log('Browser does not support notifications.');
//     } else {
//         // check if permission is already granted
//         if (Notification.permission === 'granted') {
//             // show notification here

//             // var notify = new Notification('The check is this', {
//             //     // body: 'How are you doing?',
//             //     body: 'Jai sri ganesh',
//             //     icon: './assets/img/nexGenProject_logo.jpeg'
//             //     // icon: '/assets/img/Logo.png'

//             //     // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'

//             //     // icon: 'https://bit.ly/2DYqRrh',
//             // });
//         } else {
//             // request permission from user
//             Notification.requestPermission().then(function (p) {
//                 if (p === 'granted') {
//                     // Play custom sound
//                     playNotificationSound();
//                     var notify = new Notification('Hi there!', {
//                         body: 'Welcome to our project management community ! You will be able to receive all the important notifications from nexGenProject so that you can easily manage everything and don\'t missout anything !!',

//                         icon: './assets/img/nexGenProject_logo.jpeg'

//                         // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'
//                         // icon: '/assets/img/Logo.png'
//                         // icon: 'https://attacomsian.com/'
//                     });

//                     notify.addEventListener("click", function () {
//                         window.open(`${SITE_URL}dashboard`);
//                         // window.open("http://localhost:8000/dashboard");
//                     })

//                 } else {
//                     console.log('User blocked notifications.');
//                 }
//             }).catch(function (err) {
//                 console.error(err);
//             });
//         }
//     }
// }

// check_notification();






// function delete_msg(self){
//     var get_repository_msg_id = self.getAttribute("data-repository_msg_id");
//     console.log(get_repository_msg_id)

//     $.ajax({
//         type: "POST",
//         url: "/delete_msg",
//         data: {repository_msg_id: get_repository_msg_id},
//         // dataType: "dataType",
//         success: function (response) {
//             console.log(response)
//             // if(response != ''){
//             //     success_alert("Success !!", response.data)
//             // }
//         }
//     });

// }