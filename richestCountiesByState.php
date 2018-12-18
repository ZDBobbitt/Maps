<?php
/*
 *Template Name: Richest Counties By State
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="https://d3js.org/d3.v4.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

	.site-content {
	max-width: 700px;
	margin: 0 auto;
	}
	
/* Legend Font Style */
body {
	font: 11px sans-serif;
	background-color: #ffffff;
}
        
/* Legend Position Style */
.legend {
	position: absolute;
	left: 10px;
	top: 30px;
}

.axis text {
	font: 10px sans-serif;
}

.axis line, .axis path {
	fill: none;
	stroke: #000;
	shape-rendering: crispEdges;
}

#overview {
		 font-family: Raleway;
		 color: black;
		 max-width: 550px;
		 margin: 25px auto;
		 line-height: 1.75;
	 }
	
#dots {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.75;
		 text-align: center;
}	
	 
.titleWords {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
}

.titleWords_below_map {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
 margin-top: 40px;
}

#groupHeader {
 font-family: Raleway;
 color: black;
 margin: 25px auto;
 text-align: center;
 max-width: 550px;
 padding-top: 30px;
}

#title {
 color: #235a8d;
 max-width: 900px;
 margin: 25px auto;
 text-align: center;
 font-size: 60px;
 font-style: bold;
 font-family: Droid Serif; Helvetica;
}

#endNotes {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.25;
		 font-size: 14px;
	 }

hr {
 outline: black;
 max-width: 500px;
 
}

.states {
  fill: none;
  stroke: #fff;
  stroke-linejoin: round;
}

.counties {
  fill: none;
}

div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 13px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
			color: black;
	  }
	  
pre {
	display:none;
}

#subTitle {
width: 75%;
margin: 15px auto;
color: black;
margin-bottom: 50px;
}

#intro{
width: 80%;
margin: 0 auto;
}

#table_custom {
border-top: 2px solid white;
}

th {
text-align: center;
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
font-size: 14px;
}
	  
@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>
<body>

<div>
	<h1 id = 'title'>Population Size & Income</h1>
	<h2 class='titleWords'>Visualizing population size and median household income in all 3,000+ U.S. counties</h2>
	<hr>
	<p id='overview'>The <a href='https://factfinder.census.gov/faces/nav/jsf/pages/index.xhtml' target='_blank'>2012 - 2016 American Community Survey</a>, is a massive five-year study conducted by the U.S. Census Bureau.</p>
        <p id='overview'>Recently I dug up some data from this study to analyze two factors: county population size and median household income. I wanted to know if there was any relationship between the population size of a county and the corresponding median household income in that particular county. </p>
	<p id='overview'>It turns out that the correlation between county size and median household income is <b>0.24</b>, which indicates that there is a positive relationship between county size and income. Larger counties tend to have higher incomes and smaller counties tend to have lower incomes.</p>
	<p id='overview'>To see just how this relationship plays out around the country, check out the scatterplot and corresponding map below. In the scatterplot, each dot represents a county. Population is along the x-axis (on a log scale) and median household income is along the y-axis.</p>
	<p id='overview'>Hover over individual circles to see the county names. Click and drag a box anywhere you'd like in the scatterplot to see the corresponding counties highlighted in the map below.</p>
        <p id='overview'><b>Note:</b> These interactive visualizations will work on mobile, but are best viewed on desktop.</p>
    <hr>
</div>

<div id="scatterplot"></div>
<div id="choropleth"></div>

<h2 class='titleWords_below_map'>Four County Sizes</h2>
	<p id='overview'>One way to analyze this data is to group the counties into four equal quartiles based on their size. The table below shows the average median household income for counties based on their population size:</p>
<div style='width:81%; margin-left: 11%;'> <!--START TABLE-->
<table id='table_custom'>
  <tr>
    <th>County Size (population)</th>
    <th>Median Household Income</th> 
  </tr>
    <tr>
    <td class='td_percent'>Greater than 68,000</td> 
    <td class='td_percent'>$56,270</td>
  </tr>
    <tr>
    <td class='td_percent'>25,751 - 68,000</td>
    <td class='td_percent'>$46,662</td>
  </tr>
  <tr>
    <td class='td_percent'>11,000 - 25,750</td>
    <td class='td_percent'>$43,729</td>
  </tr>
  <tr>
    <td class='td_percent'>Less than 11,000</td>
    <td class='td_percent'>$45,265</td> 
  </tr>
</table>          
</div> <!--END TABLE-->

	<h2 class='titleWords_below_map'>The Ten Largest Counties</h2>
	<p id='overview'>The table below shows the ten largest counties by population, along with their median household income.</p>
<div style='width:81%; margin-left: 11%;'> <!--START TABLE-->
<table id='table_custom'>
  <tr>
    <th>County</th>
    <th>Population</th>
    <th>Median Household Income</th> 
  </tr>
  <tr>
    <td>Los Angeles County, California</td>
    <td class='td_percent'>10,057,155</td> 
    <td class='td_percent'>$57,952</td> 
  </tr>
  <tr>
    <td>Cook County, Illinois</td>
    <td class='td_percent'>5,227,575</td>
    <td class='td_percent'>$56,902</td>
  </tr>
    <tr>
    <td>Harris County, Texas</td>
    <td class='td_percent'>4,434,257</td>
    <td class='td_percent'>$55,584</td>
  </tr>
    <tr>
    <td>Maricopa County, Arizona</td>
    <td class='td_percent'>4,088,549</td> 
    <td class='td_percent'>$55,676</td>
  </tr>
      <tr>
    <td>San Diego County, California</td>
    <td class='td_percent'>3,253,356</td> 
    <td class='td_percent'>$66,529</td>
  </tr>
  <tr>
    <td>Orange County, California</td>
    <td class='td_percent'>3,132,211</td> 
    <td class='td_percent'>$78,145</td>
  </tr>
  <tr>
    <td>Miami-Dade County, Florida</td>
    <td class='td_percent'>2,664,418</td>
    <td class='td_percent'>$44,224</td>
  </tr>
  <tr>
    <td>Kings County, New York</td>
    <td class='td_percent'>2,606,852</td> 
    <td class='td_percent'>$50,640</td>
  </tr>
    <tr>
    <td>Dallas County, Texas</td>
    <td class='td_percent'>2,513,054</td> 
    <td class='td_percent'>$51,411</td>
  </tr>
    <tr>
    <td>Riverside County, California</td>
    <td class='td_percent'>2,323,892</td> 
    <td class='td_percent'>$57,972</td>
  </tr>
</table>          
</div> <!--END TABLE-->
	
	<h2 class='titleWords'>The Ten Smallest Counties</h2>
	<p id='overview'>The table below shows the ten smallest counties by population, along with their median household income.</p>
<div style='width:81%; margin-left: 11%;'> <!--START TABLE-->
<table id='table_custom'>
  <tr>
    <th>County</th>
    <th>Population</th>
    <th>Median Household Income</th> 
  </tr>
  <tr>
    <td>Loving County, Texas</td>
    <td class='td_percent'>76</td> 
    <td class='td_percent'>$56,875</td> 
  </tr>
  <tr>
    <td>Kalawao County, Hawaii</td>
    <td class='td_percent'>91</td>
    <td class='td_percent'>$65,625</td>
  </tr>
    <tr>
    <td>King County, Texas</td>
    <td class='td_percent'>274</td>
    <td class='td_percent'>$57,083</td>
  </tr>
    <tr>
    <td>McPherson County, Nebraska</td>
    <td class='td_percent'>425</td> 
    <td class='td_percent'>$53,750</td>
  </tr>
      <tr>
    <td>Arthur County, Nebraska</td>
    <td class='td_percent'>437</td> 
    <td class='td_percent'>$40,375</td>
  </tr>
  <tr>
    <td>Petroleum County, Montana</td>
    <td class='td_percent'>445</td> 
    <td class='td_percent'>$38,250</td>
  </tr>
  <tr>
    <td>Loup County, Nebraska</td>
    <td class='td_percent'>542</td>
    <td class='td_percent'>$56,750</td>
  </tr>
  <tr>
    <td>San Juan County, Colorado</td>
    <td class='td_percent'>552</td> 
    <td class='td_percent'>$41,250</td>
  </tr>
    <tr>
    <td>Kenedy County, Texas</td>
    <td class='td_percent'>558</td> 
    <td class='td_percent'>$24,000</td>
  </tr>
    <tr>
    <td>Harding County, New Mexico</td>
    <td class='td_percent'>565</td> 
    <td class='td_percent'>$32,404</td>
  </tr>
</table>          
</div> <!--END TABLE-->
	
	<h2 class='titleWords'>Explore the Data</h2>
	<p id='overview'> It's amazing to see just how much household income and population size vary from county to county. Median household incomes ranges from $18k up to $125k and population size ranges from 76 in Loving County to over 10 million in Los Angeles County, California.</p>
	<p id='overview'>Feel free to explore the data further yourself by using the scatterplot to filter the map. Both the scatterplot and the map are interactive, so hovering over individual circles or individual counties will reveal county name, population size, and median household income for that particular county.</p>
	
	<hr>
	<p id='overview'><b>Technical Notes:</b> I downloaded data for these visuals directly from <a href='https://factfinder.census.gov/faces/nav/jsf/pages/index.xhtml' target='_blank'>the U.S. Census American FactFinder</a>. I used <a href='https://d3js.org/' target='_blank'>D3.js</a>, a JavaScript visualization library, to create the map and scatterplot. The idea for this article was inspired by <a href='https://bl.ocks.org/cmgiven/abca90f6ba5f0a14c54d1eb952f8949c' target='_blank'>this block</a> from Chris Given. </p>

<script src="https://d3js.org/topojson.v2.min.js"></script>
<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<script>
//inspiration from https://bl.ocks.org/cmgiven/abca90f6ba5f0a14c54d1eb952f8949c

var unemployment = d3.map();
var unemployment2 = d3.map();
var unemployment3 = d3.map();

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

d3.queue()
    .defer(d3.csv, 'https://raw.githubusercontent.com/ZDBobbitt/Maps/master/population_vs_income.csv', function (d) {
        unemployment.set(d.id, +d.population);
		unemployment2.set(d.id, d.Geography);
		unemployment3.set(d.id, +d.medianHouseholdIncome);
		
		return {
	    id: d.id,
            Geography: d.Geography,
            population: +d.population,
            medianHouseholdIncome: +d.medianHouseholdIncome
        }
    })
    .defer(d3.json, 'https://d3js.org/us-10m.v1.json')
    .awaitAll(initialize)

//var color = d3.scaleThreshold()
//    .domain([20000, 50000, 80000])
//    .range(['#fbb4b9', '#f768a1', '#c51b8a', '#7a0177'])

var color = d3.scaleThreshold()
    .domain([10000, 20000, 30000, 40000, 50000, 60000, 70000, 90000])
    .range(d3.schemeBlues[9]);

function initialize(error, results) {
    if (error) { throw error }

    var data = results[0]
    var us = results[1]
	
    var components = [
        choropleth(us),
        scatterplot(onBrush)
    ]

    function update() {
        components.forEach(function (component) { component(data) })
    }

    function onBrush(x0, x1, y0, y1) {
        var clear = x0 === x1 || y0 === y1
        data.forEach(function (d) {
            d.filtered = clear ? false
                : d.population< x0 || d.population> x1 || d.medianHouseholdIncome< y0 || d.medianHouseholdIncome> y1
        })
        update()
    }

    update()
}

function scatterplot(onBrush) {
    var margin = { top: 10, right: 15, bottom: 40, left: 75 }
    var width = 840 - margin.left - margin.right
    var height = 340 - margin.top - margin.bottom

    var x = d3.scaleLog()
        .range([0, width])
    var y = d3.scaleLinear()
        .range([height, 0])

    var xAxis = d3.axisBottom()
        .scale(x)
        .tickFormat(d3.format('.2s'))
        .ticks(3)
    var yAxis = d3.axisLeft()
        .scale(y)
        .tickFormat(d3.format('$.2s'))

    var brush = d3.brush()
        .extent([[0, 0], [width, height]])
        .on('start brush', function () {
            var selection = d3.event.selection

            var x0 = x.invert(selection[0][0])
            var x1 = x.invert(selection[1][0])
            var y0 = y.invert(selection[1][1])
            var y1 = y.invert(selection[0][1])

            onBrush(x0, x1, y0, y1)
        })

    var svg = d3.select('#scatterplot')
        .append('svg')
        .attr('width', width + margin.left + margin.right)
        .attr('height', height + margin.top + margin.bottom)
        .append('g')
        .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')

    var bg = svg.append('g')
    var gx = svg.append('g')
        .attr('class', 'x axis')
        .attr('transform', 'translate(0,' + height + ')')
    var gy = svg.append('g')
        .attr('class', 'y axis')

    gx.append('text')
        .attr('x', width)
        .attr('y', 35)
        .style('text-anchor', 'end')
        .style('fill', '#000')
        .style('font-weight', 'bold')
        .text('Population')

    gy.append('text')
        .attr('transform', 'rotate(-90)')
        .attr('x', 0)
        .attr('y', -40)
        .style('text-anchor', 'end')
        .style('fill', '#000')
        .style('font-weight', 'bold')
        .text('Median Household Income')

    svg.append('g')
        .attr('class', 'brush')
        .call(brush)

    return function update(data) {
        x.domain(d3.extent(data, function (d) { return +d.population})).nice()
        y.domain(d3.extent(data, function (d) { return +d.medianHouseholdIncome})).nice()
		
        gx.call(xAxis)
        gy.call(yAxis)

        var bgRect = bg.selectAll('rect')
            .data(d3.pairs(d3.merge([[y.domain()[0]], color.domain(), [y.domain()[1]]])))
        bgRect.exit().remove()
        bgRect.enter().append('rect')
            .attr('x', 0)
            .attr('width', width)
            .merge(bgRect)
            .attr('y', function (d) { return y(d[1]) })
            .attr('height', function (d) { return y(d[0]) - y(d[1]) })
            .style('fill', function (d) { return color(d[0]) })

        var circle = svg.selectAll('circle')
            .data(data, function (d) { return d.Geography; })
        circle.exit().remove()
        circle.enter().append('circle')
            .attr('r', 4)
            .style('stroke', '#fff')
            .merge(circle)
            .attr('cx', function (d) { return x(d.population) })
            .attr('cy', function (d) { return y(d.medianHouseholdIncome) })
            .style('fill', function (d) { return color(d.medianHouseholdIncome) })
            .style('opacity', function (d) { return d.filtered ? 0.5 : 1 })
            .style('stroke-width', function (d) { return d.filtered ? 1 : 2 })
            .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	    
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<span style='font-size: 16px'><b>" + (d.Geography = unemployment2.get(d.id)) + "</b></span>" + "<br/><b>Population:</b> " + d.population.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "<br/><b>Median household income: </b>$" + d.medianHouseholdIncome.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
    .on("mouseout", function(d) {
            d3.select(this).style("stroke", "#fff")	
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
    }
}

function choropleth(us) {
    var width = 960
    var height = 600

    var path = d3.geoPath()

    var svg = d3.select('#choropleth')
        .append('svg')
        .attr('width', width)
        .attr('height', height);
		
  svg.append("g")
     .attr("class", "counties")
     .selectAll("path")
	    .data(topojson.feature(us, us.objects.counties).features)
	    .enter().append("path")
		.attr("class", "countyLines")
		.attr("fill", function(d) { return color(d.medianHouseholdIncome= unemployment3.get(d.id)); } )
	    .attr("d", path)
		.on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<span style='font-size: 16px'><b>" + (d.Geography = unemployment2.get(d.id)) + "</b></span>" + "<br/><b>Population: </b>" + d.population.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "<br/><b>Median household income: </b>$" + d.medianHouseholdIncome.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
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

    return function update(data) {
        svg.selectAll('.countyLines')
            .data(data, function (d) { return d.Geography || (d.Geography = unemployment2.get(d.id)) })
            .style('fill', function (d) { return d.filtered ? '#ddd' : color(d.medianHouseholdIncome= unemployment3.get(d.id)) })
    }
}
</script>
</body>
</html>
<?php get_footer();?>