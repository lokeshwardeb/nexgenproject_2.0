console.log("Notification connected");
console.log('The localStorage => ');
console.log(localStorage);

let audioContext;
let audioBuffer;
let gainNode; // Gain node for volume control
let currentVolume = 1; // Default volume (1 is full volume)

// Attempt to initialize audio context on page load
if (localStorage.getItem('audioContextInitialized')) {
    initializeAudioContext().then(() => {
        console.log("Audio context resumed on page load.");
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

// Function to initialize AudioContext and load audio
async function initializeAudioContext() {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
    }

    audioContext = new (window.AudioContext || window.webkitAudioContext)();


    // Resume context if it was suspended
    if (audioContext.state === 'suspended') {
        await audioContext.resume().catch(err => console.error('Audio context resume error:', err));
    }

    // Create gain node for volume control
    gainNode = audioContext.createGain();
    // gainNode.gain.value = currentVolume; // Set the initial volume
    gainNode.gain.value = 1; // Set the initial volume
    // gainNode.gain.value = 0.2; // Set the initial volume

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



// Function to play notification sound with volume control
function playNotificationSound() {
    if (audioBuffer && audioContext) {
        const source = audioContext.createBufferSource();
        source.buffer = audioBuffer;
        source.connect(gainNode); // Connect to the gain node
        gainNode.connect(audioContext.destination); // Connect gain node to the audio context's destination (output)
        source.start(0);
    }
}

// Function to handle volume change from a slider
function setVolume(volume) {
    if (gainNode) {
        gainNode.gain.value = volume; // Set the gain (volume)
        currentVolume = volume; // Save the current volume
    }
}

// Attempt to initialize audio context on page load
if (localStorage.getItem('audioContextInitialized')) {
    initializeAudioContext().then(() => {
        console.log("Audio context resumed on page load.");
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

// Function to send notifications
function send_notification(notification_title_msg, notification_body_msg, window_open_url) {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
        return;
    }

    function showNotification() {
        const notify = new Notification(notification_title_msg, {
            body: notification_body_msg,
            icon: './assets/img/nexGenProject_logo.jpeg',
            silent: true  // Use this to mute the default notification sound
        });

        // Play custom notification sound if AudioContext is initialized
        playNotificationSound();

        // Add click event for the notification
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

// // Example of adding a volume slider (HTML)
// document.body.innerHTML += `
//     <label for="volumeSlider">Volume Control:</label>
//     <input type="range" id="volumeSlider" min="0" max="1" step="0.01" value="${currentVolume}">
// `;

// // Event listener for volume slider change
// document.getElementById('volumeSlider').addEventListener('input', function(event) {
//     setVolume(event.target.value);
// });
