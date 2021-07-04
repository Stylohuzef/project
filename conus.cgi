#!"D:\Software\xampp\htdocs\strawberry\perl\bin\perl.exe"

use strict;
use warnings;
use DBI;
use CGI qw(:standard);
use CGI::carp qw(fatalsToBrowser);

print "Content-type: text/html \n\n";



my $Fname = param('Fname');
my $Email = param('Email');
my $Message = param('Message');



my $driver = "SQLite";
my $database = "project.db";
my $dsn = "DBI:$driver:dbname=$database";
my $userid = "";
my $password = "" ;


my $dbh = DBI ->connect($dsn,$userid, $password ,{RaiseError =>1}) or die $DBI::errstr;

print ("Connection succesfull \n");


my $insert_stmt = $dbh->prepare("INSERT INTO  Contactus(Fname,Email,Message) VALUES(?,?,?)");




$insert_stmt->execute($Fname,$Email,$Message) or die $DBI::errstr;
$insert_stmt->finish();
$dbh->commit or die $DBI::errstr;


print('Value insert');
