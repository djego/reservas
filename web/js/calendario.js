//document.onmouseup = onmouseoutclose;
var filaMonth;
calendar=new Object();
tr=new Object();
tr.nextMonth="Mes siguiente";
tr.prevMonth="Mes anterior";
tr.closeCalendar="X";
var months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
var days=['Lu','Ma','Mi','Ju','Vi','Sa','Do'];
function showCalendar(img,cal,dt,frm,m,y,d){
  if(document.getElementById){
    var c=document.getElementById(cal);
    var i=document.getElementById(img);
    var f=document.getElementById(frm);
    calendar.calfrm=frm;
    calendar.cal=c;
    calendar.caldt=dt;
    calendar.calf=f;
    var my=f[dt+'_month'].value.split("-");
    y=my[0];
    m=my[1];
    d=f[dt+'_day'].value;
    buildCal(y,m,d);
    var l=0;
    var t=0;
    aTag=i;
    do{
      aTag=aTag.offsetParent;
      l+=aTag.offsetLeft;
      t+=aTag.offsetTop;
    }while(aTag.offsetParent&&aTag.tagName!='body');
    var left=i.offsetLeft+l;
    var top=i.offsetTop+t+i.offsetHeight+2;
    c.style.position="absolute";
    c.style.left=left+'px';
    c.style.top=top+'px';
    c.style.display="block";
  }
}
function closeCal(){
  calendar.cal.style.display='none';
}
function buildCal(y,m,d){
  var daysInMonth=[31,0,31,30,31,30,31,31,30,31,30,31];
  td=new Date();
  if(!y)y=td.getFullYear();
  if(!m)m=td.getMonth()+1;
  if(!d)d=td.getDate;
  var frm=calendar.calfrm;
  var dt=calendar.caldt;
  var mDate=new Date(y,m-1,1);
  var firstMonthDay=mDate.getDay();
  daysInMonth[1]=(((mDate.getFullYear()%100!=0)&&(mDate.getFullYear()%4==0))||(mDate.getFullYear()%400==0))?29:28;
  var today=(y==td.getFullYear()&&m==td.getMonth()+1)?td.getDate():0;
  var t='<table class="b_caltable" cellspacing="0"><tr class="b_calHeader">';
  var flm=td.getMonth()+1;
  var flyr=td.getFullYear();
  for(p=0;p<=10;p++){
    if(flm==m){
      filaMonth=p;
    }
    flm++;
    if(flm>12){
      flm=1;
      flyr++
    }
  }
t+='<td colspan="7">';
if(filaMonth==0){
  t+='&laquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  
}
else{
  t+='<a href="javascript:prevMonth('+y+','+m+');" title="'+tr.prevMonth+'">&laquo;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
t+='&nbsp;<select name="ym" onchange="goMonth(this.options[this.selectedIndex].value)">';
var mn=td.getMonth()+1;
var yr=td.getFullYear();
for(n=0;n<=10;n++){
  t+='<option value="'+mn+'"';
  if(mn==m){
    t+=' selected="selected"';
  }
  t+='>'+months[mn-1]+' '+yr+'</option>';
  mn++;
  if(mn>12){
    mn=1;
    yr++
  }
}
t+=' </select>&nbsp;';
if(filaMonth==10){
  t+='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;';
}
else{
  t+='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:nextMonth('+y+','+m+');" title="'+tr.nextMonth+'">&nbsp;&raquo;</a>';
}
t+='</td></tr>';
t+='<tr class="b_calDayNames">';
for(dn=0;dn<7;dn++){
  var cl='';
  if((dn%7==5)||(dn%7==6))cl+=' b_calWeekend';
  t+='<th class="'+cl+'">'+days[dn]+'</th>';
}
t+='</tr><tr class="b_calDays">';
for(i=1;i<=42;i++){
  var x=i-(firstMonthDay+6)%7;
  if(x>daysInMonth[m-1]||x<1)x='&nbsp;';
  var cl='';
  var href=0;
  if((i%7==0)||(i%7==6))cl+=' b_calWeekend';
  if(x>0){
    var xDay=new Date(y,m-1,x);
    if((xDay.getFullYear()==y)&&(xDay.getMonth()+1==m)&&(xDay.getDate()==d))

    {
      cl+=' b_calSelected';
      href=1
      }
    if((xDay.getFullYear()==td.getFullYear())&&(xDay.getMonth()==td.getMonth())&&(xDay.getDate()==td.getDate()))
    {
      cl+=' b_calToday';
      href=1;
    }
    else{
      if(xDay>td){
        cl+=' b_calFuture';
        href=1;
      }
      else{
        if(xDay<td){
          cl+=' b_calPast'
          }
        }
    }
};

t+='<td class="'+cl+'">';
if(href){
  t+='<a href="javascript:pickDate('+y+','+m+','+x+',\''+dt+'\',\''+frm+'\');">'+x+'</a>';
}else{
  t+=x;
}
t+='</td>';
if(((i)%7==0)&&(i<36)){
  t+='</tr><tr class="b_calDays">';
}
}
t+='</tr><tr class="b_calClose"><td colspan="7"><a href="javascript:closeCal();">'+tr.closeCalendar+'</a></td></tr></table>';
document.getElementById("b_calendarInner").innerHTML=t;
}
function prevMonth(y,m){
  if(new Date(y,m-1,1)<td)return;
  if(m>1){
    m--
  }else{
    m=12;
    y--
  };
  
  buildCal(y,m);
}
function nextMonth(y,m){
  if(m<12){
    m++;
  }else{
    m=1;
    y++;
  }
  if(y>td.getFullYear()&&m>=td.getMonth())return;
  buildCal(y,m);
}
function goMonth(m){
  var y=td.getFullYear();
  if(m<td.getMonth()+1)y++;
  buildCal(y,m);

}
function pickDate(y,m,d,dt,frm){
  var f=calendar.calf;
  var dt=calendar.caldt;
  f[dt+'_month'].value=y+"-"+m;
  f[dt+'_day'].value=d;
  if(dt=="search_fecha-inicio"){
    checkDateOrder(calendar.calfrm,'search_fecha-inicio_day','search_fecha-inicio_month','search_fecha-final_day','search_fecha-final_month');
  }
  if(dt=="dispo_fecha-inicio"){
    checkDateOrder(calendar.calfrm,'dispo_fecha-inicio_day','dispo_fecha-inicio_month','dispo_fecha-final_day','dispo_fecha-final_month');
  }
  closeCal();
}
function checkDateOrder(frm,ci_day,ci_month_year,co_day,co_month_year){
  if(document.getElementById){
    var frm=document.getElementById(frm);
    var my=frm[ci_month_year].value.split("-");
    var ci=new Date(my[0],my[1]-1,frm[ci_day].value,12,0,0,0);
    my=frm[co_month_year].value.split("-");
    var co=new Date(my[0],my[1]-1,frm[co_day].value,12,0,0,0);
    if(ci>=co){
      co.setTime(ci.getTime()+1000*60*60*24);
      frm[co_day].value=co.getDate();
      var com=co.getMonth()+1;
      frm[co_month_year].value=co.getFullYear()+"-"+com;
    }
  }
}
/*
function onmouseoutclose(e){
//  console.log($(e.target).parents('#b_calendarPopup').length);
  if(typeof calendar.cal == 'undefined'){
    return false;
  }
  if($(e.target).parents('#b_calendarPopup').length == 0){
    calendar.cal.style.display='none';
  }
  
}*/