#!"D:\Software\xampp\htdocs\strawberry\perl\bin\perl.exe"

use strict;
use warnings;
use DBI;
use CGI qw(:standard);
use CGI::carp qw(fatalsToBrowser);

print "Content-type: text/html \n\n";



my $Date1 = param('Date1');
my $Huzefa_polaiwala = param('Huzefa_polaiwala');
my $Bhavik_panchal = param('Bhavik_panchal');
my $Mustufa_neemuchwala = param('Mustufa_neemuchwala');
my $Keyush_rawal = param('Keyush_rawal');


my $driver = "SQLite";
my $database = "project.db";
my $dsn = "DBI:$driver:dbname=$database";
my $userid = "";
my $password = "" ;


my $dbh = DBI ->connect($dsn,$userid, $password ,{RaiseError =>1}) or die $DBI::errstr;

print ("Connection succesfull \n");


my $insert_stmt = $dbh->prepare("INSERT INTO  Studenta(Date1,Huzefa_polaiwala,Bhavik_panchal,Mustufa_neemuchwala,Keyush_rawal) VALUES(?,?,?,?,?)");




$insert_stmt->execute($Date1,$Huzefa_polaiwala,$Bhavik_panchal,$Mustufa_neemuchwala,$Keyush_rawal) or die $DBI::errstr;
$insert_stmt->finish();
$dbh->commit or die $DBI::errstr;


print('Value insert');
