// The wake lock sentinel.
let wakeLock = null;

// Function that attempts to request a screen wake lock.
const requestWakeLock = async () => {
  try {
    if(navigator.wakeLock){
      wakeLock = await navigator.wakeLock.request();
      wakeLock.addEventListener('release', (e) => {
        console.info('Screen Wake Lock released:', wakeLock.released, e);
        // attempt to keep hold of wakeLock
        wakeLock = navigator.wakeLock.request();
      });
      console.info('Screen Wake Lock released:', wakeLock.released);
    }else{
      console.warn('Navigator wakeLock not available', navigator.wakeLock)
    }
  } catch (err) {
    console.error(`${err.name}, ${err.message}`);
  }
};

// Request a screen wake lock…
requestWakeLock();