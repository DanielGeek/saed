var userFeed = new Instafeed({
    get: 'user',
    userId: '7591537018',
    clientId: '136783c14d854a2ab5f04f19bcb96d5b',
    accessToken: '7591537018.0f839ca.7dcaced9efb8403dae974537fc879f49',
    resolution: 'standard_resolution',
    template: '<div class="col-lg-4 col-md-4 col-sm-6">'+
            '<a href="{{image}}" class="fh5co-card-item image-popup" title="{{caption}}">'+
                '<figure>'+
                    '<div class="overlay"><i class="ti-plus"></i></div>'+
                    '<img src="{{image}}" alt="{{tags}}" class="img-responsive">'+
                '</figure>'+
                '<div class="fh5co-text">'+
                    '<h2>{{caption}}</h2>'+
                    '<p><span class="btn btn-primary"><i class="fas fa-heart"></i> {{likes}} <i class="fas fa-comment fa-flip-horizontal comentario"></i> {{comments}} </p>'+
                '</div>'+
            '</a>'+
        '</div>',
    sortBy: 'most-recent',
    limit: 3,
    links: false,
    after: function() {
        // Desabilita el boton si no existen más fotos para cargar
        if (!this.hasNext()) {
        btnInstafeedLoad.setAttribute('disabled', 'disabled');
        }
    }
  });

  userFeed.run();

var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
    btnInstafeedLoad.addEventListener("click", function() {
        userFeed.next()
    });
  

  // This will create a single gallery from all elements that have class "gallery-item"
  $('.gallery').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    delegate: 'a',
    zoom: {
        enabled: true, // By default it's false, so don't forget to enable it
        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out' // CSS transition easing function
    },
    gallery: {
        enabled: true
    }
});