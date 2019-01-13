


SELECTS

Registro de usuarios:
INSERT mail y contraseña con ID_USUARIO NUMBER AUTOINCREMENT

Validacion de usuarios:
SELECT mail y contraseña JOIN de las tablas de usuarios.

Datos personales, de empresa, de centro:
INSERT formulario completo a cada tabla DESARROLLADOR, EMPRESA, CENTRO

Dar de alta oferta empleo o formacion:
INSERT datos del formulario en OFERTAS_EMPLEO u OFERTAS_FORMACION

Listado de ofertas:
SELECT todas las ofertas de EMPLEO o FORMACION con paginacion LIMIT y FROM

Single de ofertas:
SELECT datos con el ID_OFERTA

Single de empresa y centro:
SELECT datos con el ID

Curriculum formateado:
SELECT de todo con el ID_USUARIO

(funciones get_nombre, get_foto, get_tecnologias, etc. para que todas las plantillas funcionen)



PÁGINAS

Login de usuario

Registro de nuevo usuario

    Seleccion tipo de usuario (con tipo automático)

        Insertar, email, contraseña (y tipo automático)

        Indicar alias distinto (con sugerencia su email)

Página de administración de desarrollador

    Formulario de información personal

    Formulario de experiencia laboral

    Formulario de formacion académica

    Formulario de nivel de dominio de tecnologías

    Formulario de otros datos

    Página con el CV maquetado con un template

        Listado de selección de template para CV

    Listado de ofertas de empleo

        Single de oferta de emplero

            Single de empresa

    Listado de ofertas de formación

        Single de oferta de formacion

            Single de centro formativo

    Búsqueda de ofertas y entidades

    Búsqueda con mapa

Página de administración de empresa

    Formulario de datos de la empresa

    Formulario de edición/creación de oferta de empleo

    Listado de ofertas de empleo propias

        Listado de desarrolladores apuntados a una oferta

Página de administración de centro

    Formulario de datos del centro

    Formulario de edición/creación de oferta de formación

    Listado de ofertas de formación propias

Página de administración de reclutador

    Perfil de datos personales

    Listado de búsquedas anteriores

    Formulario de nueva búsqueda

        Single de resultado de búsqueda

Página de administración de administrador

    Listado de todos los usuarios

        Agregar o eliminar usuarios

        Cambiar el tipo de los usuarios

        Sublistado de desarrolladores

        Sublistado de empresas

        Sublistado de centros

        Sublistado de reclutadores

        Sublistado de administradores

    Listado de todas las ofertas

        Agregar o eliminar ofertas

        Sublistado de ofertas de emplero

        Sublistado de ofertas de formación

    Listado de todas las tecnologías

        Agregar o eliminar tecnologías

Página de administración de editor
