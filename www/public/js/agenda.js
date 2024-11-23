document.addEventListener("DOMContentLoaded", function () {
    // Code to be executed when the DOM is ready
    //console.log(eventos_agenda);
  
    var arr_months = [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ];
  
    var today = new Date();
    var selected_month = today.getMonth();
    var selected_week = 1;
    var selected_year = today.getFullYear();
    var month_weeks = new Array();
    
    var btn_prev_month = document.querySelector("#prev-month");
    var btn_next_month = document.querySelector("#next-month");
  
    btn_prev_month.addEventListener("click", function (event) {
      if (selected_month<=0) {
          selected_year = selected_year - 1;
          selected_month = 11;
      }else{
          selected_month--;
      }
      render_month_ds();
      selected_week = 1;
      draw_week_days(selected_week);
      declare_clicks_week();
    });
  
    btn_next_month.addEventListener("click", function (event) {
      if (selected_month>=11) {
          selected_year = selected_year + 1;
          selected_month = 0;
      }else{
          selected_month++;
      }
      render_month_ds();
      selected_week = 1;
      draw_week_days(selected_week);
      declare_clicks_week();
    });
  
    render_month_ds();
    selected_week = find_week_by_date(today.getDate(), selected_month, selected_year);
    draw_week_days(selected_week);
    declare_clicks_week();
  
    function render_month_ds() {
      document.querySelector(".month-sp").innerText = arr_months[selected_month];
      document.querySelector(".year-sp").innerText = selected_year;
      //console.log(get_first_dayweek_of_the_month());
      draw_month_weeks_days();
    }
  
    function get_first_dayweek_of_the_month(){
      var first_date_of_the_month = new Date(selected_year, selected_month, 1);
      return first_date_of_the_month.getDay();
    }
  
    function draw_month_weeks_days(){
      month_weeks = new Array();
  
      var week = 1;
      var d_weeks_counter = 0;
      var last_date_month = selected_month >= 11 ? new Date(selected_year, selected_month, 31) : new Date(selected_year, selected_month+1, 0);
      var correction_last_week = last_date_month.getDay() == 0 ? 0 : 7-last_date_month.getDay();
      
      var correction_first_week = get_first_dayweek_of_the_month() == 0 ? 6 : get_first_dayweek_of_the_month()-1;
      
      var cap_tag = '';
  
      if (correction_first_week > 0) {
          var last_date_past_month = new Date(selected_year, selected_month, 0);
          day_correct = last_date_past_month.getDate()-(correction_first_week-1);
          
          for (let index = 0; index < correction_first_week; index++) {
              if (d_weeks_counter == 0) {
                  cap_tag += '<ul id="week'+week+'" class="week float-left" data-week="'+week+'">';
                  month_weeks[week] = new Array();
              }
              cap_tag += '<li class="day">'+day_correct+'</li>';
              month_weeks[week].push({
                  date: day_correct,
                  month: selected_month == 0 ? 11 : selected_month-1,
                  year: selected_month == 0 ? selected_year-1 :  selected_year,
                  events:[]
              });
              day_correct++;
              d_weeks_counter++;
          }
      }
  
      for (let index = 0; index < last_date_month.getDate(); index++) {
          if (d_weeks_counter == 0) {
              cap_tag += '<ul id="week'+week+'" class="week float-left" data-week="'+week+'">';
              month_weeks[week] = new Array();
          }
          cap_tag += '<li class="day">'+(index+1)+'</li>';
          month_weeks[week].push({
              date: (index+1),
              month: selected_month,
              year: selected_year,
              events:[]
          });
          d_weeks_counter++;
          if (d_weeks_counter == 7) {
              cap_tag += '</ul>';
              d_weeks_counter = 0;
              week++;
          }
      }
  
      for (let index = 0; index < correction_last_week; index++) {
          cap_tag += '<li class="day">'+(index+1)+'</li>';
          month_weeks[week].push({
              date: (index+1),
              month: selected_month == 11 ? 0 : selected_month+1,
              year: selected_month == 11 ? selected_year + 1 : selected_year,
              events:[]
          });
          d_weeks_counter++;
          if (d_weeks_counter == 7) {
              cap_tag += '</ul>';
              week++;
          }
      }
  
      document.querySelector(".nav-weeks").innerHTML = cap_tag;
      //console.log(month_weeks.length);
      for (let index = 1; index < month_weeks.length; index++) {
          //const element = month_weeks[index];
          document.querySelector("#week"+index).style.width = 100/(month_weeks.length-1)+'%'; 
      }
    }
  
    function declare_clicks_week(){
      var d_weeks_counters_btns = document.querySelectorAll(".week");
      Array.from(d_weeks_counters_btns).forEach(d_weeks_counters_btn =>{
          d_weeks_counters_btn.addEventListener('click', function(event){
              //console.log(this.getAttribute("data-week"));
              selected_week = this.getAttribute("data-week");
              draw_week_days(selected_week);
          });
      })
    }
  
    function remove_active_class_week(){
      for (let index = 1; index < month_weeks.length; index++) {
          if(document.querySelector("#week"+index).classList.contains('active-week')){
              document.querySelector("#week"+index).classList.remove('active-week');
          }
      }
    }
  
    function draw_week_days(week){
      fade_column_day();
      remove_active_class_week();
  
      document.querySelector("#mon_date").innerText = month_weeks[week][0].date;
      document.querySelector("#tue_date").innerText = month_weeks[week][1].date;
      document.querySelector("#wed_date").innerText = month_weeks[week][2].date;
      document.querySelector("#thu_date").innerText = month_weeks[week][3].date;
      document.querySelector("#fri_date").innerText = month_weeks[week][4].date;
      document.querySelector("#sat_date").innerText = month_weeks[week][5].date;
      document.querySelector("#sun_date").innerText = month_weeks[week][6].date;
  
      document.querySelector("#week"+week).classList.add('active-week');
  
      asign_events_to_days();
    }
  
    function find_week_by_date(day, month, year){
      var semana = 0;
      var sel_date = new Date(year,month,day);
      for (let index = 1; index < month_weeks.length; index++) {
          var ini_date = new Date(month_weeks[index][0].year, month_weeks[index][0].month, month_weeks[index][0].date);
          var fin_date = new Date(month_weeks[index][6].year, month_weeks[index][6].month, month_weeks[index][6].date);
          if(ini_date <= sel_date && sel_date <= fin_date){
              semana = index
          }
      }
      return semana;
    }
  
    function asign_events_to_days(){
      for (let index = 0; index < month_weeks[selected_week].length; index++) {
          //console.log(month_weeks[selected_week][index]);
          var events_html = '';
          for (let indexj = 0; indexj < eventos_agenda.length; indexj++) {
              //console.log(eventos_agenda[indexj].fecha.getMonth());
              if(
                  eventos_agenda[indexj].fecha.getFullYear() == month_weeks[selected_week][index].year && 
                  eventos_agenda[indexj].fecha.getMonth() == month_weeks[selected_week][index].month && 
                  eventos_agenda[indexj].fecha.getDate() == month_weeks[selected_week][index].date
              ){
                  events_html += get_lit_template(
                      eventos_agenda[indexj].url_evento, 
                      eventos_agenda[indexj].fecha.getHours()+":"+add_zero_to_less_ten(eventos_agenda[indexj].fecha.getMinutes()), 
                      eventos_agenda[indexj].evento
                  );
              }
              
          }
  
          if (events_html == '') {
              document.querySelector("#day_"+(index+1)+"_events").innerHTML = '<span class="info">Sin eventos</span>';
          }else{
              document.querySelector("#day_"+(index+1)+"_events").innerHTML = events_html;
          }
          
      }
      unfade_column_day();
    }
  
    function add_zero_to_less_ten(digits){
      if (digits < 10) {
          return '0'+digits;
      }else{
          return digits;
      }
    }
  
    function get_lit_template(url, time, event){
      var template = `<div class="o-card o-card--tiny day__event  ">
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i>${time}</span>
                          <h2><a href="${url}" target="_blank">${event}</a></h2>
                      </div>`;
  
      return template;
    }
  
    function fade_column_day(){
      var col_days = document.querySelectorAll('.day-column');
      Array.from(col_days).forEach(col_day =>{
          col_day.animate([{opacity:1},{opacity:0}],500);
      })
  
    }
  
    function unfade_column_day(){
      var col_days = document.querySelectorAll('.day-column');
      Array.from(col_days).forEach(col_day =>{
          col_day.animate([{opacity:0},{opacity:1}],500);
      })
    }
  
  });
  