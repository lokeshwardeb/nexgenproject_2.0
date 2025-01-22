console.log("Notification system initialized");

// Function to preload the notification sound for faster playback
let audioBuffer;
async function preloadNotificationSound() {
    try {
        const response = await fetch('../assets/audio/custom_notification_sound.mp3');
        const arrayBuffer = await response.arrayBuffer();
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        audioBuffer = await audioContext.decodeAudioData(arrayBuffer);
    } catch (error) {
        console.error('Error preloading audio:', error);
    }
}

// Function to play the notification sound
function playNotificationSound() {
    if (audioBuffer) {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const source = audioContext.createBufferSource();
        source.buffer = audioBuffer;
        source.connect(audioContext.destination);
        source.start(0);
    } else {
        console.warn('Audio buffer not loaded, trying to play directly.');
        let audio = new Audio('../assets/audio/custom_notification_sound.mp3');
        audio.play().catch(error => console.error('Error playing notification sound:', error));
    }
}

// Function to enable audio context on user interaction
function enableAudioContext() {
    if (!localStorage.getItem('audioContextInitialized')) {
        document.addEventListener('click', () => {
            new (window.AudioContext || window.webkitAudioContext)();
            localStorage.setItem('audioContextInitialized', 'true');
        }, { once: true });
    }
}

// Function to request notification permission
function requestNotificationPermission(callback) {
    Notification.requestPermission().then(permission => {
        if (permission === 'granted') {
            callback();
        } else {
            console.log('User denied notification permission.');
        }
    }).catch(error => console.error('Notification permission error:', error));
}

// Function to send a desktop notification with sound
function send_notification(title, message, url) {
    if (!("Notification" in window)) {
        console.log('Browser does not support notifications.');
        return;
    }

    if (Notification.permission === 'granted') {
        playNotificationSound();
        showNotification(title, message, url);
    } else if (Notification.permission !== 'denied') {
        requestNotificationPermission(() => {
            playNotificationSound();
            showNotification(title, message, url);
        });
    } else {
        console.log('Notifications are blocked by the user.');
    }
}

// Helper function to create and show notifications
function showNotification(title, message, url) {
    const notification = new Notification(title, {
        body: message,
        icon: './assets/img/nexGenProject_logo.jpeg',
        tag: 'nexGen-notification',
        requireInteraction: true // Keeps notification until the user interacts
    });

    notification.onclick = () => window.open(url);
}

// Function to check notification availability and request permission if needed
function checkNotificationStatus() {
    if (!("Notification" in window)) {
        console.log('Browser does not support notifications.');
        return;
    }

    if (Notification.permission === 'granted') {
        console.log('Notifications are enabled.');
    } else if (Notification.permission !== 'denied') {
        requestNotificationPermission(() => {
            console.log('Notification permission granted.');
        });
    } else {
        console.log('User has denied notifications.');
    }
}

// Initialize the notification system
function initializeNotificationSystem() {
    console.log('Initializing notification system...');
    enableAudioContext();
    preloadNotificationSound();
    checkNotificationStatus();
}

// Call the initializer to set everything up
initializeNotificationSystem();

// Example usage to trigger a notification
// sendNotification('Meeting Reminder', 'Your team meeting starts in 10 minutes.', 'https://nexGenProject.com/meetings_hub');
