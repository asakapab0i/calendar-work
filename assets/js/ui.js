var ui = {

	// Render the Calendar
	"renderCalendar" : function(mm,yy){
		
		// HTML renderers
		var _html = "";
		var cls = "";
		var msg = "";
		var id = "";
		
		// Create current date object
		var now = new Date();
		
		// Defaults
		if(arguments.length == 0){
			mm = now.getMonth();
			yy = now.getFullYear();
		}
		
		// Create viewed date object
		var mon = new Date(yy,mm,1);
		var yp=mon.getFullYear();
		var yn=mon.getFullYear();
		
		var prv = new Date(yp,mm-1,1);
		var nxt = new Date(yn,mm+1,1);
		
		var m = [
			 "January"
			,"February"
			,"March"
			,"April"
			,"May"
			,"June"
			,"July"
			,"August"
			,"September"
			,"October"
			,"November"
			,"December"
		];
		
		var d = [
			 "Sunday"
			,"Monday"
			,"Tuesday"
			,"Wednesday"
			,"Thursday"
			,"Friday"
			,"Saturday"
		];
		
		// Days in Month
		var n = [
			 31
			,28
			,31
			,30
			,31
			,30
			,31
			,31
			,30
			,31
			,30
			,31
		];
		
		// Events
		var evnt = {"event" : [
			 {"date":"1/01/2012","title":"New Year's Day"}
			,{"date":"1/16/2012","title":"MLK Day"}
			,{"date":"2/20/2012","title":"Presidents Day"}
			,{"date":"5/28/2012","title":"Memorial Day"}
			,{"date":"7/04/2012","title":"Independence Day"}
			,{"date":"9/03/2012","title":"Labor Day"}
			,{"date":"9/11/2012","title":"Patriot Day"}
			,{"date":"10/08/2012","title":"Columbus Day"}
			,{"date":"11/12/2012","title":"Veterans Day"}
			,{"date":"11/22/2012","title":"Thanksgiving Day"}
			,{"date":"12/25/2012","title":"Christmas Day"}
				
			,{"date":"1/01/2013","title":"New Year's Day"}
			,{"date":"1/21/2013","title":"MLK Day"}
			,{"date":"2/18/2013","title":"Presidents Day"}
			,{"date":"5/27/2013","title":"Memorial Day"}
			,{"date":"7/04/2013","title":"Independence Day"}
			,{"date":"9/02/2013","title":"Labor Day"}
			,{"date":"9/11/2013","title":"Patriot Day"}
			,{"date":"10/14/2013","title":"Columbus Day"}
			,{"date":"11/11/2013","title":"Veterans Day"}
			,{"date":"11/28/2013","title":"Thanksgiving Day"}
			,{"date":"12/25/2013","title":"Christmas Day"}
			
			,{"date":"1/01/2014","title":"New Year's Day"}
			,{"date":"1/20/2014","title":"MLK Day"}
			,{"date":"2/17/2014","title":"Presidents Day"}
			,{"date":"5/26/2014","title":"Memorial Day"}
			,{"date":"7/04/2014","title":"Independence Day"}
			,{"date":"9/01/2014","title":"Labor Day"}
			,{"date":"9/11/2014","title":"Patriot Day"}
			,{"date":"10/13/2014","title":"Columbus Day"}
			,{"date":"11/11/2014","title":"Veterans Day"}
			,{"date":"11/27/2014","title":"Thanksgiving Day"}
			,{"date":"12/25/2014","title":"Christmas Day"}
			
			,{"date":"1/01/2015","title":"New Year's Day"}
			,{"date":"1/19/2015","title":"MLK Day"}
			,{"date":"2/16/2015","title":"Presidents Day"}
			,{"date":"5/25/2015","title":"Memorial Day"}
			,{"date":"7/04/2015","title":"Independence Day"}
			,{"date":"9/07/2015","title":"Labor Day"}
			,{"date":"9/11/2015","title":"Patriot Day"}
			,{"date":"10/12/2015","title":"Columbus Day"}
			,{"date":"11/11/2015","title":"Veterans Day"}
			,{"date":"11/26/2015","title":"Thanksgiving Day"}
			,{"date":"12/25/2015","title":"Christmas Day"}
			
			,{"date":"1/01/2016","title":"New Year's Day"}
			,{"date":"1/18/2016","title":"MLK Day"}
			,{"date":"2/15/2016","title":"Presidents Day"}
			,{"date":"5/30/2016","title":"Memorial Day"}
			,{"date":"7/04/2016","title":"Independence Day"}
			,{"date":"9/05/2016","title":"Labor Day"}
			,{"date":"9/11/2016","title":"Patriot Day"}
			,{"date":"10/10/2016","title":"Columbus Day"}
			,{"date":"11/11/2016","title":"Veterans Day"}
			,{"date":"11/24/2016","title":"Thanksgiving Day"}
			,{"date":"12/25/2016","title":"Christmas Day"}
			
			,{"date":"1/01/2017","title":"New Year's Day"}
			,{"date":"1/16/2017","title":"MLK Day"}
			,{"date":"2/20/2017","title":"Presidents Day"}
			,{"date":"5/29/2017","title":"Memorial Day"}
			,{"date":"7/04/2017","title":"Independence Day"}
			,{"date":"9/04/2017","title":"Labor Day"}
			,{"date":"9/11/2017","title":"Patriot Day"}
			,{"date":"10/09/2017","title":"Columbus Day"}
			,{"date":"11/11/2017","title":"Veterans Day"}
			,{"date":"11/23/2017","title":"Thanksgiving Day"}
			,{"date":"12/25/2017","title":"Christmas Day"}
			
			,{"date":"1/01/2018","title":"New Year's Day"}
			,{"date":"1/15/2018","title":"MLK Day"}
			,{"date":"2/19/2018","title":"Presidents Day"}
			,{"date":"5/28/2018","title":"Memorial Day"}
			,{"date":"7/04/2018","title":"Independence Day"}
			,{"date":"9/03/2018","title":"Labor Day"}
			,{"date":"9/11/2018","title":"Patriot Day"}
			,{"date":"10/08/2018","title":"Columbus Day"}
			,{"date":"11/12/2018","title":"Veterans Day"}
			,{"date":"11/22/2018","title":"Thanksgiving Day"}
			,{"date":"12/25/2018","title":"Christmas Day"}
			
			,{"date":"1/01/2019","title":"New Year's Day"}
			,{"date":"1/21/2019","title":"MLK Day"}
			,{"date":"2/18/2019","title":"Presidents Day"}
			,{"date":"5/27/2019","title":"Memorial Day"}
			,{"date":"7/04/2019","title":"Independence Day"}
			,{"date":"9/02/2019","title":"Labor Day"}
			,{"date":"9/11/2019","title":"Patriot Day"}
			,{"date":"10/14/2019","title":"Columbus Day"}
			,{"date":"11/11/2019","title":"Veterans Day"}
			,{"date":"11/28/2019","title":"Thanksgiving Day"}
			,{"date":"12/25/2019","title":"Christmas Day"}
			
			,{"date":"1/01/2020","title":"New Year's Day"}
			,{"date":"1/20/2020","title":"MLK Day"}
			,{"date":"2/17/2020","title":"Presidents Day"}
			,{"date":"5/25/2020","title":"Memorial Day"}
			,{"date":"7/04/2020","title":"Independence Day"}
			,{"date":"9/07/2020","title":"Labor Day"}
			,{"date":"9/11/2020","title":"Patriot Day"}
			,{"date":"10/12/2020","title":"Columbus Day"}
			,{"date":"11/11/2020","title":"Veterans Day"}
			,{"date":"11/26/2020","title":"Thanksgiving Day"}
			,{"date":"12/25/2020","title":"Christmas Day"}
		]};
	
		// Leap year
		if(now.getYear()%4 == 0){
			n[1] = 29;
		}
		
		// Get some important days
		var fdom = mon.getDay(); // First day of month
		var mwks = 6 // Weeks in month
		
		// Render Month
		$('.year').html(mon.getFullYear());
		$('.month').html(m[mon.getMonth()]);
		
		// Clear view
		var h = $('#calendar > thead:last');
		var b = $('#calendar > tbody:last');
		
		h.empty();
		b.empty();
		
		// Render Days of Week
		for(var j=0;j<d.length;j++){
			_html += "<th>" +d[j]+ "</th>";
		}
		_html = "<tr>" +_html+ "</tr>";
		h.append(_html);
		
		// Render days
		var dow = 0;
		var first = 0;
		var last = 0;
		for(var i=0;i>=last;i++){
			
			_html = "";
			
			for(var j=0;j<d.length;j++){
				
				cls = "";
				msg = "";
				id = "";
				
				// Determine if we have reached the first of the month
				if(first >= n[mon.getMonth()]){
					dow = 0;
				}else if((dow>0 && first>0) || (j==fdom)){
					dow++;
					first++;
				}
				
				// Format Day of Week with leading zero
				dow = "0" + dow;
				
				// Get last day of month
				if(dow==n[mon.getMonth()]){
					last = n[mon.getMonth()];
				}
				
				
				// Check Event schedule
				$.each(evnt.event,function(){	
					if(this.date == mon.getMonth()+1 + "/" + dow.substr(-2) + "/" + mon.getFullYear()){
						cls = "holiday";
						msg = this.title;
					}
				});
				
				
				// Set class
				if(cls.length == 0){
					if(
						dow==now.getDate() 
						&& now.getMonth() == mon.getMonth() 
						&& now.getFullYear() == mon.getFullYear()
					){
						cls = "today";
					}else if(j == 0 || j == 6){
						cls = "weekend";
					}else{
						cls = "";
					}
				}
				
				// Set ID
				id = "cell_" + i + "" + j + "" + dow;
				
				// Render HTML
				if(dow == 0){
					_html += '<td>&nbsp;</td>';
				}else if(msg.length > 0){
					_html += '<td class="' +cls+ '" id="'+id+'"><span class="num">' + dow.substr(-2) + '</span><br/><span class="content">'+msg+'</span></td>';
				}else{
					_html += '<td class="' +cls+ '" id="'+id+'"><span class="num">' + dow.substr(-2) + '</span></td>';
				}
				
			}
			
			_html = "<tr>" +_html+ "</tr>";
			b.append(_html);
		}
		
		$('#last').unbind('click').bind('click',function(){
			ui.renderCalendar(prv.getMonth(),prv.getFullYear());
		});
		
		$('#current').unbind('click').bind('click',function(){
			ui.renderCalendar(now.getMonth(),now.getFullYear());
		});
		
		$('#next').unbind('click').bind('click',function(){
			ui.renderCalendar(nxt.getMonth(),nxt.getFullYear());
		});
		
		
	},
	
	
	// Render Clock
	"renderTime" : function(){
		var now = new Date();
		
		var tt = "AM";
		var hh = now.getHours();
		var nn = "0" + now.getMinutes();
		
		if(now.getHours()>12){
			hh = now.getHours()-12;
			tt = "PM";
		}
		
		$('.time').html(
			hh + ":" + nn.substr(-2) + " " + tt
		);
		
		var doit = function(){
			ui.renderTime();
		}
		
		setTimeout(doit,500);
	},
	
	
	// Initialization
	"init" : function(){
	}
	
};


// Initialize
ui.init();


// Load
$(document).ready(function(){
		
	// Render the calendar
	ui.renderCalendar();
	
	ui.renderTime();
	
});
