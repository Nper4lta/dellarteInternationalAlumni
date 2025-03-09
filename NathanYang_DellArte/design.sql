drop table users cascade constraints;

create table users
(user_id	integer,
 user_type	varchar2(5) check (user_type in ('admin', 'user')),
 first_name	varchar2(30),
 last_name	varchar2(30),
 username	varchar2(30),
 password_hash	varchar2(80),
 email		varchar2(50),
 address	varchar2(30),
 city		varchar2(50),
 state_province	varchar2(50),
 phone_number	char(12),
 biography	varchar2(700),
 is_verified	char(1) check(is_verified in ('y', 'n')),
 primary key	(user_id)
);


drop table admin cascade constraints;

create table admin
(user_id	integer,
 primary key (user_id),
 foreign key (user_id) references users
);

drop table alumni cascade constraints;

create table alumni
(user_id	integer,
 primary key (user_id),
 foreign key (user_id) references users
);


drop table program cascade constraints;

create table program
(program_id	integer,
 name		varchar2(50),
 primary key (program_id)
);


drop table programs_attended cascade constraints;

create table programs_attended
(user_id	integer,
 program_id	integer,
 primary key (user_id, program_id),
 foreign key (user_id) references users,
 foreign key (program_id) references program
);
