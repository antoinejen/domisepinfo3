create database domisep;
use domisep;

create table home (home_id char(4) primary key auto_increment,
		   home_address varchar(200) unique);
                   
 create table room (room_id char(4) primary key auto_increment,
		    home_id char(4),
                    CONSTRAINT room_fk1 foreign key (home_id) references home(home_id),
		    room_name varchar(50)); 

create table users (user_id char(4) primary key auto_increment,
		    home_id char(4),
                    CONSTRAINT users_fk1 foreign key (home_id)references home(home_id));
		    user_login varchar(50),
                    user_name varchar(50),
                    user_password int(10),
                    user_email varchar(200),
                    user_priviledge tinyint(1);

create table home_user (homeid varchar(10),
			userid varchar(10));

ALTER TABLE home_user ADD CONSTRAINT sj_pk PRIMARY KEY(homeid,userid);
ALTER TABLE home_user ADD CONSTRAINT hu_fk1 FOREIGN KEY(homeid) REFERENCES home(home_id);
ALTER TABLE home_user ADD CONSTRAINT hu_fk2 FOREIGN KEY(userid) REFERENCES users(u_id);

create table admin (admin_id char(6) primary key auto_increment,
		    admin_password int(10),
                    admin_email varchar(200));
                    
create table actuators (actuator_id char(4) primary key auto_increment,
                        room_id char(4),
                        CONSTRAINT actuators_fk1 foreign key (room_id)references room(room_id),
			actuator_name varchar(50),
			actuator_state tinyint(1));

create table sensors (sensor_id char(4) primary key auto_increment,
                      actuator_id char(4),
                      CONSTRAINT sensors_fk1 foreign key (actuator_id)references actuators(actuator_id),
                      sensor_value decimal(10,3),
                      sensor_name varchar(50),
                      sensor_unit varchar(10));
			
create table historydata (data_id char(4) primary key auto_increment,
			  sensor_id char(4),
			  CONSTRAINT historydata_fk1 foreign key (sensor_id) references sensors(sensor_id),
			  datetime varchar(8),
			  data_value decimal(10,3),
			  data_name varchar(50),
			  data_unit varchar(10));
                         
                          
                          
                          
                          
