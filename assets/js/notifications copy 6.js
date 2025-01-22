console.log("Notification connected");
console.log('The localStorage => ');
console.log(localStorage);

let audioContext;
let audioBuffer;

// Function to initialize AudioContext and play sound if possible
async function initializeAudioContext() {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
    }

    // Resume context if it was suspended
    if (audioContext.state === 'suspended') {
        await audioContext.resume().catch(err => console.error('Audio context resume error:', err));
    }

    // Load audio buffer only once
    if (!audioBuffer) {
        try {
            const response = await fetch('../assets/audio/custom_notification_sound.mp3');
            const arrayBuffer = await response.arrayBuffer();
            audioBuffer = await audioContext.decodeAudioData(arrayBuffer);
        } catch (error) {
            console.error('Error loading audio:', error);
        }
    }
}

// Function to play notification sound
function playNotificationSound() {
    if (audioBuffer && audioContext) {
        const source = audioContext.createBufferSource();
        source.buffer = audioBuffer;
        source.connect(audioContext.destination);
        source.start(0);
    }
}

// Attempt to initialize audio context on page load
if (localStorage.getItem('audioContextInitialized')) {
    initializeAudioContext().then(() => {
        console.log("Audio context resumed on page load.");
        // playNotificationSound();  // Try to play sound immediately
    }).catch(err => console.error('Audio context initialization failed:', err));
} else {
    // Wait for user interaction if context wasn't previously initialized
    document.addEventListener('click', function initAudioOnClick() {
        initializeAudioContext().then(() => {
            console.log("Audio context initialized after user click.");
            localStorage.setItem('audioContextInitialized', 'true');
            playNotificationSound();
        });
        document.removeEventListener('click', initAudioOnClick);
    });
}
document.addEventListener('click', function () {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
        localStorage.setItem('audioContextInitialized', 'true');  // Set the flag
    }

    // Play custom notification sound
    // playNotificationSound();
});

document.addEventListener('load', function () {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
        localStorage.setItem('audioContextInitialized', 'true');  // Set the flag
    }

    // playNotificationSound();

    // Play custom notification sound
    // playNotificationSound();
});



// Function to send notifications
function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
        return;
    }

    playNotificationSound();


    function showNotification() {
        playNotificationSound();
        const notify = new Notification(notification_title_msg, {
            body: notification_body_msg,
            icon: './assets/img/nexGenProject_logo.jpeg',
            silent: true
        });

        playNotificationSound();

        // Play notification sound if context is ready
        // if (audioContext) {
        //     playNotificationSound();
        // }else{
        //     playNotificationSound();

        //     console.log("the audio context is null")
        // }

        notify.addEventListener("click", function () {
            window.open(window_open_url, '_blank');
        });
    }

    // Request notification permission if not already granted
    if (Notification.permission === 'granted') {
        showNotification();
    } else {
        Notification.requestPermission().then(function (permission) {
            if (permission === 'granted') {
                showNotification();
            } else {
                console.log('User blocked notifications.');
            }
        }).catch(function (err) {
            console.error('Notification permission error:', err);
        });
    }
}
