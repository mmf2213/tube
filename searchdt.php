<?php
require_once('lock.php');
if($_POST)
{
$dt=strtotime($_POST['dt']);

$sql_res=$DBcon->query("SELECT * 
FROM media
WHERE l_time ='$dt'
ORDER BY  m_id LIMIT 50");

while($row=$sql_res->fetch_array())
{
	$m_id=$row['m_id'];
    $m_link=$row['m_link'];
	$m_prv=$row['m_prv'];
	$m_head=$row['m_head'];
	$m_desc=$row['m_desc'];
	$m_time=$row['m_time'];
	$prv=str_replace("../","",$row['m_prv']);
?>
                       <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="watch?v=<?php echo $row['m_time']."_".$row['m_id']; ?>"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid"  src="<?php echo $prv; ?>" alt=""></a>
                              <div class="time"></div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"><?php echo $row['m_head']; ?></a>
                              </div>
                              <div class="video-page text-success">
                                   <?php  $getcat=$DBcon->query("select cat_name FROM m_cat WHERE cat_id=".$row['cat_id']."");
								  $ct=$getcat->fetch_array(); 
echo $ct['cat_name']; ?> <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                  <?php  $virow=$DBcon->query("select * from visiters WHERE m_id='".$row['m_id']."'");
	echo $rovcnt=$virow->num_rows;  ?> views &nbsp;<i class="fas fa-calendar-alt"></i> <?php echo date('d-M-Y',$row['l_time']); ?>
                              </div>
                           </div>
                        </div>
                     </div>
<?php } ?>
<?php } else { } ?>
