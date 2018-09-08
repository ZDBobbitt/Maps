<?php
/*
 *Template Name: One Bed Two Bed Rent by County (REAL - other one is rent as percentage of income )
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="https://d3js.org/d3.v4.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');


.axis--y .domain {
  display: none;
}

h1 {
text-align: center;
font-size: 50px;
margin-bottom: 0px;
font-family: 'Droid Serif', serif;
}

h3, h4, h5, h6 {
text-align: center;
margin-bottom: 15px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

p {
color: black;
}

#words {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
}

#end_notes{
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
font-size: 14px;
}

#words_last {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
margin-bottom: 50px;
}

.medianPrice {
font-family: Raleway;
font-size: 14px;
}

.usa_label {
font-family: Raleway;
font-size: 11px;
font-weight: bold;
}

#intro{
width: 80%;
margin: 0 auto;
}

#subTitle {
width: 75%;
margin: 15px auto;
color: black;
margin-bottom: 50px;
}

#table_custom {
border-top: 2px solid white;
}

th {
font-size: 14px;
color: black;
font-weight: bold;
border-bottom: 2px solid black;
}

tr {
height: 10px;
}

td {
font-size: 14px;
color: black;
}

.td_percent {
text-align: center;
background-color: #632674;
color: white;
font-size: 16px;
}

.td_percent2 {
text-align: center;
background-color: #dab7ea;
font-size: 16px;
}

#three_dots {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
text-align: center;
font-size: 26px;
}

.counties {
  fill: none;
}

.states {
  fill: none;
  stroke: #fff;
  stroke-linejoin: round;
}

#endNotes {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.25;
		 font-size: 14px;
	 }

div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 14px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
			color: black;
	  }
	 
.caption {
	font-size: 11px;
}

*:focus {
    outline: none;
}

#countyNames {
	outline: none;
	border: none;
	border-bottom: thin black solid;
	border-radius: 0px;
	font-size: 16px;
	width: 270px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 600;
}

#table_custom {
border-top: 2px solid white;
}

th {
font-size: 14px;
color: black;
font-weight: bold;
border-bottom: 2px solid black;
}

tr {
height: 10px;
}

td {
font-size: 14px;
color: black;
}

#dots {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.75;
		 text-align: center;
}

@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>

<body>

<div id='intro'><!--start of title-->
	  <h1 style='color: #632674; font-size: 66px;'>Rent Affordability</h1>
            <h3 id='subTitle'><strong>Visualizing the median rent price as a percentage of income in all 3,000 + U.S. Counties</strong></h3>
</div> <!-- end of title-->

<div id='svg_cover'></div> <!--COVER PHOTO-->

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>I recently created <a href ='http://www.fourpillarfreedom.com/visualizing-median-monthly-rent-for-all-3000-u-s-counties/' target='_blank'>a map that shows the median monthly rent in every U.S. county</a>. While this map is useful in seeing how rent fluctuates from one county to the next, it doesn't necessarily show how affordable rent prices are in a given city.</p>
            <p id='words'>For example, counties with high monthly rents tend to have high household incomes. Likewise, counties with lower monthly rents tend to have lower household incomes.</p>
            <p id='words'>To see how affordable rent prices are in a particular county, it's helpful to look at the median monthly rent price as a percentage of monthly household income. For example, a county with a median monthly rent of $1,000 and a median household income of $3,000 has a <i>median rent as a percentage of income</i> of 33.3%. The lower this number, the more affordable rent is in a given city.</p>
            <p id='words'><b>Technical notes:</b> <i>Rent</i> includes the cost of rent as well as utilities like water, gas, electricity, and sewer. <i>Household income</i> is the combined gross income (before taxes) of all the members of a household who are 15 years or older.</p>
<p id='words_last'>Check out the map below to see the median monthly rent as a percentage of household income in all 3,000+ U.S. counties. Click on or hover over individual counties to see the county name.</p>
</div> <!-- end of intro paragaph-->

<svg width="960" height="600"></svg>

<div id='intro'><!--start of intro paragraph-->
<h3 style='margin-top: 70px'><b>Top 10 Counties with Highest Median Rent as a Percentage of Income</b></h3>
<p>The following ten counties have the highest median rent as a percentage of income.</p>

<div style='width:81%; margin-left: 11%;'> <!--START TABLE-->
<table id='table_custom'>
  <tr>
    <th>County</th>
    <th>Median Rent as a Percentage of Income</th> 
  </tr>
  <tr>
    <td>Quitman County, Georgia</td>
    <td class='td_percent'>50%</td> 
  </tr>
  <tr>
    <td>Wolfe County, Kentucky</td>
    <td class='td_percent'>50%</td> 
  </tr>
    <tr>
    <td>Mora County, New Mexico</td>
    <td class='td_percent'>50%</td>
  </tr>
    <tr>
    <td>Watauga County, North Carolina</td>
    <td class='td_percent'>50%</td> 
  </tr>
      <tr>
    <td>Fairfield County, South Carolina</td>
    <td class='td_percent'>46.5%</td> 
  </tr>
  <tr>
    <td>Loving County, Texas</td>
    <td class='td_percent'>46.3%</td> 
  </tr>
  <tr>
    <td>Jefferson Davis County, Mississippi</td>
    <td class='td_percent'>45.6%</td>
  </tr>
  <tr>
    <td>McCreary County, Kentucky</td>
    <td class='td_percent'>45.5%</td> 
  </tr>
    <tr>
    <td>Hyde County, North Carolina</td>
    <td class='td_percent'>45.3%</td> 
  </tr>
    <tr>
    <td>Lee County, Kentucky</td>
    <td class='td_percent'>45.2%</td> 
  </tr>
</table>          
</div> <!--END TABLE-->
<p style='margin-top: 30px'>It's incredible to see that households in these counties are spending about half of their monthly income on rent and utilities alone. It's also interesting to note that nearly all of these counties are located in the southeast.</p>
</div>

<div id='intro'><!--start of intro paragraph-->
<h3 style='margin-top: 40px'><b>Top 10 Counties with Lowest Median Rent as a Percentage of Income</b></h3>
<p>The following ten counties have the lowest median rent as a percentage of income:</p>

<div style='width:81%; margin-left: 11%;'> <!--START TABLE-->
<table id='table_custom'>
  <tr>
    <th>County</th>
    <th>Median Rent as a Percentage of Income</th> 
  </tr>
  <tr>
    <td>Greenlee County, Arizona</td>
    <td class='td_percent2'>10%</td> 
  </tr>
  <tr>
    <td>McMullen County, Texas</td>
    <td class='td_percent2'>10%</td> 
  </tr>
    <tr>
    <td>Daggett County, Utah</td>
    <td class='td_percent2'>10%</td>
  </tr>
    <tr>
    <td>Bath County, Virginia</td>
    <td class='td_percent2'>12%</td> 
  </tr>
    <tr>
    <td>Clark County, Idaho</td>
    <td class='td_percent2'>12.3%</td> 
  </tr>
  <tr>
    <td>Keya Paha County, Nebraska</td>
    <td class='td_percent2'>12.5%</td> 
  </tr>
  <tr>
    <td>Denali Borough, Alaska</td>
    <td class='td_percent2'>12.8%</td>
  </tr>
  <tr>
    <td>Billings County, North Dakota</td>
    <td class='td_percent2'>13.6%</td> 
  </tr>
  <tr>
    <td>Wheeler County, Nebraska</td>
    <td class='td_percent2'>13.7%</td> 
  </tr>
    <tr>
    <td>Kearny County, Kansas</td>
    <td class='td_percent2'>14.3%</td> 
  </tr>
</table>          
</div> <!--END TABLE-->
<p style='margin-top: 30px'>By contrast, households in each of these counties are spending less than 15% of their income on rent and utilities.</p>
</div>

<div id='intro'><!--start of intro paragraph-->
<h3 style='margin-top: 50px'><b>Interesting Facts</b></h3>
<p>4.7% (149) of all counties have a <i>median rent as a percentage of household income</i> of 20% or less</p>
<p>17% (534) of all counties have a <i>median rent as a percentage of household income</i> between 20% and 25%</p>
<p>48% (1,509) of all counties have a <i>median rent as a percentage of household income</i> between 25% and 30%</p>
<p>25.5% (800) of all counties have a <i>median rent as a percentage of household income</i> between 30% and 35%</p>
<p>4.7% (149) of all counties have a <i>median rent as a percentage of household income</i> of 35% or higher</p>
</div>

<div id='intro'><!--start of intro paragraph-->
	<hr style='margin-top: 50px'>
	<p id='endNotes'><b>Technical notes:</b> This map was created using D3.js, a javascript library for producing visualizations. Code for this visual is based on <a href='https://bl.ocks.org/mbostock/4060606' target='_blank'>this D3.js Block</a> by Mike Bostock. Data for this visual came from the <a href ='https://factfinder.census.gov/faces/nav/jsf/pages/index.xhtml' target='_blank'>2012 - 2016 American Community Survey</a>, a 5-year study conducted by the U.S. Census Bureau.</p>
</div> <!-- end of intro paragaph-->

<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<script src="https://d3js.org/colorbrewer.v1.min.js"></script>
<script src="https://d3js.org/topojson.v2.min.js"></script>
<script>
//code adopted from https://bl.ocks.org/mbostock/4060606
// mean commute time - 26.1 minutes

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("svg"),
    width = +svg.attr("width"),
    height = +svg.attr("height");

var unemployment = d3.map();
var unemployment2 = d3.map();

var path = d3.geoPath();

var x = d3.scaleLinear()
    .domain([1, 10])
    .rangeRound([600, 860]);
    
var color = d3.scaleThreshold()
    .domain(d3.range(2, 10))
    .range(d3.schemeRdPu[9]);

var g = svg.append("g")
    .attr("class", "key")
    .attr("transform", "translate(0,40)");

g.selectAll("rect")
  .data(color.range().map(function(d) {
      d = color.invertExtent(d);
      if (d[0] == null) d[0] = x.domain()[0];
      if (d[1] == null) d[1] = x.domain()[1];
      return d;
    }))
  .enter().append("rect")
    .attr("height", 8)
    .attr("x", function(d) { return x(d[0]); })
    .attr("width", function(d) { return x(d[1]) - x(d[0]); })
    .attr("fill", function(d) { return color(d[0]); });

g.append("text")
    .attr("class", "caption")
    .attr("x", x.range()[0])
    .attr("y", -6)
    .attr("fill", "#000")
    .attr("text-anchor", "start")
    .attr("font-weight", "bold")
    .text("Median rent as a percentage of income");
    
g.append("text")
.attr("class", "caption")
.attr("x", 607)
.attr("y", 20)
.attr("fill", "#000")
.text("15%");

g.append("text")
.attr("class", "caption")
.attr("x", 662)
.attr("y", 20)
.attr("fill", "#000")
.text("22.5%");

g.append("text")
.attr("class", "caption")
.attr("x", 720)
.attr("y", 20)
.attr("fill", "#000")
.text("30%");

g.append("text")
.attr("class", "caption")
.attr("x", 778)
.attr("y", 20)
.attr("fill", "#000")
.text("37.5%");

g.append("text")
.attr("class", "caption")
.attr("x", 832)
.attr("y", 20)
.attr("fill", "#000")
.text("45%+");

d3.queue()
    .defer(d3.json, "https://d3js.org/us-10m.v1.json")
    .defer(d3.csv, "https://raw.githubusercontent.com/ZDBobbitt/Maps/master/rentAsPercentageOfIncome.csv", function(d) { unemployment.set(d.id, +d.medianRentAsPercentageofIncome); unemployment2.set(d.id, d.Geography); })
    .await(ready);

function ready(error, us) {
  if (error) throw error;
  
  //create color scale
    var color2 = d3.scaleThreshold()
        .range(d3.schemeRdPu[9])
        .domain(d3.range(15, 45, 3.75));

  svg.append("g")
      .attr("class", "counties")
    .selectAll("path")
    .data(topojson.feature(us, us.objects.counties).features)
    .enter().append("path")
      .attr("fill", function(d) { return color2(d.medianHouseholdIncome= unemployment.get(d.id)); })
      .attr("d", path)
    .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>" + (d.Geography = unemployment2.get(d.id)) + "</b>" + "<br/>Median Rent as a Percentage of Income: " + d.medianHouseholdIncome.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "%")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
    .on("mouseout", function(d) {
            d3.select(this).style("stroke-width", 0)	
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });

  svg.append("path")
      .datum(topojson.mesh(us, us.objects.states, function(a, b) { return a !== b; }))
      .attr("class", "states")
      .attr("d", path);
}


d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/household200kIncomes.csv", function(data) {
	var select = d3.select("#countyNames")
		       .selectAll("option")
	     		 .data(data)
	     		 .enter()
	     		   .append("option")
	        	   .attr("value", function (d) { return d.medianHouseholdIncome; })
	        	   .attr("label", function (d) { return d.Geography; });	     

   d3.select('#countyNames')
	  .on('change', function() {
	  //find variables values
	  var county_mins = eval(d3.select(this).property('value'));
	  var minute_difference = (Math.abs(30.3 - county_mins)).toFixed(1);
	  
	  //output of average commute time
	  document.getElementById('countyMinutes').innerHTML = county_mins;
	  
	  //output of commute time difference between county and national average
	  if (county_mins >=30.3) {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " percent higher";
	  document.getElementById('countyMinutesDifference').style.color = '#46c95c';
	  }
	  else {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " percent lower";
	  document.getElementById('countyMinutesDifference').style.color = '#db4545';
	  }
});

});

</script>
</body>
</html>
<?php get_footer();?>