/* TODO hay que automatizar este proceso en MySQL con FUNCTION y/o PROCEDURE */

/* solo las tecnologías que han sido elegidas por los desarrolladores */
SELECT id_technology FROM developer_tech; /* para recorrerlas después */

DROP VIEW IF EXISTS test_view_extend;

CREATE VIEW test_view_extend AS (
    /* solo los desarrolladores que han elegido alguna tecnología */
    SELECT dt.id_developer AS id_dev,
    /* hacer un "for" para escribir un case con cada tecnología activa */
    CASE WHEN dt.id_technology = 1 THEN level END AS T_1,
    CASE WHEN dt.id_technology = 2 THEN level END AS T_2,
    CASE WHEN dt.id_technology = 3 THEN level END AS T_3,
    CASE WHEN dt.id_technology = 4 THEN level END AS T_4,
    CASE WHEN dt.id_technology = 5 THEN level END AS T_5,
    CASE WHEN dt.id_technology = 6 THEN level END AS T_6,
    CASE WHEN dt.id_technology = 11 THEN level END AS T_11,
    CASE WHEN dt.id_technology = 14 THEN level END AS T_14,
    CASE WHEN dt.id_technology = 15 THEN level END AS T_15,
    CASE WHEN dt.id_technology = 19 THEN level END AS T_19,
    CASE WHEN dt.id_technology = 23 THEN level END AS T_23,
    CASE WHEN dt.id_technology = 26 THEN level END AS T_26,
    CASE WHEN dt.id_technology = 27 THEN level END AS T_27,
    CASE WHEN dt.id_technology = 28 THEN level END AS T_28,
    CASE WHEN dt.id_technology = 29 THEN level END AS T_29,
    CASE WHEN dt.id_technology = 30 THEN level END AS T_30
    FROM developer d, technology t, developer_tech dt
    WHERE d.id_developer=dt.id_developer
    AND t.id_technology=dt.id_technology
);

SELECT * FROM test_view_extend; /* cada tecnología aparece en una columna */

DROP VIEW IF EXISTS test_view_group;

CREATE VIEW test_view_group AS (
  SELECT
    id_dev,
    /* se unen todas las tecnologías en un solo registro por desarrollador */
    SUM(T_1) AS T_1,
    SUM(T_2) AS T_2,
    SUM(T_3) AS T_3,
    SUM(T_4) AS T_4,
    SUM(T_5) AS T_5,
    SUM(T_6) AS T_6,
    SUM(T_11) AS T_11,
    SUM(T_14) AS T_14,
    SUM(T_15) AS T_15,
    SUM(T_19) AS T_19,
    SUM(T_23) AS T_23,
    SUM(T_26) AS T_26,
    SUM(T_27) AS T_27,
    SUM(T_28) AS T_28,
    SUM(T_29) AS T_29,
    SUM(T_30) AS T_30
  FROM test_view_extend
  GROUP BY id_dev
);

SELECT * FROM test_view_group; /* las que no se tienen aparecen como NULL */

DROP VIEW IF EXISTS test_view_zero;

CREATE VIEW test_view_zero AS (
  SELECT
    id_dev,
    /* se sustituyen los valores NULL por 0 en todos los registros */
    COALESCE(T_1, 0) AS T_1,
    COALESCE(T_2, 0) AS T_2,
    COALESCE(T_3, 0) AS T_3,
    COALESCE(T_4, 0) AS T_4,
    COALESCE(T_5, 0) AS T_5,
    COALESCE(T_6, 0) AS T_6,
    COALESCE(T_11, 0) AS T_11,
    COALESCE(T_14, 0) AS T_14,
    COALESCE(T_15, 0) AS T_15,
    COALESCE(T_19, 0) AS T_19,
    COALESCE(T_23, 0) AS T_23,
    COALESCE(T_26, 0) AS T_26,
    COALESCE(T_27, 0) AS T_27,
    COALESCE(T_28, 0) AS T_28,
    COALESCE(T_29, 0) AS T_29,
    COALESCE(T_30, 0) AS T_30
  FROM test_view_group
);

SELECT * FROM test_view_zero; /* registros con nivel 0-9 en cada tecnología */

/* UNIÓN DE DOS ÚLTIMAS EJECUCIONES PARA AGRUPAR REGISTROS Y ELIMINAR NULOS */

DROP VIEW IF EXISTS test_view_group_zero;

CREATE VIEW test_view_group_zero AS (
  SELECT
    id_dev,
    COALESCE(SUM(T_1), 0) AS T_1,
    COALESCE(SUM(T_2), 0) AS T_2,
    COALESCE(SUM(T_3), 0) AS T_3,
    COALESCE(SUM(T_4), 0) AS T_4,
    COALESCE(SUM(T_5), 0) AS T_5,
    COALESCE(SUM(T_6), 0) AS T_6,
    COALESCE(SUM(T_11), 0) AS T_11,
    COALESCE(SUM(T_14), 0) AS T_14,
    COALESCE(SUM(T_15), 0) AS T_15,
    COALESCE(SUM(T_19), 0) AS T_19,
    COALESCE(SUM(T_23), 0) AS T_23,
    COALESCE(SUM(T_26), 0) AS T_26,
    COALESCE(SUM(T_27), 0) AS T_27,
    COALESCE(SUM(T_28), 0) AS T_28,
    COALESCE(SUM(T_29), 0) AS T_29,
    COALESCE(SUM(T_30), 0) AS T_30
  FROM test_view_extend
  GROUP BY id_dev
);

SELECT * FROM test_view_group_zero;

/* UNIÓN DE LAS TRES EJECUCIONES PARA LAS TRES VISTAS EN UNA SOLA */
/*
DROP VIEW IF EXISTS test_view_all;

CREATE VIEW test_view_all AS (
    SELECT dt.id_developer AS id_dev,
    CASE WHEN dt.id_technology = 1 THEN COALESCE(SUM(level), 0) END AS T_1,
    CASE WHEN dt.id_technology = 2 THEN COALESCE(SUM(level), 0) END AS T_2,
    CASE WHEN dt.id_technology = 3 THEN COALESCE(SUM(level), 0) END AS T_3,
    CASE WHEN dt.id_technology = 4 THEN COALESCE(SUM(level), 0) END AS T_4,
    CASE WHEN dt.id_technology = 5 THEN COALESCE(SUM(level), 0) END AS T_5,
    CASE WHEN dt.id_technology = 6 THEN COALESCE(SUM(level), 0) END AS T_6,
    CASE WHEN dt.id_technology = 11 THEN COALESCE(SUM(level), 0) END AS T_11,
    CASE WHEN dt.id_technology = 14 THEN COALESCE(SUM(level), 0) END AS T_14,
    CASE WHEN dt.id_technology = 15 THEN COALESCE(SUM(level), 0) END AS T_15,
    CASE WHEN dt.id_technology = 19 THEN COALESCE(SUM(level), 0) END AS T_19,
    CASE WHEN dt.id_technology = 23 THEN COALESCE(SUM(level), 0) END AS T_23,
    CASE WHEN dt.id_technology = 26 THEN COALESCE(SUM(level), 0) END AS T_26,
    CASE WHEN dt.id_technology = 27 THEN COALESCE(SUM(level), 0) END AS T_27,
    CASE WHEN dt.id_technology = 28 THEN COALESCE(SUM(level), 0) END AS T_28,
    CASE WHEN dt.id_technology = 29 THEN COALESCE(SUM(level), 0) END AS T_29,
    CASE WHEN dt.id_technology = 30 THEN COALESCE(SUM(level), 0) END AS T_30
    FROM developer d, technology t, developer_tech dt
    WHERE d.id_developer=dt.id_developer
    AND t.id_technology=dt.id_technology
    GROUP BY id_dev, T_1, T_2, T_3, T_4, T_5, T_6, T_11, T_14, T_15, T_19, T_23, T_26, T_27, T_28, T_29, T_30
);

SELECT * FROM test_view_all;
*/

DROP VIEW IF EXISTS test_view_search_1;

/* crea una vista con las puntuaciones de cada tecnología buscada de 9 a 1 */
CREATE VIEW test_view_search_1 AS (
  SELECT
    10 - preference AS pref,
    CONCAT("T_", id_technology) AS id_tech
  FROM search_tech
  WHERE id_search = 1
  ORDER BY pref DESC
);

SELECT * FROM test_view_search_1;

/* SEARCH EXCLUDE */
SELECT id_dev, CONCAT(T_19,T_15,T_11,T_23,T_14,T_1) AS points
FROM test_view_group_zero
ORDER BY points DESC;

/* SEARCH OVERALL */
SELECT id_dev, ((T_19*9)+(T_15*8)+(T_11*7)+(T_23*6)+(T_14*5)+(T_1*0)) AS points
FROM test_view_group_zero
ORDER BY points DESC;
