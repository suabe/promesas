<div id="banner_interior">
	<img src="/img/banners_micuenta_calendario.png" alt="">
</div>
<div id="calendario_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Calendario de Puntos</h2>
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<p>Obtén una vista rápida de los movimientos realizados en tu cuenta tales como: abono, transferencias, recuperación y/o canje de puntos. Esta información será actualizada día a día y sólo estarán disponibles movimientos para los meses del año que ejerce la vigencia de puntos.</p>
		<?php } elseif($this->session->userdata('perfil') == 2) { ?>
			<p>Obtén una vista rápida de los movimientos realizados en tu cuenta tales como: abono, transferencias, recuperación y/o canje de puntos. Esta información será actualizada día a día y sólo estarán disponibles movimientos para los meses del año que ejerce la vigencia de puntos.</p>
		<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
			
		<?php } ?>
		<div class="event-calendar">
			<span class="prev"></span>
			<span class="next"></span>
			<div>
				<ul id="calendar" class="calendar-slide"></ul>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#cuenta_menu {
		background-position: 0px 39px !important;
	}
	#cuenta_menu:hover {
		background-position: 0px 0px !important;	
	}
</style>
<script type="text/javascript" src="/js/global.min.js"></script>
<script type="text/javascript">
	(function(){
		var e={app:$("#twitter-app"),btns:$("#twitter-app").find(".btn-nav >li > span"),tweets:$("#twitter-app").find(".tweet-list >li")},
		t=function(){e.app.length&&n()},
		n=function(){$(e.tweets[0]).addClass("active");$(e.btns[0]).addClass("active");$(e.btns).bind("click",function(){var t=$(this),n=t.parent().index();if(!t.hasClass("active")){e.btns.removeClass("active");t.addClass("active");e.tweets.css({display:"none"});$(e.tweets[n]).fadeIn("slow")}})};
		t()})();
		(function(){
			var e={calendar:$("#calendar")},
			t={table_top:'<table class="calendar"><thead><tr><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th></tr></thead><tbody>',
			table_bottom:"</tbody></table>",
			day:'<td><div class="text">[day]</div></td>',
			dayDisabled:'<td class="disabled"><div class="text">[day]</div></td>',
			dayEvent:'<td class="active"><div class="text">[day]<span>Evento</span><strong><span class="[class]">[evento]</span></strong></div></td>'},
			n=function(){
				e.calendar.length&&r()},
				r=function(){
					var n=new Date,
					r=n.getFullYear(),
					s=r%100!=0&&r%4!=0&&r%400!=0?28:29,
					o=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
					u=["31",s,"31","30","31","30","31","31","30","31","30","31"],
					a=[],f,l=[],
					c=Math.random(1e3),
					h=function(){
						$.ajax({
							url:"/mi_cuenta/compras",
							dataType:"json",
							success:function(e){
								p(e)
							}
						})
					},
					p=function(t){
						var n=typeof t=="object"?t:$.parseJSON(t),r;for(var s=0,u=o.length;s<u;s+=1){r={};n[String(s+1)]!=undefined&&n[s+1]!=null&&(r=n[String(s+1)]);index=s+1;l[s]=d(s,r)}$(e.calendar).append(l.join(""));i()},d=function(e,r){var i=(new Date(n.getFullYear(),e,1)).getDay(),s=function(){var n='<li><h3 class="title">'+o[e]+"</h3>"+t.table_top,s=[],f=0,l,c="";for(var h=0,p=u[e];h<p;h+=1){s=a(h+1,r);if(h==0){n+="<tr>";if(i>0)for(var d=0,v=i;d<v;d+=1){f+=1;e-1<0?l="":l=u[e-1]-(i-(d+1));n+='<td class="disabled"><div class="text">'+l+"</div>"+"</td>"}}if(s.length){switch(f){case 0:c='class="alpha" ';break;case 6:c='class="omega" ';break;default:c=""}n+='<td class="active"><div class="text">'+(h+1)+"<span>Movimiento</span>"+'<div class="tTip"><ul '+c+">";for(var d=0,m=s.length;d<m;d+=1)n+="<li>"+s[d]+"</li>";n+="</ul></div></div></td>"}else n+='<td><div class="text">'+(h+1)+"</div>"+"</td>";f+=1;if(f%7==0){n+="</tr>";f=0}if(h==p-1&&f<7)for(var d=0,v=7-f;d<v;d+=1)n+='<td class="disabled"><div class="text">'+(d+1)+"</div>"+"</td>"}n+=t.table_bottom+"</li>";return n},a=function(e,t){var n=[];for(var r=0,i=t.length;r<i;r+=1)Number(t[r].day)==e&&n.push(t[r].desc);return n};return s()};h()},i=function(){var t=new slideMe({el:e.calendar,_prev:$(".event-calendar > .prev"),_next:$(".event-calendar > .next"),full:!0,current:(new Date).getMonth()})};n()})();(function(){var e={app:$("#relevantContent"),btns:$("#relevantContent").find(".logotype-nav.active >li"),datos:$("#relevantContent").find(".slider-list >li")},t=function(){e.app.length&&n()},n=function(){$(e.datos[0]).addClass("active");$(e.btns[0]).addClass("active");$(e.btns).bind("click",function(){var t=$(this),n=t.index();if(!t.hasClass("active")){e.btns.removeClass("active");t.addClass("active");e.datos.css({display:"none"});$(e.datos[n]).fadeIn("slow")}});$(e.datos).css({display:"none"});$(e.datos[0]).css({display:"block"})};t()})();
</script>	