


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

C

PÁGINAS

Login de usuario

Registro de nuevo usuario --paco insert

    Seleccion tipo de usuario (con tipo automático) 

        Insertar, email, contraseña (y tipo automático)

        Indicar alias distinto (con sugerencia su email)

    CAMPO HIDDEN PARA IR GUARDANDO LOS DATOS (tipo_usuario, username, password...)

Página de administración de desarrollador

    Formulario de información personal --paco

    Formulario de experiencia laboral --paco

    Formulario de formacion académica --paco

    Formulario de nivel de dominio de tecnologías --paco

    Formulario de otros datos --paco

    Página con el CV maquetado con un template

        Listado de selección de template para CV
        SELECT thumbnail from template;

    Listado de ofertas de empleo
     SELECT id_job_offer, position, working_day, contract_type, salary, id_company
            FROM job_offer;

        Single de oferta de empleo

        SELECT position, address, working_day, contract_type, salary, description from job_offer j, company c WHERE 
        j.id_company = c.company and id_job_offer = X;

       
            Single de empresa
            SELECT company_name, address, tech_name FROM company c, tech t, tech_company tc WHERE c.id_company = tc.id_company 
            AND t.id_technology = tc.id_technology AND  c.id = myID;
            /* También consulta de sus ofertas */
            SELECT position, working_day, contract_type, salary,
            FROM job_offer WHERE id_company = myID;

    Listado de ofertas de formación
             SELECT id_job_offer, schedule, training_name, id_academy FROM training_offer;

        Single de oferta de formacion --paco

            Single de centro formativo --paco

    Búsqueda de ofertas y entidades ???

    Búsqueda con mapa ???

Página de administración de empresa

    Formulario de datos de la empresa --paco MIS DATOS

    Formulario de edición/creación de oferta de empleo --insert, update

    Listado de ofertas de empleo propias
     SELECT position, working_day, contract_type, salary,
            FROM job_offer WHERE id_company = myID;

        Listado de desarrolladores apuntados a una oferta
        SELECT alias, first_name, last_name_link_github from developer d, dev_job_offer djo WHERE d.id_developer=djo.id_developer and id_job_offer = X;

Página de administración de centro

    Formulario de datos del centro --paco MIS DATOS

    Formulario de edición/creación de oferta de formación --INSERT, UPDATE

    Listado de ofertas de formación propias
        SELECT training_name, schedule FROM training_offer WHERE id_training_offer = myID;

Página de administración de reclutador

    Perfil de datos personales --paco MIS DATOS

    Listado de búsquedas anteriores --paco

    Formulario de nueva búsqueda

        Single de resultado de búsqueda --paco

Página de administración de administrador

    Listado de todos los usuarios
     SELECT id_user, Alias, email, type, from Users;

        Agregar o eliminar usuarios
        Insert INTO Users VALUES (id_user, alias, email, type); 

        Cambiar el tipo de los usuarios
        UPDATE Users SET type = "type" WHERE id_user = X;

        Sublistado de desarrolladores
        SELECT id_developer, alias, first_name, last_name, city, country, link_github 
        FROM developer; 

        Sublistado de empresas
        SELECT id_company, alias, name, city, country, address, link_github FROM company;

        Sublistado de centros
        SELECT id_academy, alias, name, city, country, address, link_github FROM academy;


        Sublistado de reclutadores
        SELECT id_recruiter, alias, name, link_github FROM recruiter;

        Sublistado de administradores

    Listado de todas las ofertas

        Agregar o eliminar ofertas
            INSERT INTO job_offer VALUES (id_job_offer, position, working_day, 
            contract_type, salary, description, id_company); 

            INSERT INTO training_offer VALUES (id_training_offer, schedule, 

        Sublistado de ofertas de empleo
            SELECT id_job_offer, position, working_day, contract_type, salary, id_company
            FROM job_offer ;
        Sublistado de ofertas de formación
         SELECT id_job_offer, schedule, training_name, id_academy FROM training_offer;
        
    Listado de todas las tecnologías
        SELECT * FROM technology;
        Agregar o eliminar tecnologías
            INSERT INTO technology VALUES (id_technology, tech_name)
Página de administración de editor


Página de Inicio
    Select de ultimas 2 ofertas formacion; ORDER BY date, LIMIT 2 
    Select de ultimas 2 ofertas empleo; ORDER BY date, LIMIT 2 