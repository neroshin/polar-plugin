<?php 
        global $wpdb;
        $user = wp_get_current_user();
        $userID = $user->ID;
        //print_r($user);
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<style>
        table {
           
            font: 17px Calibri;
        }
        table, th, td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
            white-space: nowrap;
        }
        td.fitwidth {
    width: 1px;
    white-space: nowrap;
}
.label:empty {
    display: block;
    color: black;
    font-weight: 100;
    font-size: 17px;
}
.label{
    width: 70px !important;
}
.Value{
    width: 70px !important;
}
.fitwidth{
    width: 70px !important;
}

.todo-num{
    font-weight: bold;
    margin-right:4px;
}
ul{
    padding-left:0px !important;
}

li{
    list-style:none;
}
table, th, tr, td {
    border: none !important;
}
/* REMOVE NUMBER INPUT STEPPER */
/* input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
} */

/* Firefox */
/* input[type=number] {
  -moz-appearance: textfield;
} */


/* @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");
  
ol {
  max-width: 350px;
  counter-reset: my-awesome-counter;
  list-style: none;
  padding-left: 40px;
}
ol li {
  margin: 0 0 0.5rem 0;
  counter-increment: my-awesome-counter;
  position: relative;
  color: red;
}
ol li::before {
  content: counter(my-awesome-counter);
  font-size: 1.5rem;
  font-weight: bold;
  position: absolute;
  --size: 32px;
  left: calc(-1 * var(--size) - 10px);
  line-height: var(--size);
  width: var(--size);
  height: var(--size);
  top: 0;
  transform: rotate(-10deg);
  background: rgba(255,255,255, .5);
  border-radius: 50%;
  text-align: center;
  box-shadow: 1px 1px 0 #999;
} */

    </style>

<!-- <canvas id="chart-area2"></canvas> -->

<div class="chart-container" style="position: relative; width: 100%; float:left; display: flex; flex-flow: column;">



    <canvas id="chart-area2" height="450" width="600"></canvas>
    
    
 
    <!-- <input type="button" id="addRow2" value="Add New Row" onclick="addRowBusiness()" style="margin: 12px 4px;" class="btn btn-primary" /> -->
   

    <h4 class="text-center">FIRST 5 THINGS TO DO IN BUSINESS</h4>


   <!-- <div id="cont">
   <table id="empTable2">
   <thead>
	 <tr>
          <th class="fitwidth">Action</th>
          <th class="fitwidth">Label</th>
          <th class="fitwidth">Value</th>
      </tr>
   </thead>
   <tbody>
     
       </tbody></table>
	</div> -->

    <div id="cont">
   <table id="empTable2" class="" >
    <thead>
        <tr>
            <th class="fitwidth" scope="row"></th>
        </tr>
    </thead>

        <tbody>
            
        </tbody>

    </table>
	</div>

</div>

 <!--THE CONTAINER WHERE WE'll ADD THE DYNAMIC TABLE-->





    
<script>

  var arrHead = new Array();
    //   arrHead = ['Goals', 'Value', 'Todo'];   // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.
      arrHead = [''];   // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    $(document).ready(function() {
       // your init code
       var ctx2 = document.getElementById('chart-area2').getContext("2d");
        window.myPolarArea2 = Chart.PolarArea(ctx2, config2);

        
        populate_table2();
});
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
 
    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    /*  datasets: [{
                business.data,
                business.backgroundColor,
                label: 'My dataset' // for legend 
            }],
            business.labels */
    var config2 = {
        data: {
            datasets: [{
                data: business.data,
                backgroundColor:business.backgroundColor,
                label: 'business' // for legend 
            }],
            labels:business.labels
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Wheel of business',
                fontSize : 18
            },
            scale: {
                ticks: {
                    beginAtZero: true
                },
                reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

 
    

   
   /*window.onload = function() {
         var ctx2 = document.getElementById('chart-area2').getContext("2d");
        window.myPolarArea2 = Chart.PolarArea(ctx2, config2);

            
        populate_table2();
    };*/
      
	function populate_table2(){
        if( business.data !== undefined && business.data.length != 0){
				jQuery.each(business.data , function(key , value){
					 var empTab = document.getElementById('empTable2').getElementsByTagName('tbody')[0];
						
						var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
						var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
					   // tr = empTab.insertRow(rowCnt);

						for (var c = 0; c < arrHead.length; c++) {
							var td = document.createElement('td');          // TABLE DEFINITION.
							td = tr.insertCell(c);

							if (false) {           // FIRST COLUMN.
								// ADD A BUTTON.
								// var button = document.createElement('input');

								// // SET INPUT ATTRIBUTE.
								// button.setAttribute('type', 'button');
								// button.setAttribute('value', 'Remove');
								// // button.setAttribute('index', (business.data.length - key));
								// button.setAttribute('index', key);
								// // ADD THE BUTTON's 'onclick' EVENT.
								// button.setAttribute('class', 'removeRow_business btn');
								// button.style.backgroundColor = business.backgroundColor[key];
                                // td.appendChild(button);
                                // console.log('business');
							}
							else {
                                // $(td).append('<div class="card-header" id="headingOne" style="display:flex; justify-content:space-between; background-color:'+business.backgroundColor[key]+';"> <span class="mb-0" > <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2'+business.labels[key]+'" aria-expanded="true" aria-controls="collapse2'+business.labels[key]+'" style="font-weight:bold;color:white;"> '+business.labels[key]+'<i class="medium material-icons"></i> </button> <input index="'+key+'" type="hidden" class="label form-control" value="'+business.labels[key]+'"/>  </span> <input index="'+key+'" type="number" class="form-control Value" value="'+value+'"/> </div><div class="card-body" style="border: 2px solid ${business.backgroundColor[key]}; margin-bottom: 4px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; padding: 0px !important"> <div id="collapse2'+business.labels[key]+'" class="collapse things-todo" aria-labelledby="headingOne" data-parent="#accordionExample" style="padding: 12px;"> <ul id="business-things-todo" class="" data-wheel="business" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important"> <li> <input class="form-control" name="todo['+key+'][0]" value="'+(typeof business.things_todo === "undefined"? "" : business.things_todo[key][0])+'"></li><li><input class="form-control" name="todo['+key+'][1]" value="'+(typeof business.things_todo === "undefined"? "" : business.things_todo[key][1])+'"></li><li><input class="form-control" name="todo['+key+'][2]" value="'+(typeof business.things_todo === "undefined"? "" : business.things_todo[key][2])+'"></li><li><input class="form-control" name="todo['+key+'][3]" value="'+(typeof business.things_todo === "undefined"? "" : business.things_todo[key][3])+'"></li><li><input class="form-control" name="todo['+key+'][4]" value="'+(typeof business.things_todo === "undefined"? "" : business.things_todo[key][4])+'"></li></ul> </div></div></div>');
                                $(td).append(`
                                <div class="card-header" id="headingOne" style="display:flex; justify-content:space-between; background-color:${business.backgroundColor[key]};">
                                <div style="display:flex;">
                                    <span class="mb-0" > 
                                    <input index="${key}" type="text" style="height:38px; width: 100% !important;" class="label form-control" value="${business.labels[key]}"/>  
                                    </span> 
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2${business.labels[key]}" aria-expanded="true" aria-controls="collapse2${business.labels[key]}" style="font-weight:bold;color:white;"><i class="medium material-icons">arrow_drop_down</i> </button> 
                                </div>
                                        <input index="${key}" type="number" class="form-control Value" value="${value}"/> 
                                </div>
                                <div class="card-body" style="border: 2px solid ${business.backgroundColor[key]}; margin-bottom: 4px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; padding: 0px !important"> 
                                    <div id="collapse2${business.labels[key]}" class="collapse things-todo" aria-labelledby="headingOne" data-parent="#accordionExample" style="padding: 12px;"> 
                                        <ul id="business-things-todo" class="" data-wheel="business" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important"> 
                                            <li> <input class="form-control" name="todo[${key}][0]" value="${(typeof business.things_todo === "undefined"? "" : business.things_todo[key][0])}"></li>
                                            <li><input class="form-control" name="todo[${key}][1]" value="${(typeof business.things_todo === "undefined"? "" : business.things_todo[key][1])}"></li>
                                            <li><input class="form-control" name="todo[${key}][2]" value="${(typeof business.things_todo === "undefined"? "" : business.things_todo[key][2])}"></li>
                                            <li><input class="form-control" name="todo[${key}][3]" value="${(typeof business.things_todo === "undefined"? "" : business.things_todo[key][3])}"></li>
                                            <li><input class="form-control" name="todo[${key}][4]" value="${(typeof business.things_todo === "undefined"? "" : business.things_todo[key][4])}"></li>
                                        </ul> 
                                        <button class="btn business-save" style="background-color:${business.backgroundColor[key]}; font-weight:bold; color:white; width:100%;">Save</button>
                                    </div>
                                </div>
                                `);
                                // CREATE AND ADD TEXTBOX IN EACH CELL.
                                // console.log('business', arrHead[c]);
								// if(arrHead[c] == "Value" ){
								// 	var ele = document.createElement('input');
								// 	ele.setAttribute('type', 'number');
                                //     ele.setAttribute('value',value);
                                //     ele.setAttribute('min',0);
								// 	ele.setAttribute('max',10);
								// 	// ele.setAttribute('index', (business.data.length - key));
								// 	ele.setAttribute('index',key);
                                //     ele.setAttribute('class', `${arrHead[c]} form-control text-center`);
                                //     ele.style.borderColor = business.backgroundColor[key];
                                //     ele.style.borderWidth = '2px';
								// 	td.appendChild(ele);
								// }
								// if(arrHead[c] == "Todo" ){
								// 	//  var ele = document.createElement('input');
								// 	// ele.setAttribute('type', 'text');
								// 	// ele.setAttribute('value',business.labels[key]);
								// 	// // ele.setAttribute('index', (business.data.length - key));
								// 	// ele.setAttribute('index', key);
								// 	// ele.setAttribute('class', `${arrHead[c]} form-control`);
                                //     // td.appendChild(ele);
                                    
                                //     if(business.things_todo){
                                //         $(td).append(' <button class="btn" style="background-color:'+business.backgroundColor[key]+'; font-weight:bold; color:white; width:200px; margin-bottom: 8px;" type="button" data-toggle="collapse" data-target="#collapseB'+business.labels[key]+'" aria-expanded="false" aria-controls="collapseExample">5 Things To Do @ '+business.labels[key]+'</button>'+
                                //         '<div class="collapse things-todo"  id="collapseB'+business.labels[key]+'" style="background-color:gray; padding: 4px 4px 4px 8px; border-radius:8px;"><ul id="business-things-todo" class=""  data-wheel="business" style="padding-bottom: 0px!important; padding-left: 0px!important">' +
                                //         '<li> <input class="form-control" style="width:200px" name="todo['+key+'][0]" value="'+business.things_todo[key][0]+'"></li>'+
                                //         '<li><input class="form-control" style="width:200px"  name="todo['+key+'][1]" value="'+business.things_todo[key][1]+'"></li>'+
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][2]" value="'+business.things_todo[key][2]+'"></li>'+
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][3]" value="'+business.things_todo[key][3]+'"></li>'+ 
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][4]" value="'+business.things_todo[key][4]+'"></li>'+
                                //         '</ul></div>');
                                //     }else{
                                //         $(td).append(' <button class="btn" style="background-color:'+business.backgroundColor[key]+'; font-weight:bold; color:white; width:200px; margin-bottom: 8px;" type="button" data-toggle="collapse" data-target="#collapseB'+business.labels[key]+'" aria-expanded="false" aria-controls="collapseExample">5 Things To Do @ '+business.labels[key]+'</button>'+
                                //         '<div class="collapse things-todo"  id="collapseB'+business.labels[key]+'" style="background-color:gray; padding: 4px 4px 4px 8px; border-radius:8px;"><ul id="business-things-todo" class=""  data-wheel="business" style="padding-bottom: 0px!important">' +
                                //         '<li> <input class="form-control" style="width:200px" name="todo['+key+'][0]" value=""></li>'+
                                //         '<li><input class="form-control" style="width:200px"  name="todo['+key+'][1]" value=""></li>'+
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][2]" value=""></li>'+
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][3]" value=""></li>'+ 
                                //         '<li><input class="form-control" style="width:200px" name="todo['+key+'][4]" value=""></li>'+
                                //         '</ul></div>');
                                //     }

                                // }
                                // if(arrHead[c] == "Goals"){
                                //     var ele = document.createElement('span');
								// 	ele.style.fontWeight = 'bold';
                                //     ele.innerText = business.labels[key];
                                //     td.appendChild(ele);

                                //     var ele = document.createElement('input');
								// 	ele.setAttribute('type', 'hidden');
								// 	ele.setAttribute('value',business.labels[key]);
								// 	// ele.setAttribute('index', (life.data.length - key));
								// 	ele.setAttribute('index', key);
								// 	ele.setAttribute('class', `label form-control`);
								// 	td.appendChild(ele);

                                // }
								
							}
						}
				})
				
		}else{
            console.log('me');
        }

	}
  
    // var pieVal = 0;
    // var pieVal2 = 0;
 /*   document.getElementById("color").addEventListener('change', function() {
        pieVal = document.getElementById("color").value;
    });

    document.getElementById("color2").addEventListener('change', function() {
       
    });*/


   
</script>

                                    <!-- start another script here -->

<script>
    // ARRAY FOR HEADER.
  

    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
  

    // ADD A NEW ROW TO THE TABLE.s
    function addRowBusiness() {

		
		jQuery("input#addRow2").prop('disabled', true);
       var color = get_random_color();
	   
	   business = add_todo_list_business(color);
       var index = add_polar2(business , "business" , color );

		
		
	
        var empTab = document.getElementById('empTable2').getElementsByTagName('tbody')[0];

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
       // tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
                // ADD A BUTTON.
                var button = document.createElement('input');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
                button.setAttribute('index', index);
                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('class', 'removeRow_business btn');
				button.style.backgroundColor = color;
                td.appendChild(button);
            }
            else {
                // CREATE AND ADD TEXTBOX IN EACH CELL.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', arrHead[c] == "Value"? 99 : "Group");
                ele.setAttribute('index', index);
                ele.setAttribute('class', `${arrHead[c]} form-control`);
                td.appendChild(ele);
            }
        }
		
		
	
		
		
		
    }

	
	function add_todo_list_business(color = "red"){
		
			
				$rowid =  jQuery("table#empTable2 tbody input.label").length;
                $style = "background:"+color;
                $color = "color:"+color;
			

			
				// render todo list 
				// jQuery("div.things-todo #business-things-todo").append('<div><ol id="business-id-'+$rowid+'" class="things-todo numOl" index="'+$rowid+'" data-wheel="business"><h4 style="'+$style+'" class="todo-title">Group</h4><li><input name="todo['+$rowid+'][0]" value=""></li><li><input name="todo['+$rowid+'][1]" value=""></li><li><input name="todo['+$rowid+'][2]" value=""></li><li><input name="todo['+$rowid+'][3]" value=""></li><li><input name="todo['+$rowid+'][4]" value=""></li></ol></div>');
				// jQuery("div.things-todo #business-things-todo").append('<ol id="business-id-'+$rowid+'" class="things-todo numOl" index="'+$rowid+'" data-wheel="business"><h4 style="'+$style+'" class="todo-title">Group</h4><div class="outerWrapper" style="margin-bottom:8px;"><div class="innerWrapper" style="display:flex"><span class="todo-num">1.</span><input class="form-control" style="width:350px; margin-left:8px;" name="todo['+$rowid+'][0]" value=""></div></div><div class="outerWrapper" style="margin-bottom:8px;"><div class="innerWrapper" style="display:flex"><span class="todo-num">2.</span><input class="form-control" style="width:350px; margin-left:8px;" name="todo['+$rowid+'][1]" value=""></div></div><div class="outerWrapper" style="margin-bottom:8px;"><div class="innerWrapper" style="display:flex"><span class="todo-num">3.</span><input class="form-control" style="width:350px; margin-left:8px;" name="todo['+$rowid+'][2]" value=""></div></div><div class="outerWrapper" style="margin-bottom:8px;"><div class="innerWrapper" style="display:flex"><span class="todo-num">4.</span><input class="form-control" style="width:350px; margin-left:8px;" name="todo['+$rowid+'][3]" value=""></div></div><div class="outerWrapper" style="margin-bottom:8px;"><div class="innerWrapper" style="display:flex"><span class="todo-num">5.</span><input class="form-control" style="width:350px; margin-left:8px;" name="todo['+$rowid+'][4]" value=""></div></div></ol>');
                
				jQuery("div.things-todo #business-things-todo").append('<ol id="business-id-'+$rowid+'" class="things-todo numOl" index="'+$rowid+'" data-wheel="business"><h4 style="'+$style+';border-radius:8px;" class="todo-title text-center">Group</h4><li style="'+$color+'"><input class="form-control" name="todo['+$rowid+'][0]" value=""></li><li style="'+$color+'"><input class="form-control" name="todo['+$rowid+'][1]" value=""></li><li style="'+$color+'"><input class="form-control" name="todo['+$rowid+'][2]" value=""></li><li style="'+$color+'"><input class="form-control" name="todo['+$rowid+'][3]" value=""></li><li style="'+$color+'"><input class="form-control" name="todo['+$rowid+'][4]" value=""></li></ol>');
				business["things_todo"] = jQuery("div.things-todo #business-things-todo input").serializeArray(); 
                console.log(business);
				
				return business;
	}
	
    function add_polar2(data , title , color = "red"){
		
		if(data.data === undefined ){
			data.data = [];
			data.labels = [];
			data.backgroundColor = [];
		}
		 var index =  data.data.push(100);
				data.labels.push("Group");
				data.backgroundColor.push(color);
		
		if(title == "business"){
			
				var config2 = {
						data: {
							datasets: [{
								data: data.data,
								backgroundColor:data.backgroundColor,
								label: title // for legend 
							}],
							labels:data.labels
						},
						options: {
							responsive: true,
							legend: {
								position: 'bottom',
							},
							title: {
								display: true,
								text: 'Wheel of ' + title
							},
							scale: {
								ticks: {
									beginAtZero: true
								},
								reverse: false
							},
							animation: {
								animateRotate: false,
								animateScale: true
							}
						}
					};


				var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
				var backgroundColorSerialized = JSON.stringify(config2.data.datasets[0].backgroundColor);
				var labelsSerialized = JSON.stringify(config2.data.labels);

				var dataExtracted = JSON.parse(dataSerialized);
				var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
				var labelsExtracted = JSON.parse(labelsSerialized);

				
			
				
				
				
				

			console.log(config2.data.datasets[0].data.length);
				jQuery.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"business" , 'things_todo' : business["things_todo"] },
							success: function(data){
								console.log(data);
								
								if(config2.data.datasets[0].data.length == 1){
									  var ctx2 = document.getElementById('chart-area2').getContext("2d");
									window.myPolarArea2 = Chart.PolarArea(ctx2, config2);
								}
								else{ 
									window.myPolarArea2.update();
								}
								jQuery("input#addRow2").prop('disabled', false);
								
								reIndexCount(jQuery("table#empTable2 tbody tr"));
									reIndexCountThingstodo(jQuery("div#business-things-todo .things-todo"));
							}
						});
		}
		/* if(title == "Business"){
			
			  
				var config2 = {
						data: {
							datasets: [{
								data: data.data,
								backgroundColor:data.backgroundColor,
								label: title // for legend 
							}],
							labels:data.labels
						},
						options: {
							responsive: true,
							legend: {
								position: 'bottom',
							},
							title: {
								display: true,
								text: 'Wheel of ' + title
							},
							scale: {
								ticks: {
									beginAtZero: true
								},
								reverse: false
							},
							animation: {
								animateRotate: false,
								animateScale: true
							}
						}
					};


				var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
				var backgroundColorSerialized = JSON.stringify(config2.data.datasets[0].backgroundColor);
				var labelsSerialized = JSON.stringify(config2.data.labels);

				var dataExtracted = JSON.parse(dataSerialized);
				var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
				var labelsExtracted = JSON.parse(labelsSerialized);


			
				jQuery.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"business"},
							success: function(data){
								console.log(data);
								
								
								
								if(config2.data.datasets[0].data.length == 1){
									  var ctx2 = document.getElementById('chart-area22').getContext("2d");
									window.myPolarArea2_2 = Chart.PolarArea(ctx2, config2);
								}
								else{ 
									window.myPolarArea2_2.update();
								}
								
								reIndexCount(jQuery("table#empTable22 tbody tr"));
									
							}
						});
		} */
       


        // window.myPolarArea2.update();

        return index - 1;
    }
	
	
	// Recalculate the count of index attr on add and remove
	function reIndexCount(elem){
		elem.each(function(index){
			 var selectindex = jQuery(this).find("[index]");
			console.log(( elem.length - index ));
			   // selectindex.attr("index" ,( elem.length - index ))
			   selectindex.attr("index" ,index)
		})
	}
	function reIndexCountThingstodo(elem){
		elem.each(function(index){
		
			
			   // selectindex.attr("index" ,( elem.length - index ))
			   jQuery(this).attr("index" ,index)
			   var parent_index =   index;       
			   jQuery(this).find("input").each(function(index){


				   // selectindex.attr("index" ,( elem.length - index ))
				   jQuery(this).attr("name" ,"todo["+parent_index+"]["+index+"]");

					
				})
						
		})
	}
    function get_random_color() {
        var o = Math.round, r = Math.random, s = 255;
         return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + "0.5   " + ')';
    }

    // update ROW label.

    // jQuery("body").on("click" , ".label" , function(){
    //     var rowjQuery = jQuery(this).closest("tr");
    //     var index  =(rowjQuery[0].rowIndex - 1);


    // })


    jQuery("body").on("change" , "#empTable2 .Value" , function(event){
            if (event.target.value <= 100) {

                var rowjQuery = jQuery(this).closest("tr");

               var label = rowjQuery.find(".label").val();

               console.log( );
                var index  = jQuery(this).attr("index");
               
                config2.data.datasets[0].data[index] = event.target.value;
                config2.data.labels[index] = label;
                var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
                var backgroundColorSerialized = JSON.stringify(business.backgroundColor);
                var labelsSerialized = JSON.stringify(config2.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


				business["things_todo"] = jQuery("div.things-todo #business-things-todo input").serializeArray(); 
                jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"business" , 'things_todo' : business["things_todo"]},
                            success: function(data){
                                console.log(data);
                                window.myPolarArea2.update();
								
								
                            }
                        });

            
            
            
            }
        });








/// Update label row

jQuery("body").on("change" , "#empTable2 .label" , function(event){
                var rowjQuery = jQuery(this).closest("tr");

               var value = rowjQuery.find(".Value").val();
               var labelvalue =  event.target.value;

               console.log( value);
                // var index  =(rowjQuery[0].rowIndex - 1);
                var index  = jQuery(this).attr("index");
               
                config2.data.datasets[0].data[index] = value;
                config2.data.labels[index] = event.target.value;
                var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
                var backgroundColorSerialized = JSON.stringify(business.backgroundColor);
                var labelsSerialized = JSON.stringify(config2.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


            console.log(index);
				business["things_todo"] = jQuery("div.things-todo #business-things-todo input").serializeArray(); 
                //window.myPolarArea2.update();
                jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"business" , 'things_todo' : business["things_todo"] },
                            success: function(data){
                                console.log(data);
                                window.myPolarArea2.update();
                                // render on load
								jQuery("div#business-things-todo").find("ol[index="+index+"] h4.todo-title").html(labelvalue);
                            }
                        });

            
            
            
            
        });

    // DELETE TABLE ROW.


    jQuery("body").on("click" , ".removeRow_business" , function(){
            
        // var empTab = document.getElementById('empTable2');
        // empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.


        var rowJavascript = this.parentNode.parentNode;
            var rowjQuery = jQuery(this).closest("tr");
       //   alert("JavaScript Row Index : " + (rowJavascript.rowIndex - 1) + "\njQuery Row Index : " + (rowjQuery[0].rowIndex - 1));
      
		var thisclick = jQuery(this);

     
		jQuery(".removeRow_business").prop('disabled', true);
        // var index  =(rowjQuery[0].rowIndex - 1);
        var index  =jQuery(this).attr("index");
        console.log(index );

		 
		   business.data.splice(index , 1 );
          business.backgroundColor.splice(index ,1 );
          business.labels.splice(index , 1 );
		  
		 jQuery("div.things-todo #business-things-todo .things-todo[index='"+index+"']").remove();
		  reIndexCountThingstodo(jQuery("div#business-things-todo .things-todo"));
        var config2 = {
                data: {
                    datasets: [{
                        data: business.data,
                        backgroundColor:business.backgroundColor,
                        label: "business" // for legend 
                    }],
                    labels:business.labels
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Wheel of business' 
                    },
                    scale: {
                        ticks: {
                            beginAtZero: true
                        },
                        reverse: false
                    },
                    animation: {
                        animateRotate: false,
                        animateScale: true
                    }
                }
            };
            console.log(config2);
			
		 var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
                var backgroundColorSerialized = JSON.stringify(config2.data.datasets[0].backgroundColor);
                var labelsSerialized = JSON.stringify(config2.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


            
		business["things_todo"] = jQuery("div.things-todo #business-things-todo input").serializeArray(); 
                //
				
				
                 jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"business"  , 'things_todo' : business["things_todo"]},
                            success: function(data){
                                 window.myPolarArea2.update();
								thisclick.parents("tr").remove();
								jQuery(".removeRow_business").prop('disabled', false);
								reIndexCount(jQuery("table#empTable2 tbody tr"));
								reIndexCountThingstodo(jQuery("div#business-things-todo .things-todo"));
                            }
                        });
			 
       

    })
</script>