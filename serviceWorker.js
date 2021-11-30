if ('serviceWorker' in navigator) {
 window.addEventListener('load', function() {
  navigator.serviceWorker.register('./serviceWorker.js').then(function(registration) {
       // Si es exitoso
       console.log('SW registrado correctamente');
     }, function(err) {
       // Si falla
       console.log('SW fallo', err);
     });
});
}

// Perform install steps
let CACHE_NAME = 'entretiempo';
let urlsToCache = [
'./index.php'
];

self.addEventListener('install', function(event) {
// Perform install steps
event.waitUntil(
  caches.open(CACHE_NAME)
  .then(function(cache) {
    console.log('Opened cache');
    return cache.addAll(urlsToCache);
  })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
    .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
        return fetch(event.request);
      }
      )
    );
});

self.addEventListener('activate', function(event) {
  var cacheWhitelist = ['pigment'];
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
        );
    })
    );
});