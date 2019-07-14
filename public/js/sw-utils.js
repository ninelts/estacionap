//Guardar el cache Dynamico

function actualizaCacheDynamico(dynamicCache, req, res) {

    if (res.ok) {

        return caches.open(dynamicCache).then(cache => {

            cache.put(req, res.clone());
            return res.clone();
        });


    } else {
        return res;
    }
}