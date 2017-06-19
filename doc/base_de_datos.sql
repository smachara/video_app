CREATE DATABASE IF NOT EXISTS videos_application;
USE videos_application;

CREATE TABLE users(
id          int(255) auto_increment not null,
role        varchar(20),
name        varchar(255),user_id
surname     varchar(255),
email       varchar(255),
password    varchar(255),
image       varchar(255),
created_at  datetime,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb; 
		
CREATE TABLE videos(
id          int(255) auto_increment not null,
user_id     int(255) not null,
title       varchar(255),
description text,
status      varchar(20),
image       varchar(255),
video_path  varchar(255),
created_at  datetime DEFAULT NULL,
updated_at  datetime DEFAULT NULL,
CONSTRAINT  pk_videos PRIMARY KEY(id),
CONSTRAINT  fk_videos_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE comments(
id          int(255) auto_increment not null,
video_id    int(255) not null,
user_id     int(255) not null,
body        text,
created_at  datetime DEFAULT NULL,
CONSTRAINT pk_comment PRIMARY KEY(id),
CONSTRAINT fk_comment_video FOREIGN KEY(video_id) REFERENCES videos(id),
CONSTRAINT fk_comment_user  FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

------------------------------------------------------------------------
	php bin/console doctrine:generate:entity \
		--entity=ModelBundle:User \
		--format=annotation \
		--fields=" 
			role:string(length=20 nullable=true unique=false) \
			name:string(length=255 nullable=true unique=false) \
			surname:string(length=255 nullable=true unique=true) \
			email:string(length=255 nullable=true unique=true) \
			password:string(length=255 nullable=true unique=false) \
			image:string(length=255 nullable=true unique=false) \
			created_at:datetime \
 	    " \
		--no-interaction

	php bin/console doctrine:generate:entity \
		--entity=ModelBundle:Video \
		--format=annotation \
		--fields=" 
				user:integer
				title:string(length=20 nullable=true unique=false) \
				description:text \
				status:string(length=255 nullable=true unique=false) \
				image:string(length=255 nullable=true unique=false) \
				video_path:string(length=255 nullable=true unique=false) \
				created_at:datetime \
				updated_at:datetime \
 	    " \
		--no-interaction

	php bin/console doctrine:generate:entity \
		--entity=ModelBundle:Comment \
		--format=annotation \
		--fields=" 
					video:integer \
					user:integer \
					video:integer \
					body:text \
					created_at:datetime \
				" \
		--no-interaction
