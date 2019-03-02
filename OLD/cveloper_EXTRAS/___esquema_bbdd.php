user
	id_user
	email
	password (hash)
	type (??)

type (pendiente de consulta ??)


developer
	id_developer
	alias
	first_name
	last_name
	address
	postal_code
	city
	country
	phone
	link_github
	link_linkedin
	avatar
	id_template

training 
	id_training
	degree
	institution
	city
	finish_date
	id_developer (FK)

experience
	id_experience
	position
	company
	finish_date
	duration
	id_developer (FK)

additional
	id_additional
	description
	id_developer (FK)

recruiter
	id_recruiter
	name
	link_github
	link_linkedin
	avatar

company
	id_company
	company_name
	alias
	address
	postal_code
	cityFOREIGN KEY (id_developer) REFERENCES developer (id_developer),
	country
	contact_phone
	link_github
	link_linkedin
	avatar

academy
	id_academy
	academy_name
	alias
	address
	postal_code
	city
	country
	contact_phone
	link_github
	link_linkedin
	avatar

technology
	id_technology
	tech_name

templates
	id_template (FK)
	template_name
	thumbnail
	designer (link a la pagina/github)
	developer (link a la pagina/github)

job_offer
	id_job_offer
	position
	working_day
	contract_type
	salary
	description
	id_company (fk)	

training_offer
	id_training_offer
	schedule
	training_name
	description
	id_academy (fk)

convenio-agreement (pendiente de implantación)


search
	id_search
	search_name
	date
	id_user (fk)

search_tech
	id_search (fk)
	id_technology (fk)
			constraint->id_search + id_technology (pk)
	preference

developer_tech
	id_developer (fk)
	id_technology (fk)
			constraint->id_developer + id_technology (pk)
	level

tech_company
	id_company (fk)
	id_technology (fk)
			constraint->id_company + id_technology (pk)

tech_job_offer
	id_job_offer (fk)
	id_technology (fk)
			constraint->id_job_offer + id_technology (pk)	
	preference

tech_training_offer
	id_training_offer (fk)
	id_technology (fk)
			constraint->id_training_offer + id_technology (pk)



developer_job_offer 
	id_developer (FK)
	id_job_offer (FK)
	order INT AUTO-INCREMENT