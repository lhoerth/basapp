<?php

  $username="";
    $password="";
    $hostname="";
    $dbname="";
    
    try {
      //database object
      $dbh = new PDO ("mysql:host=$hostname;
                      dbname=shristhy_grcc", $username, $password);
      echo 'connected to database';
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    
   $sql = "INSERT INTO `Student_Info`(`Key`, `First`, `Last`, `Email`, `Phone`, `Degree`, `Sid`, `Status`, `Prereqs`, `Education`, `Credits`, `Transcript`) VALUES (:key, :first, :last, :email, :phone, :degree, :sid, :status, :prereqs, :education, :credits, :transcript)";

                                        
                
              $statement = $dbh->prepare($sql);
                
                
                $key = '6';
                $first = 'Tim';
                $last = 'Craft';
                $email = 'TimC@gmail.com';
                $phone =  '1387645319';
                $degree = 'Network & Security';
                $sid = '840471143';
                $status = 'Running Start';
                $prereqs = 'IT 210 or CCENT';
                $education = 'AA';
                $credits = '123';
                $transcript = 'Empty';
                
                
                 $key = '7';
                $first = 'Amy';
                $last = 'Jenner';
                $email = 'Jenamy@yahoo.com';
                $phone =  '187645377';
                $degree = 'Software';
                $sid = '840478932';
                $status = 'Veteran';
                $prereqs = 'Linux';
                $education = 'Masters';
                $credits = '180';
                $transcript = 'Empty';
                
                    $key = '8';
                $first = 'Minnie';
                $last = 'Mouse';
                $email = 'mm@disney.com';
                $phone =  '111333456';
                $degree = 'Undecided';
                $sid = '840478662';
                $status = 'International Student';
                $prereqs = 'IT 201';
                $education = 'PHD';
                $credits = '280';
                $transcript = 'Empty';
                
                $key = '9';
                $first = 'Donald';
                $last = 'Duck';
                $email = 'duckyduck@disney.com';
                $phone =  '222333456';
                $degree = 'software';
                $sid = '840461162';
                $status = 'Veteran';
                $prereqs = 'IT 203';
                $education = 'PHD';
                $credits = '80';
                $transcript = 'Empty';
                
                
                $statement->bindParam(':key', $key, PDO::PARAM_INT);
                $statement->bindParam(':first', $first, PDO::PARAM_STR);
                $statement->bindParam(':last', $last, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phone', $phone, PDO::PARAM_INT);
                $statement->bindParam(':degree', $degree, PDO::PARAM_STR);
                $statement->bindParam(':sid', $sid, PDO::PARAM_INT);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);
                $statement->bindParam(':prereqs', $prereqs, PDO::PARAM_STR);
                $statement->bindParam(':education', $education, PDO::PARAM_STR);
                $statement->bindParam(':credits', $credits, PDO::PARAM_INT);
                $statement->bindParam(':transcript', $transcript, PDO::PARAM_STR);
                

               $statement->execute();




        
?>