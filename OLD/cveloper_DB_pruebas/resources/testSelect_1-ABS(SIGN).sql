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