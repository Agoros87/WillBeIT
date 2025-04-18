# TABLES
Definir tablas 3,5 horas
* Centers x
    * ID 
    * Nombre del centro, 
    * domicilio, 
    * población, 
    * provincia,
    * código postal, 
    * email, 
    * director, 
    * responsable erasmus, 
    * correo 
    * director 
    * teléfono del centro
    * Badges

* Users x
  * id
    * center_id
    * type (nullable)
    * name
    * email
    * email_verified_at
    * password
    * timestamps

* Posts 
   * id
   * id_video
   * id_podcasts
   * id_user
   * id_tag
   * title
   * body
   * images
   * slug


* Videos
    * id
    * id_user
    * title
    * description
    * slug

* Podcasts
    * id
    * id_user
    * title
    * description
    * slug

* Comments
    * id
    * id_user
    * id_post
    * body

* Post_images
    * id
    * id_post
    * image_path

* Favourites (pivote (usuarios,posts))
    * id
    * id_user
    * id_post

* Likes (pivote (usuarios,posts))
    * id
    * id_user
    * id_post

* Tags (pivote (tags-(posts,videos,podcasts))
    * id
    * id_post
    * id_videos
    * id_podcast
    

    



































