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

SELECT d.id_developer AS id_dev,
    COALESCE(t1.level, 0) AS T_1,
    COALESCE(t2.level, 0) AS T_2,
    COALESCE(t3.level, 0) AS T_3,
    COALESCE(t4.level, 0) AS T_4,
    COALESCE(t5.level, 0) AS T_5,
    COALESCE(t6.level, 0) AS T_6,
    COALESCE(t11.level, 0) AS T_11,
    COALESCE(t14.level, 0) AS T_14,
    COALESCE(t15.level, 0) AS T_15,
    COALESCE(t19.level, 0) AS T_19,
    COALESCE(t23.level, 0) AS T_23,
    COALESCE(t26.level, 0) AS T_26,
    COALESCE(t27.level, 0) AS T_27,
    COALESCE(t28.level, 0) AS T_28,
    COALESCE(t29.level, 0) AS T_29,
    COALESCE(t30.level, 0) AS T_30
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
LEFT JOIN developer_tech t19
    ON t19.id_developer = d.id_developer
    AND t19.id_technology = 19
LEFT JOIN developer_tech t23
    ON t23.id_developer = d.id_developer
    AND t23.id_technology = 23
LEFT JOIN developer_tech t26
    ON t26.id_developer = d.id_developer
    AND t26.id_technology = 26
LEFT JOIN developer_tech t27
    ON t27.id_developer = d.id_developer
    AND t27.id_technology = 27
LEFT JOIN developer_tech t28
    ON t28.id_developer = d.id_developer
    AND t28.id_technology = 28
LEFT JOIN developer_tech t29
    ON t29.id_developer = d.id_developer
    AND t29.id_technology = 29
LEFT JOIN developer_tech t30
    ON t30.id_developer = d.id_developer
    AND t30.id_technology = 30;

/* MISMO RESULTADO OBTENIDO DE LAS 4 FORMAS: VIEWS, PIVOT, CASES Y JOINS */
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

/* JOINS ############################################################## JOINS */
/* 100 ==> MAXIM ==> 0.005800 seg/sel */
/* 100 ==> MINIM ==> 0.004500 seg/sel */
/* 100 ==> MEDIA ==> 0.005150 seg/sel */

/* 100 ==> PIVOT (0.005850) es 10.513 veces más rápido que VIEWS (0.061500) */
/* 100 ==> CASES (0.004350) es 14.138 veces más rápido que VIEWS (0.061500) */
/* 100 ==> JOINS (0.005150) es 11.942 veces más rápido que VIEWS (0.061500) */

/* 100 ==> CASES (0.004350) es 1.3448 veces más rápido que PIVOT (0.005850) */
/* 100 ==> JOINS (0.005150) es 1.1359 veces más rápido que PIVOT (0.005850) */
/* 100 ==> CASES (0.004350) es 1.1839 veces más rápido que JOINS (0.005150) */

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

/* #############################################################################
RESULTADOS:
    - Se descarta el método VIEWS por lentitud y complejidad de ejecución.
    - Se simplifican y optimizan los pasos de VIEWS en el método CASES.
    - Estas consultas sólo tienen sentido para crear vistas precalculadas.
    - Las vistas implican ejecutar una tarea cada poco tiempo en el servidor.
    - Hay dos problemas: el límite de columnas y el límite de bytes por fila.
    - https://dev.mysql.com/doc/refman/5.7/en/column-count-limit.html
    - "MySQL has hard limit of 4096 columns per table."
    - "The internal representation of a MySQL table has a maximum row size limit of 65,535 bytes."
    - POR ESTOS MOTIVOS SE DESCARTAN LOS MÉTODOS PIVOT, CASES Y JOINS CON VIEW.
    - Sería un buen método si crecieran las filas pero no el número de columnas.
############################################################################# */

/* CONSULTAS DIRECTAS CON LAS PREFERENCIAS CONCRETAS DE UNA BÚSQUEDA CONOCIDA */

/* 1-ABS(SIGN) ############################################################## */

SELECT dt.id_developer AS id_dev,
    /* LEVEL */
    SUM(level * (1 - ABS(SIGN(st.id_technology -  4)))) AS L_4 ,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 27)))) AS L_27,
    SUM(level * (1 - ABS(SIGN(st.id_technology -  9)))) AS L_9 ,
    SUM(level * (1 - ABS(SIGN(st.id_technology -  3)))) AS L_3 ,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 25)))) AS L_25,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 21)))) AS L_21,
    SUM(level * (1 - ABS(SIGN(st.id_technology -  2)))) AS L_2 ,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 15)))) AS L_15,
    SUM(level * (1 - ABS(SIGN(st.id_technology - 12)))) AS L_12,
    SUM(level * (1 - ABS(SIGN(st.id_technology -  1)))) AS L_1 ,
    /* PREFERENCE */
    SUM(preference * (1 - ABS(SIGN(st.id_technology -  4)))) AS P_4 ,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 27)))) AS P_27,
    SUM(preference * (1 - ABS(SIGN(st.id_technology -  9)))) AS P_9 ,
    SUM(preference * (1 - ABS(SIGN(st.id_technology -  3)))) AS P_3 ,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 25)))) AS P_25,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 21)))) AS P_21,
    SUM(preference * (1 - ABS(SIGN(st.id_technology -  2)))) AS P_2 ,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 15)))) AS P_15,
    SUM(preference * (1 - ABS(SIGN(st.id_technology - 12)))) AS P_12,
    SUM(preference * (1 - ABS(SIGN(st.id_technology -  1)))) AS P_1 ,
    /* SCORE = LEVEL * (10 - PREFERENCE) */
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  4)))) AS S_4 ,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 27)))) AS S_27,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  9)))) AS S_9 ,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  3)))) AS S_3 ,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 25)))) AS S_25,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 21)))) AS S_21,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  2)))) AS S_2 ,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 15)))) AS S_15,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 12)))) AS S_12,
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  1)))) AS S_1 ,
    /* TOTAL POINTS OVERALL */
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  4)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 27)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  9)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  3)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 25)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 21)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  2)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 15)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology - 12)))) +
    SUM((10 - preference) * level * (1 - ABS(SIGN(st.id_technology -  1)))) AS points,
    /* TOTAL EXCLUDE STRING */
    CONCAT(
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology -  4)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology - 27)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology -  9)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology -  3)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology - 25)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology - 21)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology -  2)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology - 15)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology - 12)))), 0),
    COALESCE(SUM(level * (1 - ABS(SIGN(st.id_technology -  1)))), 0)) AS string
FROM developer d, technology t, developer_tech dt, search_tech st, search s
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
AND t.id_technology = st.id_technology
AND s.id_search = st.id_search
AND s.id_search = 1
GROUP BY id_dev
ORDER BY points DESC, string DESC;

/* CASE_WHEN ################################################################ */

SELECT dt.id_developer AS id_dev,
    /* LEVEL */
    COALESCE(SUM(CASE WHEN st.id_technology =  4 THEN level END), 0) AS L_4 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 27 THEN level END), 0) AS L_27,
    COALESCE(SUM(CASE WHEN st.id_technology =  9 THEN level END), 0) AS L_9 ,
    COALESCE(SUM(CASE WHEN st.id_technology =  3 THEN level END), 0) AS L_3 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 25 THEN level END), 0) AS L_25,
    COALESCE(SUM(CASE WHEN st.id_technology = 21 THEN level END), 0) AS L_21,
    COALESCE(SUM(CASE WHEN st.id_technology =  2 THEN level END), 0) AS L_2 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN level END), 0) AS L_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 12 THEN level END), 0) AS L_12,
    COALESCE(SUM(CASE WHEN st.id_technology =  1 THEN level END), 0) AS L_1 ,
    /* PREFERENCE */
    COALESCE(SUM(CASE WHEN st.id_technology =  4 THEN preference END), 0) AS P_4 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 27 THEN preference END), 0) AS P_27,
    COALESCE(SUM(CASE WHEN st.id_technology =  9 THEN preference END), 0) AS P_9 ,
    COALESCE(SUM(CASE WHEN st.id_technology =  3 THEN preference END), 0) AS P_3 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 25 THEN preference END), 0) AS P_25,
    COALESCE(SUM(CASE WHEN st.id_technology = 21 THEN preference END), 0) AS P_21,
    COALESCE(SUM(CASE WHEN st.id_technology =  2 THEN preference END), 0) AS P_2 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN preference END), 0) AS P_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 12 THEN preference END), 0) AS P_12,
    COALESCE(SUM(CASE WHEN st.id_technology =  1 THEN preference END), 0) AS P_1 ,
    /* SCORE = LEVEL * (10 - PREFERENCE) */
    COALESCE(SUM(CASE WHEN st.id_technology =  4 THEN (10 - preference) * level END), 0) AS S_4 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 27 THEN (10 - preference) * level END), 0) AS S_27,
    COALESCE(SUM(CASE WHEN st.id_technology =  9 THEN (10 - preference) * level END), 0) AS S_9 ,
    COALESCE(SUM(CASE WHEN st.id_technology =  3 THEN (10 - preference) * level END), 0) AS S_3 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 25 THEN (10 - preference) * level END), 0) AS S_25,
    COALESCE(SUM(CASE WHEN st.id_technology = 21 THEN (10 - preference) * level END), 0) AS S_21,
    COALESCE(SUM(CASE WHEN st.id_technology =  2 THEN (10 - preference) * level END), 0) AS S_2 ,
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN (10 - preference) * level END), 0) AS S_15,
    COALESCE(SUM(CASE WHEN st.id_technology = 12 THEN (10 - preference) * level END), 0) AS S_12,
    COALESCE(SUM(CASE WHEN st.id_technology =  1 THEN (10 - preference) * level END), 0) AS S_1 ,
    /* TOTAL POINTS OVERALL */
    COALESCE(SUM(CASE WHEN st.id_technology =  4 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 27 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology =  9 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology =  3 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 25 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 21 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology =  2 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology = 12 THEN (10 - preference) * level END), 0) +
    COALESCE(SUM(CASE WHEN st.id_technology =  1 THEN (10 - preference) * level END), 0) AS points,
    /* TOTAL EXCLUDE STRING */
    CONCAT(
    COALESCE(SUM(CASE WHEN st.id_technology =  4 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology = 27 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology =  9 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology =  3 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology = 25 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology = 21 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology =  2 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology = 15 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology = 12 THEN level END), 0),
    COALESCE(SUM(CASE WHEN st.id_technology =  1 THEN level END), 0)) AS string
FROM developer d, technology t, developer_tech dt, search_tech st, search s
WHERE d.id_developer = dt.id_developer
AND t.id_technology = dt.id_technology
AND t.id_technology = st.id_technology
AND s.id_search = st.id_search
AND s.id_search = 1
GROUP BY id_dev
ORDER BY points DESC, string DESC;

/* LEFT_JOIN ############################################################### */

SELECT base.id_dev,
    /* LEVEL */
    COALESCE(MAX(dt4 .level), 0) AS L_4 ,
    COALESCE(MAX(dt27.level), 0) AS L_27,
    COALESCE(MAX(dt9 .level), 0) AS L_9 ,
    COALESCE(MAX(dt3 .level), 0) AS L_3 ,
    COALESCE(MAX(dt25.level), 0) AS L_25,
    COALESCE(MAX(dt21.level), 0) AS L_21,
    COALESCE(MAX(dt2 .level), 0) AS L_2 ,
    COALESCE(MAX(dt15.level), 0) AS L_15,
    COALESCE(MAX(dt12.level), 0) AS L_12,
    COALESCE(MAX(dt1 .level), 0) AS L_1 ,
    /* PREFERENCE */
    COALESCE(MAX(st4 .preference), 0) AS P_4 ,
    COALESCE(MAX(st27.preference), 0) AS P_27,
    COALESCE(MAX(st9 .preference), 0) AS P_9 ,
    COALESCE(MAX(st3 .preference), 0) AS P_3 ,
    COALESCE(MAX(st25.preference), 0) AS P_25,
    COALESCE(MAX(st21.preference), 0) AS P_21,
    COALESCE(MAX(st2 .preference), 0) AS P_2 ,
    COALESCE(MAX(st15.preference), 0) AS P_15,
    COALESCE(MAX(st12.preference), 0) AS P_12,
    COALESCE(MAX(st1 .preference), 0) AS P_1 ,
    /* SCORE = LEVEL * (10 - PREFERENCE) */
    COALESCE(MAX((10 - st4 .preference) * dt4 .level), 0) AS S_4 ,
    COALESCE(MAX((10 - st27.preference) * dt27.level), 0) AS S_27,
    COALESCE(MAX((10 - st9 .preference) * dt9 .level), 0) AS S_9 ,
    COALESCE(MAX((10 - st3 .preference) * dt3 .level), 0) AS S_3 ,
    COALESCE(MAX((10 - st25.preference) * dt25.level), 0) AS S_25,
    COALESCE(MAX((10 - st21.preference) * dt21.level), 0) AS S_21,
    COALESCE(MAX((10 - st2 .preference) * dt2 .level), 0) AS S_2 ,
    COALESCE(MAX((10 - st15.preference) * dt15.level), 0) AS S_15,
    COALESCE(MAX((10 - st12.preference) * dt12.level), 0) AS S_12,
    COALESCE(MAX((10 - st1 .preference) * dt1 .level), 0) AS S_1 ,
    /* TOTAL POINTS OVERALL */
    COALESCE(MAX((10 - st4 .preference) * dt4 .level), 0) +
    COALESCE(MAX((10 - st27.preference) * dt27.level), 0) +
    COALESCE(MAX((10 - st9 .preference) * dt9 .level), 0) +
    COALESCE(MAX((10 - st3 .preference) * dt3 .level), 0) +
    COALESCE(MAX((10 - st25.preference) * dt25.level), 0) +
    COALESCE(MAX((10 - st21.preference) * dt21.level), 0) +
    COALESCE(MAX((10 - st2 .preference) * dt2 .level), 0) +
    COALESCE(MAX((10 - st15.preference) * dt15.level), 0) +
    COALESCE(MAX((10 - st12.preference) * dt12.level), 0) +
    COALESCE(MAX((10 - st1 .preference) * dt1 .level), 0) AS points,
    /* TOTAL EXCLUDE STRING */
    CONCAT(
    COALESCE(MAX(dt4 .level), 0),
    COALESCE(MAX(dt27.level), 0),
    COALESCE(MAX(dt9 .level), 0),
    COALESCE(MAX(dt3 .level), 0),
    COALESCE(MAX(dt25.level), 0),
    COALESCE(MAX(dt21.level), 0),
    COALESCE(MAX(dt2 .level), 0),
    COALESCE(MAX(dt15.level), 0),
    COALESCE(MAX(dt12.level), 0),
    COALESCE(MAX(dt1 .level), 0)) AS string
FROM (
        SELECT dt.id_developer AS id_dev, st.id_technology AS tech
        FROM developer d, technology t, developer_tech dt, search_tech st, search s
        WHERE d.id_developer = dt.id_developer
        AND t.id_technology = dt.id_technology
        AND t.id_technology = st.id_technology
        AND s.id_search = st.id_search
        AND s.id_search = 1
    ) AS base
LEFT JOIN (developer_tech dt4 , search_tech st4 )
    ON  dt4 .id_technology = st4 .id_technology
    AND dt4 .id_developer = base.id_dev
    AND st4 .id_technology = base.tech
    AND st4 .id_technology = 4
LEFT JOIN (developer_tech dt27, search_tech st27)
    ON  dt27.id_technology = st27.id_technology
    AND dt27.id_developer = base.id_dev
    AND st27.id_technology = base.tech
    AND st27.id_technology = 27
LEFT JOIN (developer_tech dt9 , search_tech st9 )
    ON  dt9 .id_technology = st9 .id_technology
    AND dt9 .id_developer = base.id_dev
    AND st9 .id_technology = base.tech
    AND st9 .id_technology = 9
LEFT JOIN (developer_tech dt3 , search_tech st3 )
    ON  dt3 .id_technology = st3 .id_technology
    AND dt3 .id_developer = base.id_dev
    AND st3 .id_technology = base.tech
    AND st3 .id_technology = 3
LEFT JOIN (developer_tech dt25, search_tech st25)
    ON  dt25.id_technology = st25.id_technology
    AND dt25.id_developer = base.id_dev
    AND st25.id_technology = base.tech
    AND st25.id_technology = 25
LEFT JOIN (developer_tech dt21, search_tech st21)
    ON  dt21.id_technology = st21.id_technology
    AND dt21.id_developer = base.id_dev
    AND st21.id_technology = base.tech
    AND st21.id_technology = 21
LEFT JOIN (developer_tech dt2 , search_tech st2 )
    ON  dt2 .id_technology = st2 .id_technology
    AND dt2 .id_developer = base.id_dev
    AND st2 .id_technology = base.tech
    AND st2 .id_technology = 2
LEFT JOIN (developer_tech dt15, search_tech st15)
    ON  dt15.id_technology = st15.id_technology
    AND dt15.id_developer = base.id_dev
    AND st15.id_technology = base.tech
    AND st15.id_technology = 15
LEFT JOIN (developer_tech dt12, search_tech st12)
    ON  dt12.id_technology = st12.id_technology
    AND dt12.id_developer = base.id_dev
    AND st12.id_technology = base.tech
    AND st12.id_technology = 12
LEFT JOIN (developer_tech dt1 , search_tech st1 )
    ON  dt1 .id_technology = st1 .id_technology
    AND dt1 .id_developer = base.id_dev
    AND st1 .id_technology = base.tech
    AND st1 .id_technology = 1
GROUP BY id_dev
ORDER BY points DESC, string DESC;

/* MISMO RESULTADO OBTENIDO DE LAS TRES FORMAS: 1-ABS(SIGN), CASE_WHEN Y LEFT_JOIN */
/*
id  . L19 L15 L11 L23 L14 . P19 P15 P11 P23 P14 S19 . S15 S11 S23 S14 . pts  str
10  . 0   3   8   7   7   . 0   2   3   4   5   0   . 24  56  42  35  . 197 03877
76  . 6   0   1   1   0   . 1   0   3   4   0   54  . 0   70  60  0   . 184 60110
52  . 7   1   0   0   0   . 1   2   0   0   0   63  . 80  0   0   0   . 183 71000
60  . 5   0   0   4   3   . 1   0   0   4   5   45  . 0   0   24  15  . 174 50043
43  . 0   5   0   1   0   . 0   2   0   4   0   0   . 40  0   60  0   . 170 05010
33  . 1   0   2   1   0   . 1   0   3   4   0   90  . 0   14  60  0   . 164 10210
11  . 0   9   5   4   0   . 0   2   3   4   0   0   . 72  35  24  0   . 151 09540
42  . 9   8   0   0   0   . 1   2   0   0   0   81  . 64  0   0   0   . 145 98000
23  . 8   6   0   3   0   . 1   2   0   4   0   72  . 48  0   18  0   . 138 86030
... . ... ... ... ... ... . ... ... ... ... ... ... . ... ... ... ... . ... .....
*/

/* 1-ABS(SIGN) ################################################## 1-ABS(SIGN) */
/* 100 ==>  0.0080 seg/sel */

/* CASE_WHEN ###################################################### CASE_WHEN */
/* 100 ==> 0.0045 seg/sel */

/* LEFT_JOIN ###################################################### LEFT_JOIN */
/* 100 ==> 0.0110 seg/sel */
