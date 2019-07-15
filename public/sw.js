//import

importScripts('js/sw-utils.js');



const STATIC_CACHE = 'static-v1';
const DYNAMIC_CACHE = 'dynamic-v1';
const INMUTABLE_CACHE = 'inmutable-v1';

const APP_SHELL = [
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
    'site.webmanifest'

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

self.addEventListener('install', e => {

    const cacheStatic = caches.open(STATIC_CACHE).then(cache =>
        cache.addAll(APP_SHELL));

    const cacheInmutable = caches.open(INMUTABLE_CACHE).then(cache =>
        cache.addAll(APP_SHELL_INMUTABLE));

    e.waitUntil(Promise.all([cacheStatic, cacheInmutable]));
});

self.addEventListener('activate', e => {

    const respuesta = caches.keys().then(keys => {
        keys.forEach(key => {

            if (key !== STATIC_CACHE && key.includes('static')) {
                return caches.delete(key);
            }
        });
    });

    e.waitUntil(respuesta);
});


self.addEventListener('fetch', e => {

    const respuesta = caches.match(e.request).then(res => {

        if (res) {
            return res;
        } else {
            return fetch(e.request).then(newRes => {

                return actualizaCacheDynamico(DYNAMIC_CACHE, e.request, newRes);

            })
        }
    });

    e.respondWith(respuesta);
});