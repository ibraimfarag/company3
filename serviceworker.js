var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/',
    '/css/app.css',
    '/js/app.js',
    '/css/main.css',
    '/js/main.js',
    '/site_images/icons/icon-72x72.png',
    '/site_images/icons/icon-96x96.png',
    '/site_images/icons/icon-128x128.png',
    '/site_images/icons/icon-144x144.png',
    '/site_images/icons/icon-152x152.png',
    '/site_images/icons/icon-192x192.png',
    '/site_images/icons/icon-384x384.png',
    '/site_images/icons/icon-512x512.png',
];

self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
