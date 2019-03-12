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