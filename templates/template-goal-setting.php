
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/qs/dist/qs.js"></script>

<!--  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style scoped>
/* modal */

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  /* padding-top: 100px; Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  /* background-color: rgb(0,0,0); Fallback color */
  /* background-color: rgba(0,0,0,0.4); Black w/ opacity */
}
.modal-show{
    display: flex !important;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* modal */

#goal-setting{
 background-color:#ffffff;
 border-radius: 18px;
 padding: 16px;
 display:flex;
 flex-flow:column;
 justify-content:center;
 align-items:center;
 box-shadow:  20px 20px 60px #d9d9d9, 
             -20px -20px 60px #ffffff;

}


.wrapper {
  display: grid;
  grid-template-columns: 1fr  1fr;
  width: 100%;
  grid-gap:24px;
  margin-bottom: 38px;
  /* border: 1px solid red; */
}

@media screen and (min-width: 500px) {
  .wrapper {
    grid-template-columns: 1fr 1fr;
  }
}

@media screen and (min-width: 800px) {
  .wrapper {
    grid-template-columns: 1fr 1fr;
  }
}

/* check box */
/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 1.95em;
  cursor: pointer;
}

/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0; top: 0;
  width: 1.25em; height: 1.25em;
  border: 2px solid #ccc;
  background: #fff;
  border-radius: 4px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '\2713\0020';
  position: absolute;
  top: .15em; left: .22em;
  font-size: 1.3em;
  line-height: 0.8;
  color: #09ad7e;
  transition: all .2s;
  font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="checkbox"]:disabled:checked + label:after {
  color: #999;
}
[type="checkbox"]:disabled + label {
  color: #aaa;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 2px dotted blue;
}

/* hover style just for information */
label:hover:before {
  border: 2px solid #4778d9!important;
}
.hide-me{
    display:none;
}

/* check box */
</style>


<div id="goal-setting">
    
    <div v-if="isGoalEmpty" class="text-center">
      <h1>Empty</h1>
      <span>Click the button below to add your Goal.</span>
    </div>
    <div v-else class="wrapper">

    <!-- style="'background-color :'+i.color"  -->
      <!-- <div> -->
        <div  class="card" v-for="(i, index) in goals" v-bind:style="'box-shadow: 0 8px 6px -6px '+i.color+';'">
            <div class="card-header" id="headingOne" v-bind:style="'background-color:'+i.color">
                <span class="mb-0" style="font-weight:bold; color:white;font-size:24px;" > 
                    {{i.label}}  
                </span> 
            </div>
            <div class="card-body" v-bind:style="'border:2px solid '+i.color"> 
                <!-- checkboxes -->
                <div style="display: flex;padding: 8px;"  v-for="list in i.checkList">
                    <input type="checkbox" v-model="list.checked" v-on:click="updateWPdb" v-bind:id="list.item">
                    <label  v-bind:for="list.item">{{list.item}}</label>
                </div>
            </div>
        </div>
    
    
      <!-- <div> -->

    </div>
    <button id="myBtn" class="btn" style="background-color:#009f3c; color:white" v-on:click="toggleModal()">Add Goal</button>










    <div id="myModal" class="modal" v-bind:class="{'modal-show':showMe}" style="position : relative !important;">

    <div class="modal-content card" style="width: 100% !important; margin: 25px;" >
    
        <div class="card-header" id="headingOne" style="display: flex;align-items: center;justify-content: space-between;" >
            <div style="display:flex">
                
                <span class="mb-0" > 
                    Set Your Goal Here
                </span> 
            </div>
            <span class="close" v-on:click="toggleModal()">&times;</span>
        </div>
        <div class="card-body" > 
            <!-- checkboxes -->
            <div class="form-group" style="width:100%">

                <label for="goal-label">Goal Label</label>
                <input type="text" id="goal-label" class="form-control" style="font-size: 24px;" v-model="goalToAdd.label"  >
            </div>

            <hr style="margin: 18px;  box-shadow:  20px 20px 60px #d9d9d9,-20px -20px 60px #ffffff;">

            <div class="form-group" style="width:100%">

                <label for="goal-label">Check List</label>
                <input type="text" id="goal-label" class="form-control" style="margin-bottom:12px" v-for="iList in goalToAdd.checkList" v-model="iList.item" >
               
            </div>

            <button class="btn btn-success" v-on:click="addGoal">Add Goal</button>

        </div>
    </div>

    </div>
</div>






<script>

Vue.directive('rainbow', {
    bind(el, binding, vnode){
        el.style.backgroundColor = binding.value;
    }
})

var goal = new Vue({
    el : "#goal-setting",
    data: {
        test : 'Goal',
        isGoalEmpty : false,
        colors : [],
        col: "red",
        showMe: false,
        goalToAdd: {
            label : '',
            checkList: [
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false},
                {item: '', checked : false}
            ]
        },
        goals : [
            // {
            // label : 'Travel',
            // checkList : [
            //     // {item: 'Lorem', checked : false},
            //     // {item: 'Ipsum', checked : false},
            //     // {item: 'Dolor', checked : false},
            //     // {item: 'Sit', checked : false},
            //     // {item: 'Amet', checked : false},
            //     ]
            // }
    ]
    },
    methods : {
        toggleModal : function(){
            console.log('asd');
            this.showMe = !this.showMe;
        },
        updateWPdb : function(){
            const url = `${polar_AjaxAdmin.ajaxurl}?action=save_goal`
            const passMe = this.goals
            console.log(passMe)
            
            // console.log(this.goals)
            // const passMe = JSON.stringify(this.goals)

            axios.post(url, Qs.stringify( {"action" : "save_goal", data : passMe, "class": "goal"} ))
            .then ((res)=> console.log (res))
            .catch ((error)=> console.log(error))
        },
        addGoal : function(){
            if(this.goalToAdd.label.length > 0){
                // console.log('filled')

                // console.log(this.goalToAdd.checkList);

                const test = this.goalToAdd.checkList;
                // const asdasdasd = test.map((list) => {
                //     console.log(list)
                //     return {item: 'asd', checked : false}
                // })

                const removedEmpty = test.filter((a) => a.item.length > 0);
                this.goalToAdd.checkList = removedEmpty;
                console.log(this.goalToAdd)
                
                
                this.goals = [...this.goals, this.goalToAdd];

                this.goalToAdd = {label : '', checkList: [{item: '', checked : false}, {item: '', checked : false}, {item: '', checked : false}, {item: '', checked : false}, {item: '', checked : false},]}
                this.showMe = !this.showMe;
                this.isGoalEmpty = false

                const url = `${polar_AjaxAdmin.ajaxurl}?action=save_goal`
                const passMe = this.goals
                axios.post(url, Qs.stringify( {"action" : "save_goal", data : passMe, "class": "goal"} ))
                .then ((res)=> console.log (res))
                .catch ((error)=> console.log(error))
            }else{
                // console.log('nope')
                this.showMe = !this.showMe;
                this.isGoalEmpty = false
            }
            
        }
    },
    mounted(){
        if(goalsetting.data){

            // normalizing the fetched data.
            
            const fetched = goalsetting.data;
            console.log(fetched);
            const normalized = fetched.map((item) => {
                const holder = {label: item.label, checkList : []};
                
                
                const normalin = item.checkList.map(check => {
                    
                    // string to boolean
                    return {item:check.item, checked:JSON.parse(check.checked)}
                })

                holder.checkList = normalin;
                return holder;
            })
            // this.goals = normalized;

            axios.get("https://raw.githubusercontent.com/Margaret2/pantone-colors/master/pantone-colors.json").then((response) => {
                // for(i = 0; i < this.goals.length; i++){
                //     var randNum = Math.ceil(Math.random() * response.data.values.length);
                //     console.log(randNum);
                //     console.log(response.data.values[randNum])
                //     const randColor = response.data.values[randNum];
                //     this.colors = [...this.colors, randColor]
                // }



                const normalized = fetched.map((item) => {
                const holder = {label: item.label, checkList : []};
                var randNum = Math.ceil(Math.random() * response.data.values.length);
                const randColor = response.data.values[randNum];
                
                    
                    const normalin = item.checkList.map(check => {
                        
                        // string to boolean
                        return {item:check.item, checked:JSON.parse(check.checked)}
                    })

                    holder.checkList = normalin;
                    holder['color'] = randColor;
                    return holder;
                })
                this.goals = normalized;
                if(this.goals.length > 0) {
                  this.isGoalEmpty = false
                };






                // const qwerty = this.goals.map(item => {
                    // var randNum = Math.ceil(Math.random() * response.data.values.length);
                    // const randColor = response.data.values[randNum];
                //     item['color'] = randColor;
                //     return item;
                // })


                // console.log(qwerty);

            }).catch((error) => console.log(error))
        }

    }
})




</script>
