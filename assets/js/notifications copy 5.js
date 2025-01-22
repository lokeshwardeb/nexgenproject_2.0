console.log("Notification connected");
console.log('The localStorage => ');
console.log(localStorage);

// console.log("the audio status", localStorage.removeItem('audioContextInitialized'))
console.log("the audio status", localStorage.getItem('audioContextInitialized'))


let audioContext;
let audioBufferLoaded = false;

// Function to initialize AudioContext only after user interaction
function initializeAudioContext() {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
        localStorage.setItem('audioContextInitialized', 'true');
    } else if (audioContext.state === 'suspended') {
        audioContext.resume(); // Resume context if it's suspended
    }
}

// Function to load and play notification sound
async function playNotificationSound() {
    try {
        initializeAudioContext(); // Ensure audioContext is ready

        if (!audioBufferLoaded) {
            const response = await fetch('../assets/audio/custom_notification_sound.mp3');
            const arrayBuffer = await response.arrayBuffer();
            audioContext.decodeAudioData(arrayBuffer, (decodedBuffer) => {
                const source = audioContext.createBufferSource();
                source.buffer = decodedBuffer;
                source.connect(audioContext.destination);
                source.start(0);
                audioBufferLoaded = true; // Mark buffer as loaded
            });
        } else {
            // If audio is already loaded, just play it
            const source = audioContext.createBufferSource();
            source.buffer = audioBufferLoaded;
            source.connect(audioContext.destination);
            source.start(0);
        }
    } catch (error) {
        console.error('Error playing audio:', error);
    }
}

// Attach event listener to initialize context on user interaction
document.addEventListener('click', function initAudioContextOnClick() {
    initializeAudioContext();
    document.removeEventListener('click', initAudioContextOnClick);
});

// Function to send notifications
function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
        return;
    }

    function showNotification() {
        const notify = new Notification(notification_title_msg, {
            body: notification_body_msg,
            icon: './assets/img/nexGenProject_logo.jpeg'
        });

        // Play sound if AudioContext is initialized and allowed
        if (audioContext) {
            playNotificationSound();
        }

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
