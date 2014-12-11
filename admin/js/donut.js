$(function () {

	var data = [];
	
	data[0] = { label: "Meta", data: Math.round((100 / 100) * 20)};
	data[1] = { label: "Restante", data: Math.round((50 / 100) * 20) }

	$.plot($("#donut-chart"), data,
	{
		colors: ["#006699", "#222", "#777", "#AAA"],
	        series: {
	            pie: { 
	                innerRadius: 0.5,
	                show: true
	            }
	        }
	});
	
});