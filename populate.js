
// var empTab = document.getElementById('empTable').getElementsByTagName('tbody')[0];

// var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
// var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
// // tr = empTab.insertRow(rowCnt);

// for (var c = 0; c < arrHead.length; c++) {
//     var td = document.createElement('td');          // TABLE DEFINITION.
//     td = tr.insertCell(c);

//     // if (c == 0) {           // FIRST COLUMN.
//     if (false) {           // FIRST COLUMN.
//         // ADD A BUTTON.
//         /* var button = document.createElement('input');

//         // SET INPUT ATTRIBUTE.
//         button.setAttribute('type', 'button');
//         button.setAttribute('value', 'Remove');
//         // button.setAttribute('index', (life.data.length - key));
//         button.setAttribute('index', key);
//         // ADD THE BUTTON's 'onclick' EVENT.
//         button.setAttribute('class', 'removeRow_life btn');
//         button.style.backgroundColor = life.backgroundColor[key];
//         td.appendChild(button); */




//     }
//     else {

//         // console.log(arrHead[c]);
//         // CREATE AND ADD TEXTBOX IN EACH CELL.
//         if(arrHead[c] == "Value" ){
//             var ele = document.createElement('input');
//             ele.setAttribute('type', 'number');
//             ele.setAttribute('value',value);
//             ele.setAttribute('min',0);
//             ele.setAttribute('max',10);
//             // ele.setAttribute('index', (life.data.length - key));
//             ele.setAttribute('index',key);
//             ele.setAttribute('class', `${arrHead[c]} form-control text-center`);
//             ele.style.borderColor = life.backgroundColor[key];
//             ele.style.borderWidth = '2px';
//             td.appendChild(ele);
//         }
//         if(arrHead[c] == "Todo" ){


//             // background-color: gray; padding: 4px; display: flex; align-items: center; justify-content: center;
//             /* Custom code for Things Todo population */
//             if(life.things_todo){
//                 $(td).append(' <button class="btn" style="background-color:'+life.backgroundColor[key]+'; font-weight:bold; color:white; width:200px; margin-bottom: 8px;" type="button" data-toggle="collapse" data-target="#collapse'+life.labels[key]+'" aria-expanded="false" aria-controls="collapseExample">5 Things To Do @ '+life.labels[key]+'</button>'+
//                 '<div class="collapse things-todo"  id="collapse'+life.labels[key]+'" style="background-color:#ba8c47; padding: 4px 4px 4px 8px; border-radius:8px;"><ul id="life-things-todo" class=""  data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px; padding-left: 0px!important">' +
//                 '<li> <input class="form-control" style="width:200px" name="todo['+key+'][0]" value="'+life.things_todo[key][0]+'"></li>'+
//                 '<li><input class="form-control" style="width:200px"  name="todo['+key+'][1]" value="'+life.things_todo[key][1]+'"></li>'+
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][2]" value="'+life.things_todo[key][2]+'"></li>'+
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][3]" value="'+life.things_todo[key][3]+'"></li>'+ 
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][4]" value="'+life.things_todo[key][4]+'"></li>'+
//                 '</ul></div>');
//             }else{
//                 $(td).append(' <button class="btn" style="background-color:'+life.backgroundColor[key]+'; font-weight:bold; color:white; width:200px; margin-bottom: 8px;" type="button" data-toggle="collapse" data-target="#collapse'+life.labels[key]+'" aria-expanded="false" aria-controls="collapseExample">5 Things To Do @ '+life.labels[key]+'</button>'+
//                 '<div class="collapse things-todo"  id="collapse'+life.labels[key]+'" style="background-color:#ba8c47; padding: 4px 4px 4px 8px; border-radius:8px;"><ul id="life-things-todo" class=""  data-wheel="life" style="padding-bottom: 0px!important; margin-bottom: 0px">' +
//                 '<li> <input class="form-control" style="width:200px" name="todo['+key+'][0]" value=""></li>'+
//                 '<li><input class="form-control" style="width:200px"  name="todo['+key+'][1]" value=""></li>'+
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][2]" value=""></li>'+
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][3]" value=""></li>'+ 
//                 '<li><input class="form-control" style="width:200px" name="todo['+key+'][4]" value=""></li>'+
//                 '</ul></div>');
//             }


//         } 
//         if(arrHead[c] == "Goals" ){
//             //  var ele = document.createTextNode(life.labels[key]);
//             var ele = document.createElement('span');
//             ele.style.fontWeight = 'bold';
//             ele.innerText = life.labels[key];
//             //ele.setAttribute('for',life.labels[key]);

//             td.appendChild(ele);

//            var ele = document.createElement('input');
//             ele.setAttribute('type', 'hidden');
//             ele.setAttribute('value',life.labels[key]);
//             // ele.setAttribute('index', (life.data.length - key));
//             ele.setAttribute('index', key);
//             ele.setAttribute('class', `label form-control`);
//             td.appendChild(ele);
//         }

//     }
// }