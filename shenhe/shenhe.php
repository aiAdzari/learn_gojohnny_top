
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0.87, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<LINK href="Css/editSj.css" rel=stylesheet>
<style>
    A:link { COLOR: #0000FF; FONT-SIZE: 14px; TEXT-DECORATION: none; }
    A:visited { COLOR: #0000AA; FONT-SIZE: 14px; TEXT-DECORATION: none; }
    A:active { FONT-SIZE: 14px; TEXT-DECORATION: none; }
    A:hover { COLOR: #cc0000; FONT-SIZE: 14px; TEXT-DECORATION: underline; }
    hr {height:1; }

    .tbS {display:inline; margin-top:0; margin-bottom:3; border-collapse:collapse; vertical-align: top;
        border:1px dotted #000088; border-top:0px none; border-left:0px none; border-right:0px none; }
    .tbS td { border:#FFFFFF 0px dashed; }
    .tbE {display:inline; margin-top:0; margin-bottom:3; border-collapse:collapse; vertical-align: top;
        border:2px dashed #0000CC; border-top:0px none; border-left:0px none; border-right:0px none; }
    .tbE td { border:#FFFFFF 0px dashed; }
    .pS {text-indent: -21px; margin-left: 21px; color:#0000FF; margin-top:-2px;margin-bottom:0px; }
    .pSp {color:#0000CC; }
    .pE {text-indent: -21px; margin-left: 21px; margin-top:-6px;margin-bottom:0px; }
    .dvO {margin-left:30; width:325; font-family:SimSum,宋体; }
    .dvOB {margin-left:0; width:360; font-family:SimSum,宋体; font-weight:bold; }
    .dvON {margin-left:0; width:360; font-family:SimSum,宋体; }
    .dv3 {margin-left:30; width:325; margin-bottom:6; }
    .tdAns {width:6%; color:#0000FF; text-align:right; }
    .rdt { color:#CCCCCC; }
    .rdt1 { color:#0000FF; font-weight:bold; }

    .wdhSet {height:1; border:none; }
    .tl52 {font-size:10pt; margin-left:3px; margin-right:3px; margin-bottom:6px; border-bottom:1px outset #000000; }

    #hideBusyBg { position:absolute;left:0px;top:0px; background-color:#ffffff;
        width:100%; /*设置为100%，这样才能使隐藏背景层覆盖原页面*/
        filter:alpha(opacity=60);  /*设置透明度为60%*/
        opacity:0.6;  /*非IE浏览器下设置透明度为60%*/
        display:none;  z-Index:2; }
    #hideInfoBox {  height: 30px; width: 400px;  margin-top: -30px;  margin-left: -200px;
        position: absolute;  left: 50%;  top: 50%; padding-top:5px; padding-left:6px; text-align:center;
        font-size:16px; font-family:宋体; color:#0000ff; line-height:22px;
        background-color:#ffff00; display:none; cursor:pointer; z-Index:3; }
</style>

<TITLE>健康打卡-疫情防控-成都信息工程大学</TITLE>

<script type="text/javascript">
        var date=new Date();
        var year=date.getFullYear();
        var month=date.getMonth() +1;
        var day=date.getDate();

        if(month < 10 ){ 
            month = "0" + month; 
        } 
        if(day < 10 ){ 
            day = "0" + day; 
        }

        var mydate = year + "-" + month + "-" + day;
</script>
</HEAD>

<BODY>
<div id="hideBusyBg"></div>
<div id="hideInfoBox"><marquee direction=up scrolldelay=160 style="height:20px;text-align:center">服务器正在处理中，请稍候...</marquee></div>
<form method=post onsubmit="javascript:return chkDa();" align=left action=editSjRs.asp name=FrmXsPj style="text-align: center; margin-top: -5"><div style="margin-top:-8px;"><table style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; Font-Size: 12px" border=0 align=center Width=400><tr>
<TD style="Font-Size: 13px" Valign=bottom align=left width="36%">
<a href=sj.asp?jkdk=Y>返回</a>&nbsp;<input type=submit value=提交打卡 onclick="javascript:tjPjN();" name=B1  style="width:90; height:28; font-size:12pt; font-weight:bold; color:#0000FF"></TD>
<TD style="Font-Size: 14px" Valign=bottom align=Left width="64%"><p style="margin-top:6; margin-bottom:0; font-size:10.5pt"><b>
    <?php 
        echo $_POST['id'];
     ?>
</b>(
    <?php 
        echo $_POST['name'];
     ?>
)</p></TD>
</TR></table>
</div>

<div align=center><TABLE id=wjTA CellPadding=1 CellSpacing=0 border=1 width=400 align=center class=tabThinM style="font-size:10.5pt;font-family: 楷体_GB2312;margin-top: 0px;"><TBODY>
<TR VALIGN=top ALIGN=left>
<TD ALIGN=Center colspan=4 style="font-size:18px"><b><script type="text/javascript">document.write(month);document.write(day);</script>疫情防控——师生健康状态采集</b></TD>
</TR>
<TR VALIGN=top ALIGN=left>
<TD ALIGN=Left colspan=4 style="font-size:14px">
<p style="line-height:150%;color:#FF0000;margin-bottom:0"><span style="color:#0000FF;">　　亲爱的老师和同学：您好！为确保您的生命安全和身体健康，我们按疫情防控工作要求设计了这份日报表，请您按要求如实填报，谢谢您的理解与支持。</span></p>
</TD></TR>
<TR VALIGN=top ALIGN=left>
<input type=hidden name=RsNum value=3>
<input type=hidden name=Id  value="13696">
<input type=hidden name=Tx value=33_1>
<input type=hidden name=canTj value=0>
<input type=hidden name=isNeedAns value=0>
<input type=hidden name=UTp value=Xs>
<input type=hidden name=ObjId  value="2019071054">
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 align="center" width=30 valign=bottom bordercolorlight=#000000 bordercolordark=#FFFFFF>
<FONT Style="COLOR: #000000; FONT-FAMILY: 宋体,arial; FONT-SIZE: 14px">序号</FONT></TH>
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 align="Left" width=357 valign=bottom bordercolorlight=#000000 bordercolordark=#FFFFFF>
<TABLE border=0 CellPadding=0 CellSpacing=0 width="100%" class=tabNBx><TR valign=bottom>
<TD align=left><b><span style="color:#FFFF00; font-weight:normal;">打卡时间：<script type="text/javascript">
    document.write(mydate);</script>
06:38</b></TD></TR></TABLE></TH>
</TR>
<TR VALIGN=top ALIGN=left bgcolor=#EEF8FF>
<TD bordercolor=#000000 bordercolorlight=#000000 bordercolordark=#FFFFFF align="Center" rowSpan="" valign="top" valign=bottom>
<FONT Style="COLOR: #000000; FONT-FAMILY: 宋体,arial; FONT-SIZE: 14px">
<input type=hidden name=th_1 value=21650><input type=hidden name=wtOR_1 value="6\|/四川\|/西昌\|/\|/1\|/"><b>1</b><BR></FONT></TD>
<TD align=left valign=middle colspan=2>
<B>个人健康现状</B>
<div class=dvO>(1)现居住地点为：<select name=sF21650_1 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option value="1">航空港校内</option>
<option value="2">龙泉校内</option>
<option value="3">新气象小区</option>
<option value="4">成信家园</option>
<option value="5">成都(校外)</option>
<option selected value="6">外地</option>
</select>
<br>
　&nbsp;外地详址<input type=text name=sF21650_2 value="四川" onblur="this.className='it1';" onfocus="this.className='it2';" class="it1" style="width:50">
省<input type=text name=sF21650_3 value="成都" onblur="this.className='it1';" onfocus="this.className='it2';" class="it1" style="width:50">
市<input type=text name=sF21650_4 value="双流" onblur="this.className='it1';" onfocus="this.className='it2';" class="it1" style="width:50">
区(县)<br>
(2)现居住地状态：<select name=sF21650_5 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option selected value="1">一般地区</option>
<option value="2">疫情防控重点地区</option>
<option value="3">所在小区被隔离管控</option>
</select>
<br>
(3)今天工作状态：<select name=sF21650_6 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option selected value="1">航空港校内上班或学习</option>
<option value="2">龙泉校内上班或学习</option>
<option value="3">在校外完成实习任务</option>
<option value="5">在家</option>
<option value="4">在校外</option>
</select>
<br>
(4)个人健康状况：<select name=sF21650_7 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option selected value="1">正常</option>
<option value="6">有呕吐情况</option>
<option value="7">有腹泻情况</option>
<option value="8">有呕吐＋腹泻情况</option>
<option value="2">有新冠肺炎可疑症状</option>
<option value="3">疑似感染新冠肺炎</option>
<option value="4">确诊感染新冠肺炎</option>
<option value="5">确诊感染新冠肺炎但已康复</option>
</select>
<br>
(5)个人生活状态：<select name=sF21650_8 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option selected value="1">正常</option>
<option value="3">居家隔离观察</option>
<option value="4">集中隔离观察</option>
<option value="5">居家治疗</option>
<option value="2">住院治疗</option>
</select>
<br>
(6)家庭成员状况：<select name=sF21650_9 class=it1 style="width:180" >
<option value="">—————请选择—————</option>
<option selected value="1">全部正常</option>
<option value="2">有人有可疑症状</option>
<option value="3">有人疑似感染</option>
<option value="4">有人确诊感染</option>
<option value="5">有人确诊感染但已康复</option>
</select>
<br>
(7)其他需要说明的情况：<br>
<div><textarea name=sF21650_10 onblur="this.className='ita1';" onfocus="this.className='it2';" class="ita1" style="font-size:13px; width:300" rows=2></textarea></div>
<input type=hidden name=sF21650_N value=10></div>
</TD>
</TR>
<TR VALIGN=top ALIGN=left bgcolor=#FFFFAA>
<TD bordercolor=#000000 bordercolorlight=#000000 bordercolordark=#FFFFFF align="Center" rowSpan="" valign="top" valign=bottom>
<FONT Style="COLOR: #000000; FONT-FAMILY: 宋体,arial; FONT-SIZE: 14px">
<input type=hidden name=th_2 value=21912><input type=hidden name=wtOR_2 value=""><b>2</b><BR></FONT></TD>
<TD align=left valign=middle colspan=2>
<B>申请进出学校(无需求则不填)</B>
<div class=dvO>目的地：<input type=text name=sF21912_1 value="双流" onblur="this.className='it1';" onfocus="this.className='it2';" class="it1" style="width:236">
<br>
事由：<input type=text name=sF21912_2 value="外出" onblur="this.className='it1';" onfocus="this.className='it2';" class="it1" style="width:250">
<br>
计划：<select name=sF21912_3 class=it1 style="width:90" >
<option value="">—请选择—</option>
<option selected value="1">今天</option>
<option value="2">明天</option>
<option value="3">后天</option>
</select>
<select name=sF21912_4 class=it1 style="width:66" >
<option value="">　</option>
<option value="06">06:00</option>
<option selected value="07">07:00</option>
<option value="08">08:00</option>
<option value="09">09:00</option>
<option value="10">10:00</option>
<option value="11">11:00</option>
<option value="12">12:00</option>
<option value="13">13:00</option>
<option value="14">14:00</option>
<option value="15">15:00</option>
<option value="16">16:00</option>
<option value="17">17:00</option>
<option value="18">18:00</option>
<option value="19">19:00</option>
<option value="20">20:00</option>
<option value="21">21:00</option>
<option value="22">22:00</option>
</select>
　　至<br>
　　　<select name=sF21912_5 class=it1 style="width:90" >
<option value="">—请选择—</option>
<option selected value="1">当天</option>
<option value="2">第2天</option>
<option value="3">第3天</option>
<option value="9">当晚(离校)</option>
</select>
<select name=sF21912_6 class=it1 style="width:66" >
<option value="">　</option>
<option value="07">07:00</option>
<option value="08">08:00</option>
<option value="09">09:00</option>
<option value="10">10:00</option>
<option value="11">11:00</option>
<option value="12">12:00</option>
<option value="13">13:00</option>
<option value="14">14:00</option>
<option value="15">15:00</option>
<option value="16">16:00</option>
<option value="17">17:00</option>
<option value="18">18:00</option>
<option value="19">19:00</option>
<option value="20">20:00</option>
<option value="21">21:00</option>
<option value="22">22:00</option>
<option selected value="23">23:00</option>
</select>
期间进出校门<br>
审核：<span style="color:#0000FF">已通过/禁改，请按申请的时间进出学校</span><input type=hidden name=sF21912_N value=6></div>
</TD>
</TR>
<TR VALIGN=top ALIGN=left bgcolor=#EEF8FF>
<TD bordercolor=#000000 bordercolorlight=#000000 bordercolordark=#FFFFFF align="Center" rowSpan="" valign="top" valign=bottom>
<FONT Style="COLOR: #000000; FONT-FAMILY: 宋体,arial; FONT-SIZE: 14px">
<input type=hidden name=th_3 value=21648><input type=hidden name=wtOR_3 value="N\|/\|/N\|/\|/N\|/"><b>3</b><BR></FONT></TD>
<TD align=left valign=middle colspan=2>
<B>最近14天以来的情况</B>
<div class=dvO>(1)曾前往疫情防控重点地区？<select name=sF21648_1 class=it1 style="width:60" >
<option value="">　</option>
<option value="Y">是</option>
<option selected value="N">否</option>
</select>
<br>
若曾前往，请写明时间、地点及简要事由：<br>
<div><textarea name=sF21648_2 onblur="this.className='ita1';" onfocus="this.className='it2';" class="ita1" style="font-size:13px; width:300" rows=2></textarea></div>
<br>
(2)接触过疫情防控重点地区高危人员？<select name=sF21648_3 class=it1 style="width:60" >
<option value="">　</option>
<option value="Y">是</option>
<option selected value="N">否</option>
</select>
<br>
若接触过，请写明时间、地点及简要事由：<br>
<div><textarea name=sF21648_4 onblur="this.className='ita1';" onfocus="this.className='it2';" class="ita1" style="font-size:13px; width:300" rows=2></textarea></div>
<br>
(3)接触过感染者或疑似患者？<select name=sF21648_5 class=it1 style="width:60" >
<option value="">　</option>
<option value="Y">是</option>
<option selected value="N">否</option>
</select>
<br>
若接触过，请写明时间、地点及简要事由：<br>
<div><textarea name=sF21648_6 onblur="this.className='ita1';" onfocus="this.className='it2';" class="ita1" style="font-size:13px; width:300" rows=2></textarea></div>
<input type=hidden name=sF21648_N value=6></div>
</TD>
</TR>
<TR VALIGN=top ALIGN=left bgcolor=#FFFFAA>
<TD style="vertical-align: bottom"><input type=text name=zw1 class=wdhSet style="width:30"><input type=hidden name=cxStYt value="A"></TD>
<TD align=right><input type=text name=zw2 class=wdhSet style="width:345"></TD>
</TR>
</TBODY></TABLE></div><div style="margin-top:0px; margin-bottom:0px;">
<table style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; Font-Size: 12px" border=0 align=center Width=400><tr>
<TD style="Font-Size: 13px" Valign=bottom align=left width="36%">
<a href=sj.asp?jkdk=Y>返回</a>&nbsp;<input type=submit value=提交打卡 onclick="javascript:tjPjN();" name=B2  style="width:90; height:28; font-size:12pt; font-weight:bold; color:#0000FF"></TD>
<TD style="Font-Size: 14px" Valign=bottom align=Left width="64%"><p style="margin-top:6; margin-bottom:0; font-size:10.5pt"><b>
    <?php 
        echo $_POST['id'];
     ?></b>(<?php 
        echo $_POST['name'];
     ?>)</p></TD>
</TR></table>
</div>
</form>


</BODY>
</HTML>

