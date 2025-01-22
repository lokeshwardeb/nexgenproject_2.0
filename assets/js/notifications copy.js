console.log("notification connected");
console.log('the localstorage => ');
console.log(localStorage);
function playNotificationSound() {
    var audioContext = new (window.AudioContext || window.webkitAudioContext)();

    fetch('../assets/audio/custom_notification_sound.mp3')  // Provide the path to your sound file
        .then(response => response.arrayBuffer())
        .then(data => audioContext.decodeAudioData(data))
        .then(buffer => {
            var source = audioContext.createBufferSource();
            source.buffer = buffer;
            source.connect(audioContext.destination);
            source.start(0);
        })
        .catch(error => console.error('Error playing audio:', error));
}

// enable the autio context
function enable_audio_context(){
    let the_audioContext;

// Check if the user has already interacted with the page
if (localStorage.getItem('audioContextInitialized')) {
    // If interaction already happened, initialize AudioContext immediately
    the_audioContext = new (window.AudioContext || window.webkitAudioContext)();
    // localStorage.setItem('audioContextInitialized', 'true');  // Set the flag

    // return true;

    // playNotificationSound();  // Play the custom sound if needed
} else {
    // Wait for user interaction (click) to initialize AudioContext
    document.addEventListener('click', function () {
        if (!the_audioContext) {
            the_audioContext = new (window.AudioContext || window.webkitAudioContext)();
            localStorage.setItem('audioContextInitialized', 'true');  // Set the flag
        }

        // Play custom notification sound
        // playNotificationSound();
    });
}
}

enable_audio_context();

// main send notification functino

// Function to send desktop notification with sound
function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
    // first of all enable the audio context
    // enable_audio_context();
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
    } else {
        // Check if permission is already granted
        if (Notification.permission === 'granted') {
            // Show notification
                  // Play custom notification sound
                  playNotificationSound();
            var notify = new Notification(notification_title_msg, {
                body: notification_body_msg,
                icon: './assets/img/nexGenProject_logo.jpeg'
            });

      

            notify.addEventListener("click", function () {
                window.open(window_open_url);
            });

        } else {
            // Request permission from user
            Notification.requestPermission().then(function (p) {
                if (p === 'granted') {
                    // Show notification
                    var notify = new Notification('Hi there!', {
                        body: 'Welcome to our project management community! You will be able to receive all important notifications from nexGenProject.',
                        icon: './assets/img/nexGenProject_logo.jpeg'
                    });

                    // Play custom notification sound
                    playNotificationSound();

                    notify.addEventListener("click", function () {
                        window.open(`${window_open_url}`);
                    });

                } else {
                    console.log('User blocked notifications.');
                }
            }).catch(function (err) {
                console.error(err);
            });
        }
    }
}

// // Function to play notification sound
// function playNotificationSound() {
//     var audio = new Audio('./assets/sounds/notification.mp3'); // Path to your custom sound
//     audio.play().catch(function (error) {
//         console.error('Error playing notification sound:', error);
//     });
// }




// desktop notification function
// function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
//     if (!window.Notification) {
//         console.log('Browser does not support notifications.');
//     } else {
//         // check if permission is already granted
//         if (Notification.permission === 'granted') {
//             // show notification here
//             // Play custom sound
            
//             var notify = new Notification(notification_title_msg, {
//                 // body: 'How are you doing?',
//                 // body: 'Jai sri ganesh',
//                 body: notification_body_msg,
//                 icon: './assets/img/nexGenProject_logo.jpeg'
//                 // icon: '/assets/img/Logo.png'

//                 // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'

//                 // icon: 'https://bit.ly/2DYqRrh',
//             });

//             playNotificationSound();

//             notify.addEventListener("click", function () {
//                 window.open(window_open_url);
//                 // window.open("http://localhost:8000/dashboard");
//             })


//         } else {
//             // request permission from user
//             Notification.requestPermission().then(function (p) {
//                 if (p === 'granted') {
//                     // show notification here
//                     // Play custom sound
               
//                     var notify = new Notification('Hi there!', {
//                         body: 'Welcome to our project management community ! You will be able to receive all the important notifications from nexGenProject so that you can easily manage everything and don\'t missout anything !!',

//                         icon: './assets/img/nexGenProject_logo.jpeg'

//                         // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'
//                         // icon: '/assets/img/Logo.png'
//                         // icon: 'https://attacomsian.com/'
//                     });

//                     playNotificationSound();

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

// send_notification();
// notifyMe();







// default notification function to check is the notifications is enabled or not

// desktop notification function
function check_notification() {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
    } else {
        // check if permission is already granted
        if (Notification.permission === 'granted') {
            // show notification here

            // var notify = new Notification('The check is this', {
            //     // body: 'How are you doing?',
            //     body: 'Jai sri ganesh',
            //     icon: './assets/img/nexGenProject_logo.jpeg'
            //     // icon: '/assets/img/Logo.png'

            //     // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'

            //     // icon: 'https://bit.ly/2DYqRrh',
            // });
        } else {
            // request permission from user
            Notification.requestPermission().then(function (p) {
                if (p === 'granted') {
                    // Play custom sound
                    playNotificationSound();
                    var notify = new Notification('Hi there!', {
                        body: 'Welcome to our project management community ! You will be able to receive all the important notifications from nexGenProject so that you can easily manage everything and don\'t missout anything !!',

                        icon: './assets/img/nexGenProject_logo.jpeg'

                        // icon: 'https://lokeshwardebportfolio.epizy.com/assets/img/hero_img.png'
                        // icon: '/assets/img/Logo.png'
                        // icon: 'https://attacomsian.com/'
                    });

                    notify.addEventListener("click", function () {
                        window.open(`${SITE_URL}dashboard`);
                        // window.open("http://localhost:8000/dashboard");
                    })

                } else {
                    console.log('User blocked notifications.');
                }
            }).catch(function (err) {
                console.error(err);
            });
        }
    }
}

check_notification();

