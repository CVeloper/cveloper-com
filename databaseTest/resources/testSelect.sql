SELECT id_technology FROM technology;

DROP VIEW IF EXISTS test_view_extend;

CREATE VIEW test_view_extend AS (
    SELECT dt.id_developer AS id_dev,
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

SELECT * FROM test_view_extend;

DROP VIEW IF EXISTS test_view_group;

CREATE VIEW test_view_group AS (
  SELECT
    id_dev,
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

SELECT * FROM test_view_group;

DROP VIEW IF EXISTS test_view_zero;

CREATE VIEW test_view_zero AS (
  SELECT
    id_dev,
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

SELECT * FROM test_view_zero;

DROP VIEW IF EXISTS test_view_search_1;

CREATE VIEW test_view_search_1 AS (
  SELECT
    CONCAT("T_", id_technology) AS id_tech,
    10 - preference AS pref
  FROM search_tech
  WHERE id_search = 1
);

SELECT * FROM test_view_search_1;

SELECT id_dev, CONCAT(T_1,T_19,T_15,T_11,T_23,T_14) AS points FROM test_view_zero ORDER BY points DESC;

SELECT id_dev, ((T_1*6)+(T_19*5)+(T_15*4)+(T_11*3)+(T_23*2)+(T_14*1)) AS points FROM test_view_zero ORDER BY points DESC;

/* TODO dejar el nivel de dominio de las tecnologías de 1 a 9 */
/* TODO dejar la cantidad máxima de preferencias de búsqueda en 9 */
