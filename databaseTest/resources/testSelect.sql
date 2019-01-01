/* TODO hay que automatizar este proceso en MySQL con FUNCTION y/o PROCEDURE */

/* UNA FORMA DE HACERLO PASANDO VALORES DE FILAS A COLUMNAS CON CASE */
/* https://stackoverflow.com/questions/1241178/mysql-rows-to-columns */

/* solo las tecnologías que han sido elegidas por los desarrolladores */
/*
SELECT id_technology FROM developer_tech; /* para recorrerlas después */
/*
DROP VIEW IF EXISTS test_view_extend;

/* solo los desarrolladores que han elegido alguna tecnología */
/* hacer un "for" para escribir un case con cada tecnología activa */
/*
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
    WHERE d.id_developer = dt.id_developer
    AND t.id_technology = dt.id_technology
);

SELECT * FROM test_view_extend; /* cada tecnología aparece en una columna */
/*
DROP VIEW IF EXISTS test_view_group;

/* se unen todas las tecnologías en un solo registro por desarrollador */
/*
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

SELECT * FROM test_view_group; /* las que no se tienen aparecen como NULL */
/*
DROP VIEW IF EXISTS test_view_zero;

/* se sustituyen los valores NULL por 0 en todos los registros */
/*
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

SELECT * FROM test_view_zero; /* registros con nivel 0-9 en cada tecnología */

/* UNIÓN DE DOS ÚLTIMAS EJECUCIONES PARA AGRUPAR REGISTROS Y ELIMINAR NULOS */
/*
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
DROP VIEW IF EXISTS test_view_extend_group_zero;

CREATE VIEW test_view_extend_group_zero AS (
    SELECT dt.id_developer AS id_dev,
    COALESCE(SUM(CASE WHEN dt.id_technology = 1 THEN level END), 0) AS T_1,
    COALESCE(SUM(CASE WHEN dt.id_technology = 2 THEN level END), 0) AS T_2,
    COALESCE(SUM(CASE WHEN dt.id_technology = 3 THEN level END), 0) AS T_3,
    COALESCE(SUM(CASE WHEN dt.id_technology = 4 THEN level END), 0) AS T_4,
    COALESCE(SUM(CASE WHEN dt.id_technology = 5 THEN level END), 0) AS T_5,
    COALESCE(SUM(CASE WHEN dt.id_technology = 6 THEN level END), 0) AS T_6,
    COALESCE(SUM(CASE WHEN dt.id_technology = 11 THEN level END), 0) AS T_11,
    COALESCE(SUM(CASE WHEN dt.id_technology = 14 THEN level END), 0) AS T_14,
    COALESCE(SUM(CASE WHEN dt.id_technology = 15 THEN level END), 0) AS T_15,
    COALESCE(SUM(CASE WHEN dt.id_technology = 19 THEN level END), 0) AS T_19,
    COALESCE(SUM(CASE WHEN dt.id_technology = 23 THEN level END), 0) AS T_23,
    COALESCE(SUM(CASE WHEN dt.id_technology = 26 THEN level END), 0) AS T_26,
    COALESCE(SUM(CASE WHEN dt.id_technology = 27 THEN level END), 0) AS T_27,
    COALESCE(SUM(CASE WHEN dt.id_technology = 28 THEN level END), 0) AS T_28,
    COALESCE(SUM(CASE WHEN dt.id_technology = 29 THEN level END), 0) AS T_29,
    COALESCE(SUM(CASE WHEN dt.id_technology = 30 THEN level END), 0) AS T_30
    FROM developer d, technology t, developer_tech dt
    WHERE d.id_developer = dt.id_developer
    AND t.id_technology = dt.id_technology
    GROUP BY id_dev
);

SELECT * FROM test_view_extend_group_zero;
*/

/* OTRA FORMA DE HACERLO CON UNA "PIVOT TABLE" */
/* https://en.wikibooks.org/wiki/MySQL/Pivot_table */
/* sign(-x) = -1,  abs(sign(-x)) = 1,  1-abs(sign(-x)) = 0 */
/* sign(+x) = +1,  abs(sign(+x)) = 1,  1-abs(sign(+x)) = 0 */
/* sign(0) = 0,  abs(sign(0)) = 0,  1-abs(sign(0)) = 1 */
/* 1-abs(sign(0)) = 1-abs(sign(x - x)) */

SELECT dt.id_developer AS id_dev,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 1)))) AS T_1,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 2)))) AS T_2,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 3)))) AS T_3,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 4)))) AS T_4,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 5)))) AS T_5,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 6)))) AS T_6,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 11)))) AS T_11,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 14)))) AS T_14,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 15)))) AS T_15,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 19)))) AS T_19,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 23)))) AS T_23,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 26)))) AS T_26,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 27)))) AS T_27,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 28)))) AS T_28,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 29)))) AS T_29,
    SUM(level * (1 - ABS(SIGN(dt.id_technology - 30)))) AS T_30
FROM developer d, technology t, developer_tech dt
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
GROUP BY id_dev;

/* OTRAS FORMAS DIFERENTES DE HACERLO EN MySQL: PIVOT, LEFT JOIN, ETC. */
/* https://dba.stackexchange.com/questions/164711/how-to-pivot-rows-into-columns-mysql */
/* https://dba.stackexchange.com/questions/47902/how-to-transpose-convert-rows-as-columns-in-mysql/47954 */
/* https://modern-sql.com/use-case/pivot */
/* https://blog.webnersolutions.com/mysql-how-to-convert-row-values-into-column-names */
/* EN ESTE CASO DA IGUAL USAR 'SUM' O 'MAX' PARA AGRUPAR LAS FILAS */

SELECT dt.id_developer AS id_dev,
    COALESCE(SUM(CASE WHEN dt.id_technology = 1 THEN level END), 0) AS T_1,
    COALESCE(SUM(CASE WHEN dt.id_technology = 2 THEN level END), 0) AS T_2,
    COALESCE(SUM(CASE WHEN dt.id_technology = 3 THEN level END), 0) AS T_3,
    COALESCE(SUM(CASE WHEN dt.id_technology = 4 THEN level END), 0) AS T_4,
    COALESCE(SUM(CASE WHEN dt.id_technology = 5 THEN level END), 0) AS T_5,
    COALESCE(SUM(CASE WHEN dt.id_technology = 6 THEN level END), 0) AS T_6,
    COALESCE(SUM(CASE WHEN dt.id_technology = 11 THEN level END), 0) AS T_11,
    COALESCE(SUM(CASE WHEN dt.id_technology = 14 THEN level END), 0) AS T_14,
    COALESCE(SUM(CASE WHEN dt.id_technology = 15 THEN level END), 0) AS T_15,
    COALESCE(SUM(CASE WHEN dt.id_technology = 19 THEN level END), 0) AS T_19,
    COALESCE(SUM(CASE WHEN dt.id_technology = 23 THEN level END), 0) AS T_23,
    COALESCE(SUM(CASE WHEN dt.id_technology = 26 THEN level END), 0) AS T_26,
    COALESCE(SUM(CASE WHEN dt.id_technology = 27 THEN level END), 0) AS T_27,
    COALESCE(SUM(CASE WHEN dt.id_technology = 28 THEN level END), 0) AS T_28,
    COALESCE(SUM(CASE WHEN dt.id_technology = 29 THEN level END), 0) AS T_29,
    COALESCE(SUM(CASE WHEN dt.id_technology = 30 THEN level END), 0) AS T_30
FROM developer d, technology t, developer_tech dt
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
GROUP BY id_dev;

/* MISMO RESULTADO OBTENIDO DE LAS TRES FORMAS: VIEWS, PIVOT Y CASES */
/*
id  T1  T2  T3  T4  T5  T6  T11 T14 T15 T19 T23 T26 T27 T28 T29 T_30
1   10  0   0   0   0   0   0   80  0   0   0   0   0   0   0   0
2   0   0   0   0   0   50  0   0   0   0   0   0   0   0   0   0
3   0   30  0   0   0   0   0   0   0   0   0   0   0   10  0   0
4   0   0   0   0   0   0   0   0   90  0   0   0   0   0   0   0
5   0   0   0   0   0   0   0   0   0   0   0   0   0   0   0   70
6   0   80  0   40  0  60   0   0   0   0   0   0   0   30  0   0
7   0   0   0   0   0   0   0   0   0   0   0   0   90  0   0   0
8   0   0   0   0   0   60  0   60  40  0   80  10  0   0   0   0
9   20  50  0   0   30  0   0   0   0   0   0   0   0   0   0   0
... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ...
*/

/* VIEWS ############################################################## VIEWS */
/* 100 ==> DROP VIEW + CREATE VIEW + DROP VIEW + CREATE VIEW + SELECT */
/* 100 ==> 0.000310  + 0.012000    + 0.000190 +  0.003000    + 0.004600 */
/* 100 ==> TOTAL ==> 0.061500 seg/sel ==> 0.006150 seg/row */

/* PIVOT ############################################################## PIVOT */
/* 100 ==> MAXIM ==> 0.006500 seg/sel */
/* 100 ==> MINIM ==> 0.005200 seg/sel */
/* 100 ==> MEDIA ==> 0.005850 seg/sel */

/* CASES ############################################################## CASES */
/* 100 ==> MAXIM ==> 0.005000 seg/sel */
/* 100 ==> MINIM ==> 0.003700 seg/sel */
/* 100 ==> MEDIA ==> 0.004350 seg/sel */

/* 100 ==> PIVOT (0.005850) es 10.513 veces más rápido que VIEWS (0.061500) */
/* 100 ==> CASES (0.004350) es 14.138 veces más rápido que VIEWS (0.061500) */
/* 100 ==> CASES (0.004350) es 1.3448 veces más rápido que PIVOT (0.005850) */

/* obtiene las puntuaciones de cada preferencia desde 9 hasta 1 */
/*
SELECT 10 - preference AS pref, id_technology AS id_t
FROM search_tech
WHERE id_search = 1
ORDER BY pref DESC;

SELECT * FROM test_view_search_1;

/* SEARCH EXCLUDE */
/*
SELECT id_dev, CONCAT(T_19,T_15,T_11,T_23,T_14,T_1) AS points
FROM test_view_group_zero
ORDER BY points DESC;

/* SEARCH OVERALL */
/*
SELECT id_dev, ((T_19*9)+(T_15*8)+(T_11*7)+(T_23*6)+(T_14*5)+(T_1*0)) AS points
FROM test_view_group_zero
ORDER BY points DESC;

/* CONSULTAS DIRECTAS CON LAS PREFERENCIAS CONCRETAS DE UNA BÚSQUEDA CONOCIDA */

/* 1-ABS(SIGN(x)) */

SELECT dt.id_developer AS id_dev,
    /* LEVEL */
    SUM(level * (1 - ABS(SIGN(st.id_technology - 1)))) AS T_1,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 11)))) AS T_11,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 14)))) AS T_14,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 15)))) AS T_15,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 19)))) AS T_19,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 23)))) AS T_23,
    /* PREFERENCE */
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 1)))) AS P_1,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 11)))) AS P_11,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 14)))) AS P_14,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 15)))) AS P_15,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 19)))) AS P_19,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 23)))) AS P_23,
    /* SCORE = LEVEL * (10 - PREFERENCE) */
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 1)))) AS S_1,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 11)))) AS S_11,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 14)))) AS S_14,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 15)))) AS S_15,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 19)))) AS S_19,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 23)))) AS S_23,
    /* TOTAL POINTS */
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 1)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 11)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 14)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 15)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 19)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 23)))) AS points
FROM developer d, technology t, developer_tech dt, search_tech st, search s
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
AND t.id_technology = st.id_technology
AND s.id_search = st.id_search
AND s.id_search = 1
GROUP BY id_dev
ORDER BY points DESC;

/* CASE WHEN x */

SELECT dt.id_developer AS id_dev,
    /* LEVEL */
    COALESCE(SUM(CASE WHEN st.id_technology = 1 THEN level END), 0) AS T_1,
    COALESCE(SUM(CASE WHEN st.id_technology = 11 THEN level END), 0) AS T_11,
    COALESCE(SUM(CASE WHEN st.id_technology = 14 THEN level END), 0) AS T_14,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN level END), 0) AS T_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 19 THEN level END), 0) AS T_19,
    COALESCE(SUM(CASE WHEN st.id_technology = 23 THEN level END), 0) AS T_23,
    /* PREFERENCE */
    COALESCE(SUM(CASE WHEN st.id_technology = 1 THEN preference END), 0) AS P_1,
    COALESCE(SUM(CASE WHEN st.id_technology = 11 THEN preference END), 0) AS P_11,
    COALESCE(SUM(CASE WHEN st.id_technology = 14 THEN preference END), 0) AS P_14,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN preference END), 0) AS P_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 19 THEN preference END), 0) AS P_19,
    COALESCE(SUM(CASE WHEN st.id_technology = 23 THEN preference END), 0) AS P_23,
    /* SCORE = LEVEL * (10 - PREFERENCE) */
    COALESCE(SUM(CASE WHEN st.id_technology = 1 THEN (10 - preference) * level END), 0) AS S_1,
    COALESCE(SUM(CASE WHEN st.id_technology = 11 THEN (10 - preference) * level END), 0) AS S_11,
    COALESCE(SUM(CASE WHEN st.id_technology = 14 THEN (10 - preference) * level END), 0) AS S_14,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN (10 - preference) * level END), 0) AS S_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 19 THEN (10 - preference) * level END), 0) AS S_19,
    COALESCE(SUM(CASE WHEN st.id_technology = 23 THEN (10 - preference) * level END), 0) AS S_23,
    /* TOTAL POINTS */
    COALESCE(SUM(CASE WHEN st.id_technology = 1 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 11 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 14 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 19 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 23 THEN (10 - preference) * level END), 0) AS points
FROM developer d, technology t, developer_tech dt, search_tech st, search s
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
AND t.id_technology = st.id_technology
AND s.id_search = st.id_search
AND s.id_search = 1
GROUP BY id_dev
ORDER BY points DESC;

/* MISMO RESULTADO OBTENIDO DE LAS DOS FORMAS: 1-ABS(SIGN(x)) Y CASE WHEN x */
/*
id  T1  T11 T14 T15 T19 T23 P1  P11 P14 P15 P19 P23 S1  S11 S14 S15 S19 S23 ptos
10  4   8   7   3   0   7   0   3   5   2   0   4   40  56  35  24  0   42  197
76  0   1   0   0   6   1   0   3   0   0   1   4   0   70  0   0   54  60  184
52  4   0   0   1   7   0   0   0   0   2   1   0   40  0   0   80  63  0   183
60  9   0   3   0   5   4   0   0   5   0   1   4   90  0   15  0   45  24  174
43  7   0   0   5   0   1   0   0   0   2   0   4   70  0   0   40  0   60  170
33  0   2   0   0   1   1   0   3   0   0   1   4   0   14  0   0   90  60  164
11  2   5   0   9   0   4   0   3   0   2   0   4   20  35  0   72  0   24  151
42  0   0   0   8   9   0   0   0   0   2   1   0   0   0   0   64  81  0   145
23  0   0   0   6   8   3   0   0   0   2   1   4   0   0   0   48  72  18  138
... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ...
*/

/* 1-ABS(SIGN(x)) ############################################################## 1-ABS(SIGN(x)) */
/* 100 ==> MAXIM ==> 0.003600 seg/sel */
/* 100 ==> MINIM ==> 0.002400 seg/sel */
/* 100 ==> MEDIA ==> 0.003050 seg/sel */

/* CASE WHEN x ################################################################# CASE WHEN x */
/* 100 ==> MAXIM ==> 0.003200 seg/sel */
/* 100 ==> MINIM ==> 0.002000 seg/sel */
/* 100 ==> MEDIA ==> 0.002450 seg/sel */

/* 100 ==> CASE WHEN x (0.002450) es 1.2449 veces más rápido que 1-ABS(SIGN(x)) (0.003050) */
