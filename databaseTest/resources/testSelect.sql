drop view if exists cveloper_search;

create view cveloper_search as (
	select alias, tech_name, level,
    case when dt.id_technology = 1 then level end as tech1,
    case when dt.id_technology = 11 then level end as tech11,
    case when dt.id_technology = 14 then level end as tech14,
    case when dt.id_technology = 15 then level end as tech15,
    case when dt.id_technology = 19 then level end as tech19,
    case when dt.id_technology = 23 then level end as tech23
    FROM developer d, technology t, developer_tech dt
    WHERE d.id_developer=dt.id_developer
    AND t.id_technology=dt.id_technology
    AND dt.id_technology IN (
		SELECT id_technology
        FROM search_tech
        WHERE id_search = 1
	)
    ORDER BY alias
);

select * from cveloper_search;
