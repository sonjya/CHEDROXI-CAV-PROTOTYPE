<?php

require_once "../../../modules/dbconnection.php";

$id = $_GET['id'];

$sql = "select a.id,schooldesc,schoolcity,firstname,middlename,lastname,coursedesc,applicationtype,mode,sonumber,graduationdate,systarted,syended,position,documenttype,requestletter,indorsementletter,tor,diploma,ornumber,preparedby,fullname,reviewedby,status,created_at,updated_at,updatedby,a.active from tbl_process a inner join tbl_schools b inner join tbl_courses c inner join tbl_commissioners d where a.schoolid=b.schoolid and a.courseid=c.courseid and a.commissionerid=d.commissionerid and id='$id' order by id desc limit 1";
$result = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_assoc($result);

$sql1 = "select date_format(now(),'%M %d,%Y') as now,year(now()) as year,date_format(now(),'%m/%d/%Y') as rel";
$result1 = mysqli_query($connection,$sql1);
$fetch1 = mysqli_fetch_assoc($result1);

$print = $_GET['print'];

?>

<!doctype html>
<html>

    <head>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    
        <div class="container">
            <img src="../../../images/print-header.png" alt="">
            
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    CAV (CHEDROXI) No. <strong><u>21227</u></strong>
                </div>
                <div class="col"><?=$fetch1['now']?></div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    Series of <strong><?=$fetch1['year']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col m-5">
                    <strong>CERTIFICATION, AUTHENTICATION AND VERIFICATION</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
                    To Whom It May Concern:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2"></div>
                <div class="col">
                    This is clarify that based on the confirmation forwarded by HEI, the following information are true and correct:
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-2">
                    Name of Student
                </div>
                <div class="col">
                    <strong>: <?php if($fetch['middlename'] != "") {?> <?=$fetch['firstname'] . ' ' . substr($fetch['middlename'],0,1) . '. ' . $fetch['lastname']?></strong>" <?php } else { ?> <?=$fetch['firstname'] . ' ' . $fetch['lastname']?></strong> <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Degree
                </div>
                <div class="col">
                    <strong>: <?=$fetch['coursedesc']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Date of Graduation
                </div>
                <div class="col">
                    <strong>: <?=$fetch['graduationdate']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    SY Started
                </div>
                <div class="col">
                    <strong>: <?=$fetch['systarted']?></strong>
                </div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    SY Ended
                </div>
                <div class="col">
                    <strong>: <?=$fetch['syended']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Accredetation
                </div>
                <div class="col">
                    <strong>: LEVEL III Re-accredited by PAASCU</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Mode of Study
                </div>
                <div class="col">
                    <strong>: <?=$fetch['mode']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Name of Institution
                </div>
                <div class="col">
                    <strong>: <?=$fetch['schooldesc']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Address
                </div>
                <div class="col">
                    <strong>: <?=$fetch['schoolcity']?></strong>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2"></div>
                <div class="col">
                    This is to fuither certify that the above institution is a duly authorized private higher education institution (HEI)
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    and the entries in the Transcript of Records and Diploma are authentic and the signatures appearing therein are those
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                of the HEI President and other authorities.
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"></div>
                <div class="col">
                    This certification must not be honored if the copies of the student's Transcript of Records and Diploma presented
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    are not duly authenticated/certified by the HEI Registrar.
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"></div>
                <div class="col">
                    Issued upon the request of <?=strtoupper($fetch['firstname']) . ' ' . strtoupper(substr($fetch['middlename'],0,1)) . '. ' . strtoupper($fetch['lastname'])?> for whatever legal purpose it may serve.
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-6"></div>
                <div class="col">
                    For the Commission:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1"></div>
                <div class="col-6"><i>NOT VALIDWITHOUT CHED SEAL OR</i></div>
                <div class="col">
                    <strong><?=$fetch['fullname']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-6"><i> WITH ERASURE OR ALTERATION</i></div>
                <div class="col">
                    <?=$fetch['position']?>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-6"></div>
                <div class="col">
                    OIC - Chief Administrative Officer
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Processed by</div>
                <div class="col-3">
                    : <strong><?=$fetch['preparedby']?></strong>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-1"></div>
                <div class="col-2">Reviewed by</div>
                <div class="col-3">
                    : <strong><?=$fetch['reviewedby']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Certification Fee</div>
                <div class="col-3">
                    : Php 80.00
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Doc Stamp Tax</div>
                <div class="col-3">
                    : Php 30.00
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">OR No.</div>
                <div class="col-3">
                    : <?=$fetch['ornumber']?>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Date Issued</div>
                <div class="col-3">
                    : <?=$fetch1['rel']?>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">SN - CHED11NS60411</div>
            </div>


            <?php if($print == 'yes') {echo "<script>window.print()</script>";}?>
            


        </div>




    <script src="../../../src/js/bootstrap.bundle.min.js"></script>

    <!-- <style>
        .container {
            margin-bottom: 10px;
        }
    </style> -->

    </body>

</html>
