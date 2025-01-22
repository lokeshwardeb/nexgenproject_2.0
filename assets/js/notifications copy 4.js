console.log("notification connected");
console.log('the localstorage => ');
console.log(localStorage);
function playNotificationSound() {
    var the_audioContext = new (window.AudioContext || window.webkitAudioContext)();

    fetch('../assets/audio/custom_notification_sound.mp3')  // Provide the path to your sound file
        .then(response => response.arrayBuffer())
        .then(data => the_audioContext.decodeAudioData(data))
        .then(buffer => {
            var source = the_audioContext.createBufferSource();
            source.buffer = buffer;
            source.connect(the_audioContext.destination);
            source.start(0);
        })
        .catch(error => console.error('Error playing audio:', error));
}
let audioContext;

// Check if the user has already interacted with the page
if (localStorage.getItem('audioContextInitialized')) {
    // If interaction already happened, initialize AudioContext immediately
    audioContext = new (window.AudioContext || window.webkitAudioContext)();
    // playNotificationSound();  // Play the custom sound if needed
} else {
    // Wait for user interaction (click) to initialize AudioContext
    document.addEventListener('click', function () {
        if (!audioContext) {
            audioContext = new (window.AudioContext || window.webkitAudioContext)();
            localStorage.setItem('audioContextInitialized', 'true');  // Set the flag
        }

        // Play custom notification sound
        // playNotificationSound();
    });
}

// Now, in your notification function
function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
    } else {
        // Check if permission is granted
        if (Notification.permission === 'granted') {
            // Show the notification
            var notify = new Notification(notification_title_msg, {
                body: notification_body_msg,
                icon: './assets/img/nexGenProject_logo.jpeg'
            });

            // Play custom sound if AudioContext is initialized
            if (audioContext) {
                playNotificationSound();  // Call your custom sound function
            }

            // Add click event listener for the notification
            notify.addEventListener("click", function () {
                window.open(window_open_url);
            });

        } else {
            // Request permission if not granted
            Notification.requestPermission().then(function (p) {
                if (p === 'granted') {
                    var notify = new Notification(notification_title_msg, {
                        body: notification_body_msg,
                        icon: './assets/img/nexGenProject_logo.jpeg'
                    });

                    // Play custom sound if AudioContext is initialized
                    if (audioContext) {
                        playNotificationSound();  // Call your custom sound function
                    }

                    notify.addEventListener("click", function () {
                        window.open(window_open_url);
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
