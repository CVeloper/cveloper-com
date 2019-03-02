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