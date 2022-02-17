<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/qs/dist/qs.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
/* spinner */
.loader {
  color: #ff8000;
  font-size: 90px;
  text-indent: -9999em;
  overflow: hidden;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  margin: 72px auto;
  position: relative;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
  animation: load6 1.7s infinite ease, round 1.7s infinite ease;
}
@-webkit-keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@-webkit-keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
/* spinner */
#health-wellbeing{
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


.month-container {
  display: grid;
  grid-template-columns: 1fr ;
  grid-gap: 12px;
  margin-bottom: 38px;
  width: 100%;
}

@media screen and (min-width: 500px) {
  .month-container {
    grid-template-columns: 1fr 1fr;
  }
  .month-btn{
    padding: 16px 54px;
  }
}

@media screen and (min-width: 800px) {
  .month-container {
    grid-template-columns: 1fr 1fr ;
  }
  .month-btn{
    padding: 16px 54px;
  }
}
.month-btn{
    border:none;
    background: #ba8c47;
    box-shadow: inset 8px 8px 7px #806131, 
            inset -8px -8px 7px #f4b75d;
    padding:12px 14px;
    color: black;
    font-size: 24px;
    font-weight: 700;
    border-radius: 12px;
    cursor:pointer;
    width: 84%;
}
.month-btn:active{
    box-shadow: inset 13px 13px 26px #775a2d, 
            inset -13px -13px 26px #fdbe61;
    color: white;
}


.list-enter,
.list-leave-to {
  visibility: hidden;
  height: 0;
  margin: 0;
  padding: 0;
  opacity: 0;
}

.list-enter-active,
.list-leave-active {
  transition: all 0.5s;
}

</style>


<div id="health-wellbeing">
    <img v-bind:src="heartSrc" />


    <div v-if="loading" class="loader">Loading...</div>
    <transition v-else name="list">
        <div v-show="selectedMonth" style="width: 100%;" >
            <h3>
                <i v-on:click="selectMonth(this.selectedMonth)" class="large material-icons" style="cursor:pointer;">arrow_back</i> 
                {{selectedMonth}}
            </h3>
            <div class="month-container">
                <div class="" style="display: flex;flex-flow: column;align-items: center;justify-content: center;">
                    <h2>Articles</h2>
                    <ul>
                        <li>asd</li>
                        <li>asd</li>
                        <li>asd</li>
                        <li>asd</li>
                    </ul>
                </div>
                <div style="display: flex;flex-flow: column;align-items: center;justify-content: center;">
                <h2>PDF</h2>
                <ul>
                    <li>asd</li>
                    <li>asd</li>
                    <li>asd</li>
                    <li>asd</li>
                </ul>
                </div>
            </div>
        </div>
    </transition>
    <transition name="list">
        <div v-show="!selectedMonth" class="month-container" style="margin-top:12px;">
            <div v-for="(month, index) in months" style="display:flex; justify-content:center; align-items:center;"><button v-on:click="selectMonth(month)" class="month-btn">{{months[index]}}</button></div>
        </div>
    </transition>
</div>






<script>

var healthWellbeing = new Vue({
    el : "#health-wellbeing",
    data : {
        heartSrc : "",
        months : ['January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'],
        selectedMonth : "",
        pdfURL : "",
        loading : false,
    },
    methods:{
        selectMonth : function(month){
            const url = `${polar_AjaxAdmin.ajaxurl}?action=save_goal`
            if(this.selectedMonth === month) {
                this.selectedMonth = ""
            }else{
                this.selectedMonth = month;
                console.log(url)
                // axios.post()
            }
            // console.log("u working", this.selectedMonth);
        },
    },
    created(){
        this.heartSrc = `${window.location.origin}/wp-content/uploads/2020/02/Health.png`;
        // console.log(window.location);
    }
})

</script>