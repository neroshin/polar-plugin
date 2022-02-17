<?php 
        global $wpdb;
        $user = wp_get_current_user();
        $userID = $user->ID;
        //print_r($user);
    ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>


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
    /* width: 70px !important; */
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

ul{
    padding-left:0px !important;
}

li{
    list-style:none;
}
.form-control{
    margin-bottom:4px;
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
    </style>

<!-- <canvas id="chart-area"></canvas> -->

<div class="chart-container" style="position: relative; width: 100%; float:left; display: flex; flex-flow: column;">

    <canvas id="chart-area" height="450" width="600"></canvas>
    
    
 
    <!-- <input type="button" class="btn btn-primary" id="addRow" value="Add New Row" onclick="addRowlife()" style="margin: 12px 4px;" /> -->
   

   <h4 class="text-center">FIRST 5 THINGS TO DO IN LIFE</h4>


   <div id="cont">
   <table id="empTable" class="" >
    <thead>
        <tr>
                <th class="fitwidth" scope="row"></th>
        </tr>
    </thead>

        <tbody>
            
        </tbody>

    </table>
    


  <!-- <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h2>
      <input type="number" class="form-control"/>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       
            <ul id="life-things-todo" class=""  data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important">
                <li> <input class="form-control"  name="todo['+key+'][0]" value=""></li>
                <li><input class="form-control"   name="todo['+key+'][1]" value=""></li>
                <li><input class="form-control"  name="todo['+key+'][2]" value=""></li>
                <li><input class="form-control"  name="todo['+key+'][3]" value=""></li> 
                <li><input class="form-control"  name="todo['+key+'][4]" value=""></li>
            </ul>
      </div>
    </div>
  </div> -->
  

	</div>

</div>


 <!--THE CONTAINER WHERE WE'll ADD THE DYNAMIC TABLE-->





    
<script>

   // ARRAY FOR HEADER.
    var arrHead = new Array();
     //   arrHead = ['', 'Value', 'label'];   //SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.
        // arrHead = ['Goals', 'Value', 'Todo'];   //SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.
        arrHead = [''];   //SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    $(document).ready(function() {
       // your init code
       var ctx1 = document.getElementById('chart-area').getContext("2d");
        window.myPolarArea = Chart.PolarArea(ctx1, config1);

        
        populate_table();
});
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
 
    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    /*  datasets: [{
                life.data,
                life.backgroundColor,
                label: 'My dataset' // for legend 
            }],
            life.labels */
    var config1 = {
        data: {
            datasets: [{
                data: life.data,
                backgroundColor:life.backgroundColor,
                label: 'life' // for legend 
            }],
            labels:life.labels
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Wheel of life',
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
         var ctx1 = document.getElementById('chart-area').getContext("2d");
        window.myPolarArea = Chart.PolarArea(ctx1, config1);

            
        populate_table();
    };*/


    // margin-bottom: 4px;
    // border: 2px solid red;
    // border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;
      
	// function populate_table(){
    //     console.log(life.data);
    //     if( life.data !== undefined && life.data.length != 0){


    //         jQuery.each(life.data, function(key , value){
    //                 var contain = document.getElementById('cont');
    //                 // var ele = document.createElement('')
    //                 $(contain).append(` <div class="card-header" id="headingOne" style="display:flex; justify-content:space-between; background-color:${business.backgroundColor[key]}">
    //                                         <span class="mb-0" >
    //                                             <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${life.labels[key]}" aria-expanded="true" aria-controls="collapse${life.labels[key]}" style="font-weight:bold;color:white;">
    //                                             ${life.labels[key]}<i class="medium material-icons">arrow_drop_down</i>
    //                                             </button>
    //                                         </span>
    //                                         <input type="number" class="form-control Value" value="${value}"/>
    //                                     </div>
    //                                     <div class="card-body" style="border: 2px solid ${business.backgroundColor[key]}; margin-bottom: 4px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; padding: 0px !important">
    //                                     <div id="collapse${life.labels[key]}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="padding: 12px;">
    //                                             <ul id="life-things-todo" class=""  data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important">
    //                                                 <li> <input class="form-control"  name="todo['+key+'][0]" value=""></li>
    //                                                 <li><input class="form-control"   name="todo['+key+'][1]" value=""></li>
    //                                                 <li><input class="form-control"  name="todo['+key+'][2]" value=""></li>
    //                                                 <li><input class="form-control"  name="todo['+key+'][3]" value=""></li> 
    //                                                 <li><input class="form-control"  name="todo['+key+'][4]" value=""></li>
    //                                             </ul>
    //                                         </div>
    //                                     </div>
    //                                 </div>`);

	// 			})
				
	// 	}else{
    //     console.log('me');
    // }

    // }
   


    function populate_table(){
		if( life.data !== undefined && life.data.length != 0){
				jQuery.each(life.data , function(key , value){
					 var empTab = document.getElementById('empTable').getElementsByTagName('tbody')[0];
						
						var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
						var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
					   // tr = empTab.insertRow(rowCnt);

						for (var c = 0; c < arrHead.length; c++) {
							var td = document.createElement('td');          // TABLE DEFINITION.
							td = tr.insertCell(c);

							// if (c == 0) {           // FIRST COLUMN.
							if (false) {           // FIRST COLUMN.
								// ADD A BUTTON.
								
								
								
  
								
							}
							else {
                                // $(td).append('<div class="card-header" id="headingOne" style="display:flex; justify-content:space-between; background-color:'+life.backgroundColor[key]+';"> <span class="mb-0" > <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'+life.labels[key]+'" aria-expanded="true" aria-controls="collapse'+life.labels[key]+'" style="font-weight:bold;color:white;"> '+life.labels[key]+'<i class="medium material-icons"></i> </button> <input index="'+key+'" type="hidden" class="label form-control" value="'+life.labels[key]+'"/>  </span> <input index="'+key+'" type="number" class="form-control Value" value="'+value+'"/> </div><div class="card-body" style="border: 2px solid ${life.backgroundColor[key]}; margin-bottom: 4px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; padding: 0px !important"> <div id="collapse'+life.labels[key]+'" class="collapse things-todo" aria-labelledby="headingOne" data-parent="#accordionExample" style="padding: 12px;"> <ul id="life-things-todo" class="" data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important"> <li> <input class="form-control" name="todo['+key+'][0]" value="'+(typeof life.things_todo === "undefined"? "" : life.things_todo[key][0])+'"></li><li><input class="form-control" name="todo['+key+'][1]" value="'+(typeof life.things_todo === "undefined"? "" : life.things_todo[key][1])+'"></li><li><input class="form-control" name="todo['+key+'][2]" value="'+(typeof life.things_todo === "undefined"? "" : life.things_todo[key][2])+'"></li><li><input class="form-control" name="todo['+key+'][3]" value="'+(typeof life.things_todo === "undefined"? "" : life.things_todo[key][3])+'"></li><li><input class="form-control" name="todo['+key+'][4]" value="'+(typeof life.things_todo === "undefined"? "" : life.things_todo[key][4])+'"></li></ul> </div></div></div>');
                                $(td).append(`
                                <div class="card-header" id="headingOne" style="display:flex; justify-content:space-between; background-color:${life.backgroundColor[key]};">
                                <div style="display: flex;">
                                    <span class="mb-0" > 
                                        <input index="${key}" type="text" class="form-control label" style="height:38px; width: 100% !important;" value="${life.labels[key]}"/>  
                                    </span> 
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${life.labels[key]}" aria-expanded="true" aria-controls="collapse${life.labels[key]}" style="font-weight:bold;color:white;">
                                         
                                         <i class="medium material-icons">arrow_drop_down</i> 
                                        </button> 
                                </div>
                                    <input index="${key}" type="number" class="form-control Value" value="${value}"/> 
                                </div>
                                <div class="card-body" style="border: 2px solid ${life.backgroundColor[key]}; margin-bottom: 4px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; padding: 0px !important"> 
                                    <div id="collapse${life.labels[key]}" class="collapse things-todo" aria-labelledby="headingOne" data-parent="#accordionExample" style="padding: 12px;"> 
                                        <ul id="life-things-todo" class="" data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important"> 
                                            <li> <input class="form-control" name="todo[${key}][0]" value="${(typeof life.things_todo === "undefined"? "" : life.things_todo[key][0])}"></li>
                                            <li><input class="form-control" name="todo[${key}][1]" value="${(typeof life.things_todo === "undefined"? "" : life.things_todo[key][1])}"></li>
                                            <li><input class="form-control" name="todo[${key}][2]" value="${(typeof life.things_todo === "undefined"? "" : life.things_todo[key][2])}"></li>
                                            <li><input class="form-control" name="todo[${key}][3]" value="${(typeof life.things_todo === "undefined"? "" : life.things_todo[key][3])}"></li>
                                            <li><input class="form-control" name="todo[${key}][4]" value="${(typeof life.things_todo === "undefined"? "" : life.things_todo[key][4])}"></li>
                                        </ul> 
                                        <button class="btn life-save" style="background-color:${life.backgroundColor[key]}; font-weight:bold; color:white; width:100%;">Save</button>
                                    </div>
                                </div>`);
							}
						} 
				})
				
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
 
    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
  

    // ADD A NEW ROW TO THE TABLE.s
    function addRowlife() {


		
       var color = get_random_color();
	   
	   life = add_todo_list_life(color);
	   
       var index = add_polar(life , "life" , color );

		
		
	
        var empTab = document.getElementById('empTable').getElementsByTagName('tbody')[0];

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
                button.setAttribute('class', 'removeRow_life btn');
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

	
	
	// function add_todo_list_life(color = "red"){
		
			
	// 			$rowid =  jQuery("table#empTable tbody input.label").length;
	// 			$style = "background:"+color;
    //             $color = "color:"+color;

	// 			jQuery("div.things-todo #life-things-todo").append('<ol id="life-id-'+$rowid+'" class="things-todo" index="'+$rowid+'" data-wheel="life"><h4 style="'+$style+'" class="todo-title text-center">Group</h4><li><input class="form-control" style="width:350px" name="todo['+$rowid+'][0]" value=""></li><li><input class="form-control" style="width:350px" name="todo['+$rowid+'][1]" value=""></li><li><input class="form-control" style="width:350px" name="todo['+$rowid+'][2]" value=""></li><li><input class="form-control" style="width:350px" name="todo['+$rowid+'][3]" value=""></li><li><input class="form-control" style="width:350px" name="todo['+$rowid+'][4]" value=""></li></ol>');
				
	// 			life["things_todo"] = jQuery("div.things-todo #life-things-todo input").serializeArray(); 

	// 			return life;
	// }
	
    function add_polar(data , title , color = "red"){
		
		if(data.data === undefined ){
			data.data = [];
			data.labels = [];
			data.backgroundColor = [];
		}
		 var index =  data.data.push(100);
				data.labels.push("Group");
				data.backgroundColor.push(color);
		
		if(title == "life"){
			
				var config1 = {
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


				var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
				var backgroundColorSerialized = JSON.stringify(config1.data.datasets[0].backgroundColor);
				var labelsSerialized = JSON.stringify(config1.data.labels);

				var dataExtracted = JSON.parse(dataSerialized);
				var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
				var labelsExtracted = JSON.parse(labelsSerialized);


			console.log(config1.data.datasets[0].data.length);
				jQuery.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"life" , 'things_todo' : life["things_todo"]},
							success: function(data){
								console.log(data);
								
								if(config1.data.datasets[0].data.length == 1){
									  var ctx1 = document.getElementById('chart-area').getContext("2d");
									window.myPolarArea = Chart.PolarArea(ctx1, config1);
								}
								else{ 
									window.myPolarArea.update();
								}
								
								
								reIndexCount(jQuery("table#empTable tbody tr"));
								
								reIndexCountThingstodo(jQuery("div#life-things-todo .things-todo"));
							}
						});
		}
		/* if(title == "life"){
			
			  
				var config1 = {
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


				var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
				var backgroundColorSerialized = JSON.stringify(config1.data.datasets[0].backgroundColor);
				var labelsSerialized = JSON.stringify(config1.data.labels);

				var dataExtracted = JSON.parse(dataSerialized);
				var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
				var labelsExtracted = JSON.parse(labelsSerialized);


			
				jQuery.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"life"},
							success: function(data){
								console.log(data);
								
								
								
								if(config1.data.datasets[0].data.length == 1){
									  var ctx1 = document.getElementById('chart-area').getContext("2d");
									window.myPolarArea = Chart.PolarArea(ctx1, config1);
								}
								else{ 
									window.myPolarArea.update();
								}
								
								reIndexCount(jQuery("table#empTable tbody tr"));
							}
						});
		} */
       


        // window.myPolarArea.update();

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
	
    function get_random_color() {
        var o = Math.round, r = Math.random, s = 255;
         return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + "0.5   " + ')';
    }

    // update ROW label.

    // jQuery("body").on("click" , ".label" , function(){
    //     var rowjQuery = jQuery(this).closest("tr");
    //     var index  =(rowjQuery[0].rowIndex - 1);


    // })


    jQuery("body").on("change" , "#empTable .Value" , function(event){
            if (event.target.value <= 100) {

                var rowjQuery = jQuery(this).closest("tr");

               var label = rowjQuery.find(".label").val();

               console.log( );
                var index  = jQuery(this).attr("index");
               
                config1.data.datasets[0].data[index] = event.target.value;
                config1.data.labels[index] = label;
                var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
                var backgroundColorSerialized = JSON.stringify(life.backgroundColor);
                var labelsSerialized = JSON.stringify(config1.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


            life["things_todo"] = jQuery("div.things-todo #life-things-todo input").serializeArray(); 
                jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"life" , 'things_todo' : life["things_todo"]},
                            success: function(data){
                                console.log(data);
                                window.myPolarArea.update();
                            }
                        });

            
            
            
            }
        });




/// Update label row

jQuery("body").on("change" , "#empTable .label" , function(event){
                var rowjQuery = jQuery(this).closest("tr");

               var value = rowjQuery.find(".Value").val();
               var labelvalue = event.target.value;

               console.log( value);
                // var index  =(rowjQuery[0].rowIndex - 1);
                var index  = jQuery(this).attr("index");
               
                config1.data.datasets[0].data[index] = value;
                config1.data.labels[index] = event.target.value;
                var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
               var backgroundColorSerialized = JSON.stringify(life.backgroundColor);
                var labelsSerialized = JSON.stringify(config1.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


            
				life["things_todo"] = jQuery("div.things-todo #life-things-todo input").serializeArray(); 
                //window.myPolarArea.update();
                jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"life" , 'things_todo' : life["things_todo"] },
                            success: function(data){
                                console.log(data);
                                window.myPolarArea.update();
								jQuery("div#life-things-todo").find("ol[index="+index+"] h4.todo-title").html(labelvalue);
                            }
                        });

            
            
            
            
        });

    // DELETE TABLE ROW.


    jQuery("body").on("click" , ".removeRow_life" , function(){
            
        // var empTab = document.getElementById('empTable');
        // empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.


        var rowJavascript = this.parentNode.parentNode;
            var rowjQuery = jQuery(this).closest("tr");
       //   alert("JavaScript Row Index : " + (rowJavascript.rowIndex - 1) + "\njQuery Row Index : " + (rowjQuery[0].rowIndex - 1));
      
		var thisclick = jQuery(this);

     
		jQuery(".removeRow_life").prop('disabled', true);
        // var index  =(rowjQuery[0].rowIndex - 1);
        var index  =jQuery(this).attr("index");
        console.log(index );

		 
		   life.data.splice(index , 1 );
          life.backgroundColor.splice(index ,1 );
          life.labels.splice(index , 1 );
		  
		  
		   jQuery("div.things-todo #life-things-todo .things-todo[index='"+index+"']").remove();
		  reIndexCountThingstodo(jQuery("div#life-things-todo .things-todo"));
		  
		  
        var config1 = {
                data: {
                    datasets: [{
                        data: life.data,
                        backgroundColor:life.backgroundColor,
                        label: "life" // for legend 
                    }],
                    labels:life.labels
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Wheel of life' 
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
            console.log(config1);
			
		 var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
                var backgroundColorSerialized = JSON.stringify(config1.data.datasets[0].backgroundColor);
                var labelsSerialized = JSON.stringify(config1.data.labels);

                var dataExtracted = JSON.parse(dataSerialized);
                var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
                var labelsExtracted = JSON.parse(labelsSerialized);


            
	life["things_todo"] = jQuery("div.things-todo #life-things-todo input").serializeArray(); 
                //
				
				
                 jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: {"action": "save_data_polar" , "data" : dataExtracted , "backgroundColor" : backgroundColorExtracted , "labels" : labelsExtracted ,  "selectedData": index ,  "class":"life"  , 'things_todo' : life["things_todo"]},
                            success: function(data){
                                 window.myPolarArea.update();
								thisclick.parents("tr").remove();
								jQuery(".removeRow_life").prop('disabled', false);
								reIndexCount(jQuery("table#empTable tbody tr"));
									reIndexCountThingstodo(jQuery("div#life-things-todo .things-todo"));
                            }
                        });
			 
       

    })
</script>

