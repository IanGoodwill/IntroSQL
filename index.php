<?php
require './connection.php';

$connection->select_db( 'w10b' );

?>
<h1>List of instructors</h1>
<?php

if( $connection->error )
{
    echo 'Error encountered connecting to W10b! Please review: ' . $connection->error;// print the error property string! what happened?
    die; // terminate execution.
} 

$sql = 'SELECT instructor_name FROM instructors;';

if( $result = $connection->query( $sql ) )
{
    while ( $row = $result->fetch_assoc() ) {
        foreach( $row as $key => $value)
            echo  '<br>' . $key .  ': ' . $value;

    }      
}
?>
<h1>List of courses and instructors</h1>
<?php
$sql = 'SELECT courses.name AS name, instructors.instructor_name AS instructor_name FROM instructors JOIN courses ON instructors.id = courses.instructor_id;'; // cant both be calling name

if( $result = $connection->query( $sql ) )
{
    while ( $row = $result->fetch_assoc() ) {
        foreach( $row as $key => $value)
            echo  '<br>' . $key .  ': ' . $value;

    }      
}

?>
<h1>List of students taking science</h1>
<?php
$sql = 'SELECT c.name, s.name FROM courses c JOIN course_student cs ON c.id = cs.course_id JOIN students s ON cs.student_id=s.id WHERE c.id=2;';
										
if( $result = $connection->query( $sql ) )
{
    while ( $row = $result->fetch_assoc() ) {
        foreach( $row as $key => $value)
            echo  '<br>' . $key .  ': ' . $value;

    }      
}


?>
<h1>List of courses that student 5 is enrolled in</h1>
<?php
$sql = 'SELECT courses.name AS name, courses.id AS id, students.id AS id, course_student.course_id AS courses_id, course_student.student_id AS students_id FROM students JOIN course_student ON students.id = course_student.student_id JOIN courses ON courses.id = course_student.course_id WHERE students.id=5;';
										
if( $result = $connection->query( $sql ) )
{
    while ( $row = $result->fetch_assoc() ) {
        foreach( $row as $key => $value)
            echo  '<br>' . $key .  ': ' . $value;

            

    }      
}

?>
<h1>List of students and their phone numbers</h1>
<?php
$sql = 'SELECT students.name AS name, students.id AS id, phones.phone_number AS phone_number, phones.student_id AS student_id FROM students JOIN phones ON students.id = phones.student_id;';

if( $result = $connection->query( $sql ) )
{
    while ( $row = $result->fetch_assoc() ) {
        foreach( $row as $key => $value)
            echo  '<br>' . $key .  ': ' . $value;

            

    }      
}