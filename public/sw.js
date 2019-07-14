//import

importScripts('js/sw-utils.js')



var CACHE_NAME = 'my-site-cache-v1';

var urlsToCache = [
    '/',
    'index.php',
    '../css/main.css',
    '../img/bg-login-movil.png',
    '../img/usuario.jpg',
    '../js/main.js',
    'video/bg-login-movil.mp4',
    'img/icono-512x512-2.png',
    '/registro',
    'js/sw-utils.js',
    'site.webmanifest',
    '/guest',
    '/conductor',
    '/login',
    '/misreservas'

];

const APP_SHELL_INMUTABLE = [
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://use.fontawesome.com/releases/v5.8.2/css/all.css',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css',
    'https://fonts.googleapis.com/css?family=Oswald|Port+Lligat+Sans',
    'css/normalize.css',
    'js/vendor/modernizr-3.7.1.min.js',
    'https://code.jquery.com/jquery-3.3.1.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js',
    'js/plugins.js',
    'js/instascan.min.js'
];

self.addEventListener('install', function (event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function (cache) {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
    );
});



self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request)
            .then(function (response) {
                // Cache hit - return response
                if (response) {
                    return response;
                }

                // IMPORTANT: Clone the request. A request is a stream and
                // can only be consumed once. Since we are consuming this
                // once by cache and once by the browser for fetch, we need
                // to clone the response.
                var fetchRequest = event.request.clone();

                return fetch(fetchRequest).then(
                    function (response) {
                        // Check if we received a valid response
                        if (!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        // IMPORTANT: Clone the response. A response is a stream
                        // and because we want the browser to consume the response
                        // as well as the cache consuming the response, we need
                        // to clone it so we have two streams.
                        var responseToCache = response.clone();

                        caches.open(CACHE_NAME)
                            .then(function (cache) {
                                cache.put(event.request, responseToCache);
                            });

                        return response;
                    }
                );
            })
    );
});
self.addEventListener('activate', function (event) {

    var cacheWhitelist = ['pages-cache-v1', 'blog-posts-cache-v1'];

    event.waitUntil(
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});