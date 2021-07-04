#!"D:\Software\xampp\htdocs\strawberry\perl\bin\perl.exe"

use strict;
use warnings;
use DBI;
use CGI qw(:standard);
use CGI::carp qw(fatalsToBrowser);

print "Content-type: text/html \n\n";



my $first_name = param('first_name');
my $last_name = param('last_name');
my $gender = param('gender');
my $branch = param('branch');
my $email = param('email');
my $phone = param('phone');



my $driver = "SQLite";
my $database = "project.db";
my $dsn = "DBI:$driver:dbname=$database";
my $userid = "";
my $password = "" ;


my $dbh = DBI ->connect($dsn,$userid, $password ,{RaiseError =>1}) or die $DBI::errstr;

print ("Connection succesfull \n");


my $insert_stmt = $dbh->prepare("INSERT INTO  Facultyp(first_name,last_name,gender,branch,email,phone) VALUES(?,?,?,?,?,?)");




$insert_stmt->execute($first_name,$last_name,$gender,$branch,$email,$phone) or die $DBI::errstr;
$insert_stmt->finish();
$dbh->commit or die $DBI::errstr;


print('Value insert');
