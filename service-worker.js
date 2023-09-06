// service-worker.js

const CACHE_NAME = 'SbobinaX';
const urlsToCache = [
    '/',
    '/templates',
    '/req',
    '/assets/dist/css',
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(urlsToCache))
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.filter(cacheName => {
                    return cacheName !== CACHE_NAME;
                }).map(cacheName => {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response; // Restituisci la risorsa dalla cache
                }
                return fetch(event.request)
                    .then(networkResponse => {
                        // Salva la risorsa nella cache prima di restituirla
                        caches.open(CACHE_NAME)
                            .then(cache => cache.put(event.request, networkResponse));
                        return networkResponse.clone(); // Restituisci la risorsa dalla rete
                    });
            })
    );
});
