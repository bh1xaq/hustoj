<?php 
$calsed = '锦鲤';
$calledid = -1;
$acneed = [10,20,30,50,80,100,200,300,500,800,1000];
$accall = ["萌新","小小牛","小牛","小犇","中牛","中犇","大牛","大犇","神牛","神犇"];
for ($i = count($accall);$i > 0; $i--) {
    if ($AC < $acneed[$i]) {$calsed = $accall[$i - 1];$calledid=$i-1;}
}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $user;?> - 用户信息 - MasterOJ</title>
        <?php require("./template/bshark/header-files.php");?>
        <script src="./template/bshark/vue.min.js"></script>
    </head>
    
    <body>
        <?php require("./template/bshark/nav.php");?>
        <div class="row" style="margin: 3% 7% 5% 7%">
            
<div class="col-md-7">
    <div class="card">
        <div class="card-body">
              <h5>提交统计</h5>
              <?php if ($aflag==0) {?><canvas id="myChart"></canvas><?php } else echo "OI比赛进行中，暂时无法查看"; ?>
              <table class="table table-hover" style="width:100%">
                  <tbody>
                      <tr>
                          <th width=30%>提交总数</th>
                          <td width=70%><a href='/status?user_id=<?php echo $user?>'><?php if ($aflag==0) echo $Submit;
else echo '---';?></a></td>
                      </tr>
                      <tr>
                          <th width=30%>解决</th>
                          <td width=70%><?php if ($aflag==0) echo $AC;
else echo '---';?></td>
                      </tr><?php
foreach($view_userstat as $row){
//i++;
echo "<tr><th>".$jresult[$row[0]]."</th><td><a href=/status?user_id=$user&jresult=".$row[0]." >";
if ($aflag==0) echo $row[1];
else echo '---';
echo "</a></td></tr>";
}
?>
                  </tbody>
              </table>
          </div></div>
</div><div class="col-md-5"><div class="card"><div class="card-body" align=center>
    <img src="https://q.qlogo.cn/headimg_dl?dst_uin=<?php echo $myqq;?>&spec=160" style="width:100px;height:100px;border-radius:50%;margin-bottom: 1em">
      <h3><span<?php 
                        if ($viplevel[$user]) {
                            if ($isadmm[$user]==23333) echo ' class="purple-c"';
                            else echo ' class="colorful"';
                        }
                        else if ($isadmm[$user]==23333) echo ' class="purple"';
          ?>><?php echo $user;?></span></h3>
        <div class="row">
            <div class="col-md-4">
                <h1><?php echo $AC;?></h1>解决
            </div>
            <div class="col-md-4">
                <h1><?php echo $Submit;?></h1>提交
            </div>
            <div class="col-md-4">
                <h1><?php echo $Rank;?></h1>名次
            </div></div>
        <br>
              <table class="table table-hover" style="width:100%">
                <tbody>
                    <tr>
                        <th width=30%>等级</th>
                        <td width=20%><?php echo $calsed;?></td>
                        <td width=50%>距离<?php echo $accall[$calledid+1];?>还需AC <?php echo $acneed[$calledid+1]-$AC;?>题</td>
                    </tr>
                </tbody>
              </table>
      </div></div><br>
            <div class="card">
  <div class="card-body">
              <h5>个人信息</h5>
              <table class="table table-hover" style="width:100%">
                <tbody>
                    <tr>
                        <th>用户名</th>
                        <td><span><?php echo $user;?></span></td>
                    </tr>
                    <tr>
                        <th>昵称</th>
                        <td><span><?php echo $nick;?></span></td>
                    </tr>
                    <tr>
                        <th>邮箱</th>
                        <td><?php echo $email;?></td>
                    </tr>
                </tbody>
              </table>
  </div>
</div>
</div>
</div>
</script>

	<!-- /body -->
    <!-- /post -->
    <!-- footer --><script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["AC", "WA", "RE", "CE", "TLE", "MLE", "OLE"],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $ped[4].",".($ped[6]).",".$ped[10].",".$ped[11].",".$ped[7].",".$ped[8].",".$ped[5];?>],
                backgroundColor: [
                    '#4ACF50',
                    '#DB2828',
                    '#9966FF',
                    '#FFCD56',
                    '#FF9F40',
                    '#36A3EB',
                    '#C9CBCF'
                ],
            }]
        },
        options: {
            responsive: true
        }
    });
    </script>
<?php require("./template/bshark/footer.php");?>
<?php require("./template/bshark/footer-files.php");?>
    </body>
</html>
