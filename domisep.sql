create database domisep;
use domisep;

create table home (home_id char(4) primary key,
				   address varchar(200));
                   
 create table Room (room_id char(4) primary key,
					address varchar(50) references home(home_id),
					name_room varchar(50));                     

create table users (u_id char(4) primary key,
					u_name varchar(50),
                    u_password decimal(10),
                    u_email varchar(200));
                    
create table sensors (sensor_id char(4) primary key,
					  positioned char(4) references Room(room_id),
                      sensorvalues decimal(10,3),
                      sensorname varchar(50));
					  positioned char(4) references Room(room_id),
					  sensorvalue decimal(10,1));
                      
create table actuators_1 (actuator_id char(4) primary key,
					      positioned char(4) references Room(room_id),
                          actuatorname varchar(50),
                          state char(1));
                          
create table actuators_2 (actuator_id char(4) primary key,
					      positioned char(4) references Room(room_id),
                          actuatorname varchar(50),
                          state char(1),
                          settingvalue char(3));
 
                          
                          
                          
                          
                          