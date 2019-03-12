<?php

class ControllerNoticias extends BaseController
{

    public function list() {
        // aqui viene el trabajo con el modelo
        $this->data = ['noticias_0', 'noticias_1', 'noticias_2'];
        // ejemplo:
        // http://mvc-todo.io/noticias/list
        // muestra:
        // SALIDA GENERAL noticias_1---noticias_2---noticias_3

        // EJEMPLOS
        /*
        ModelNoticias::getNoticias();
        ModelNoticias::getNoticias($page=1);
        ModelNoticias::getNoticiasPublicadas();

        $noticia = ModelNoticias::getNoticiaById(2);
        $noticia = ModelNoticias::getNoticiaByAuthor('Jorge');

        $noticia = new ModelNoticias();

        $noticia->setTitle('Lanzamiento de mi MVC.');
        $noticia->setAuthor('Sergio');

        $noticia->getContent();
        $noticia->save();

        ModelNoticias::deleteNoticiaById(7);
        $noticia->delete();
        */
    }

    public function show($id) {
        // aqui viene el trabajo con el modelo
        $datos_modelo = ['noticias_0', 'noticias_1', 'noticias_2'];
        // ejemplo:
        // http://mvc-todo.io/noticias/show/1
        // muestra:
        // SALIDA GENERAL noticias_2
        $this->data['titulo'] = "algo";
        $this->data['id'] = $id;
        $this->data['contenido'] = $datos_modelo[$id];
    }

}

?>
