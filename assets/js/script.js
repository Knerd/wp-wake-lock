// The wake lock sentinel.
let wakeLock = null;

// Function that attempts to request a screen wake lock.
const requestWakeLock = async () => {
  try {
    wakeLock = await navigator.wakeLock.request();
    wakeLock.addEventListener('release', (e) => {
      console.log('Screen Wake Lock released:', wakeLock.released, e);
    });
    // console.log('Screen Wake Lock released:', wakeLock.released);
  } catch (err) {
    console.error(`${err.name}, ${err.message}`);
  }
};

// Request a screen wake lock…
requestWakeLock();
// …and release it again after 5s.

// window.setTimeout(() => {
//   wakeLock.release();
//   wakeLock = null;
// }, 60 * 60 * 2);

// console.log(wakeLock);