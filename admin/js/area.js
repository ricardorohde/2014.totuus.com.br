$(function () {
	// we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [50,20,40,1,80,100,50,20,40,1,80,100,50,20,40,1,80,100,50,20,40,1,80,100,50,20,40,1,80,100,57], totalPoints = 31;
	
	function getRandomData() {
		
		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		
		return res;
		
	}

	// setup plot
	var options = {
		yaxis: { min: 0, max: 100 },
		xaxis: { min: 0, max: 30 },
		colors: ["#006699", "#222", "#666", "#BBB"],
		series: {
				   lines: { 
						lineWidth: 2, 
						fill: true,
						fillColor: { colors: [ { opacity: 0.6 }, { opacity: 0.2 } ] },
						steps: false

					}
			   }
	};
	
	var plot = $.plot($("#area-chart"), [ getRandomData() ], options);
});