#!"D:\Software\xampp\htdocs\strawberry\perl\bin\perl.exe"

use strict;
use warnings;
use DBI;
use CGI qw(:standard);
use CGI::carp qw(fatalsToBrowser);

print "Content-type: text/html \n\n";



my $Date1 = param('Date1');
my $Varsha_kinge = param('Varsha_kinge');
my $Snehal_suryavanshi = param('Snehal_suryavanshi');
my $Niti_patel = param('Niti_patel');
my $Rupali_patil = param('Rupali_patil');


my $driver = "SQLite";
my $database = "project.db";
my $dsn = "DBI:$driver:dbname=$database";
my $userid = "";
my $password = "" ;


my $dbh = DBI ->connect($dsn,$userid, $password ,{RaiseError =>1}) or die $DBI::errstr;

print ("Connection succesfull \n");


my $insert_stmt = $dbh->prepare("INSERT INTO  Facultya(Date1,Varsha_kinge,Snehal_suryavanshi,Niti_patel,Rupali_patil) VALUES(?,?,?,?,?)");




$insert_stmt->execute($Date1,$Varsha_kinge,$Snehal_suryavanshi,$Niti_patel,$Rupali_patil) or die $DBI::errstr;
$insert_stmt->finish();
$dbh->commit or die $DBI::errstr;


print('Value insert');
