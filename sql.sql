CREATE DATABASE university;
use university;

CREATE TABLE student( student_id int AUTO_INCREMENT NOT NULL, name varchar(25), program varchar(25), PRIMARY KEY (student_id) );

CREATE TABLE course( course_no int AUTO_INCREMENT NOT NULL, title varchar(25), pre_req varchar(255), syllabus varchar(25), credits int, PRIMARY KEY (course_no) );

CREATE TABLE instructor( instructor_id int AUTO_INCREMENT NOT NULL, name varchar(25), title varchar(25), dept varchar(25), PRIMARY KEY (instructor_id) );

CREATE TABLE course_offering( course_no int NOT NULL, instructor_id int NOT NULL, year year, sem int, sec_no int, timing varchar(25), classroom varchar(25), FOREIGN KEY (course_no) REFERENCES course(course_no), FOREIGN KEY (instructor_id) REFERENCES instructor(instructor_id) );

CREATE TABLE enrolls_in( student_id int NOT NULL, course_no int NOT NULL, garde DECIMAL, FOREIGN KEY (student_id) REFERENCES student(student_id), FOREIGN KEY (course_no) REFERENCES course(course_no) );