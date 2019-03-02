
-- PÁGINAS / SELECTS

-- Login de usuario

-- Registro de nuevo usuario 
	INSERT INTO user 
	VALUES (alias, email, type);

-- Seleccion tipo de usuario (con tipo automático) 

-- INSERTar, email, contraseña (y tipo automático)

-- Indicar alias distinto (con sugerencia su email)
	-- CAMPO HIDDEN PARA IR GUARDANDO LOS DATOS (tipo_usuario, username, password...)

-- Página de administración de desarrollador

-- Formulario de información personal 
    INSERT INTO developer 
    VALUES (first_name, last_name, address, postal_code, city, country, phone, link_github, link_linkedin, avatar);
   

-- Formulario de experiencia laboral 
    INSERT INTO experience 
    VALUES (position, company, finish_date, duration, id_developer);
     
-- Formulario de formacion académica 
    INSERT INTO training 
    VALUES (degree, institution, city, finish_date, id_developer);

-- Formulario de nivel de dominio de tecnologías 
    INSERT INTO experience 
    VALUES (id_developer, id_technology, level); 

-- Formulario de otros datos 
    INSERT INTO experience 
    VALUES (id_additional, description, id_developer);

-- Página con el CV maquetado con un template

-- Listado de selección de template para CV
    SELECT thumbnail 
    FROM template;

-- Listado de ofertas de empleo
    SELECT id_job_offer, position, working_day, contract_type, salary, id_company 
    FROM job_offer;

-- Single de oferta de empleo
	SELECT position, address, working_day, contract_type, salary, description 
	FROM job_offer j, company c 
	WHERE j.id_company = c.company 
	AND id_job_offer = X;

-- Single de empresa
    SELECT company_name, address, tech_name 
    FROM company c, tech t, tech_company tc 
    WHERE c.id_company = tc.id_company 
    AND t.id_technology = tc.id_technology 
    AND c.id = myID;

-- Consulta de las ofertas de la empresa
    SELECT position, working_day, contract_type, salary 
    FROM job_offer 
    WHERE id_company = myID;

-- Listado de ofertas de formación
    SELECT id_job_offer, schedule, training_name, id_academy 
    FROM training_offer;

-- Single de oferta de formación 
    SELECT training_name, academy_name, address, schedule, tech_name, description
    FROM academy a, technology t, training_offer to, tech_training_offer tto
    WHERE a.id_academy = id.training_offer 
    AND to.id_training_offer = tto.id_training_offer
    AND t.id_technology = tto.id_technology 
    AND a.id_training_offer = myID;

-- Single de centro formativo 
    SELECT academy_name, city, address, tech_name 
    FROM academy a, technology t, tech_training_offer tto
    WHERE  a.id_academy = tto.id_academy 
    AND t.id_technology = tto.id_technology 
    AND  a.id_academy = myID;

-- Select de ofertas de formación
    SELECT training_name, description 
    FROM training_offer 
    WHERE id_academy = myID;

-- Búsqueda de ofertas y entidades ???

-- Búsqueda con mapa ???

-- Página de administración de empresa

-- Formulario de datos de la empresa  
    INSERT INTO company 
    VALUES (company_name, address, postal_code, city, country, contact_phone, link_github, link_linkedin, avatar);

-- Formulario de edición/creación de oferta de empleo (INSERT, UPDATE)
    INSERT INTO job_offer 
    VALUES (position, working_day, contract_type, salary, description, id_company);

    UPDATE job_offer 
    SET position = "position", working_day = "working_day", contract_type = "contract_type",  
    salary = "salary", description = "description" 
    WHERE id_company = X;

-- Listado de ofertas de empleo propias
    SELECT position, working_day, contract_type, salary
    FROM job_offer 
    WHERE id_company = myID;

-- Listado de desarrolladores apuntados a una oferta
    SELECT alias, first_name, last_name_link_github 
    FROM developer d, dev_job_offer djo 
    WHERE d.id_developer=djo.id_developer 
    AND id_job_offer = X;

-- Página de administración de centro

-- Formulario de datos del centro  
    INSERT INTO academy 
    VALUES (academy_name, address, postal_code, city, country, contact_phone, link_github, link_linkedin, avatar);

-- Formulario de edición/creación de oferta de formación (INSERT, UPDATE)
    INSERT INTO training_offer 
    VALUES (schedule, training_name, description, id_academy);

    UPDATE training_offer SET schedule = "schedule", training_name = "training_name", description = "description" 
    WHERE id_academy = myID;

-- Listado de ofertas de formación propias
    SELECT training_name, schedule 
    FROM training_offer 
    WHERE id_training_offer = myID;

-- Página de administración de reclutador

-- Perfil de datos personales  
    INSERT INTO recruiter 
    VALUES (name, link_github, link_linkedin);

-- Listado de búsquedas anteriores 
    SELECT search_name, search_date, tech_name 
    FROM technology t, search s, search_tech st, user u
    WHERE t.id_technology = st.id_technology 
    AND u.id_user = s.id_user 
    AND s.id_user = myID;  

-- Formulario de nueva búsqueda
    INSERT INTO search VALUES (search_name, search_date);

-- Single de resultado de búsqueda
	SELECT d.id_developer AS id_dev,
	    COALESCE(t1 .level, 0) AS T_1 ,
	    COALESCE(t2 .level, 0) AS T_2 ,
	    COALESCE(t3 .level, 0) AS T_3 ,
	    COALESCE(t4 .level, 0) AS T_4 ,
	    COALESCE(t5 .level, 0) AS T_5 ,
	    COALESCE(t6 .level, 0) AS T_6 ,
	    COALESCE(t11.level, 0) AS T_11,
	    COALESCE(t14.level, 0) AS T_14,
	    COALESCE(t15.level, 0) AS T_15,
	    COALESCE(t1 .level, 0) * 9 AS S_1 ,
	    COALESCE(t2 .level, 0) * 8 AS S_2 ,
	    COALESCE(t3 .level, 0) * 7 AS S_3 ,
	    COALESCE(t4 .level, 0) * 6 AS S_4 ,
	    COALESCE(t5 .level, 0) * 5 AS S_5 ,
	    COALESCE(t6 .level, 0) * 4 AS S_6 ,
	    COALESCE(t11.level, 0) * 3 AS S_11,
	    COALESCE(t14.level, 0) * 2 AS S_14,
	    COALESCE(t15.level, 0) * 1 AS S_15,
	    COALESCE(t1 .level, 0) * 9 + 
	    COALESCE(t2 .level, 0) * 8 + 
	    COALESCE(t3 .level, 0) * 7 + 
	    COALESCE(t4 .level, 0) * 6 + 
	    COALESCE(t5 .level, 0) * 5 + 
	    COALESCE(t6 .level, 0) * 4 + 
	    COALESCE(t11.level, 0) * 3 + 
	    COALESCE(t14.level, 0) * 2 + 
	    COALESCE(t15.level, 0) * 1 AS TOTAL,
	    CONCAT(
	    COALESCE(t1 .level, 0), 
	    COALESCE(t2 .level, 0), 
	    COALESCE(t3 .level, 0), 
	    COALESCE(t4 .level, 0), 
	    COALESCE(t5 .level, 0), 
	    COALESCE(t6 .level, 0), 
	    COALESCE(t11.level, 0), 
	    COALESCE(t14.level, 0), 
	    COALESCE(t15.level, 0)
	    ) AS STRING
	FROM developer d
	LEFT JOIN developer_tech t1
	    ON t1.id_developer = d.id_developer
	    AND t1.id_technology = 1
	LEFT JOIN developer_tech t2
	    ON t2.id_developer = d.id_developer
	    AND t2.id_technology = 2
	LEFT JOIN developer_tech t3
	    ON t3.id_developer = d.id_developer
	    AND t3.id_technology = 3
	LEFT JOIN developer_tech t4
	    ON t4.id_developer = d.id_developer
	    AND t4.id_technology = 4
	LEFT JOIN developer_tech t5
	    ON t5.id_developer = d.id_developer
	    AND t5.id_technology = 5
	LEFT JOIN developer_tech t6
	    ON t6.id_developer = d.id_developer
	    AND t6.id_technology = 6
	LEFT JOIN developer_tech t11
	    ON t11.id_developer = d.id_developer
	    AND t11.id_technology = 11
	LEFT JOIN developer_tech t14
	    ON t14.id_developer = d.id_developer
	    AND t14.id_technology = 14
	LEFT JOIN developer_tech t15
	    ON t15.id_developer = d.id_developer
	    AND t15.id_technology = 15
	ORDER BY TOTAL DESC, STRING DESC;

-- Página de administración de administrador

-- Listado de todos los usuarios
    SELECT id_user, Alias, email, type 
    FROM Users;

-- Agregar o eliminar usuarios
    INSERT INTO Users 
    VALUES (alias, email, type); 

-- Cambiar el tipo de los usuarios
    UPDATE Users 
    SET type = "type" 
    WHERE id_user = X;

-- Sublistado de desarrolladores
    SELECT id_developer, alias, first_name, last_name, city, country, link_github 
    FROM developer; 

-- Sublistado de empresas
    SELECT id_company, alias, name, city, country, address, link_github 
    FROM company;

-- Sublistado de centros
    SELECT id_academy, alias, name, city, country, address, link_github 
    FROM academy;


-- Sublistado de reclutadores
    SELECT id_recruiter, alias, name, link_github 
    FROM recruiter;

-- Sublistado de administradores

-- Listado de todas las ofertas

-- Agregar o eliminar ofertas
    INSERT INTO job_offer 
    VALUES (position, working_day, contract_type, salary, description, id_company); 

    INSERT INTO training_offer 
    VALUES (id_training_offer, schedule)

-- Sublistado de ofertas de empleo
    SELECT id_job_offer, position, working_day, contract_type, salary, id_company
    FROM job_offer ;
        
-- Sublistado de ofertas de formación
    SELECT id_job_offer, schedule, training_name, id_academy 
    FROM training_offer;
        
-- Listado de todas las tecnologías
    SELECT tech_name
    FROM technology;

-- Agregar o eliminar tecnologías
    INSERT INTO technology 
    VALUES (tech_name)

-- Página de administración de editor

-- Página de Inicio

-- Select de ultimas 2 ofertas formacion
    SELECT position, company_name, city, salary 
    FROM company c, job_offer j 
    WHERE c.id_company = j.id_company 
    ORDER BY offer_date 
    LIMIT 2; -- NO HAY DATE, AÑADIR EN TABLAS

-- Select de ultimas 2 ofertas empleo
    SELECT training_name, academy_name, city, schedule 
    FROM academy a, training_offer t 
    WHERE a.id_academy = t.id_academy 
    ORDER BY date 
    LIMIT 2; -- NO HAY DATE, AÑADIR EN TABLAS