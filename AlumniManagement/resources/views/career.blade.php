<div class=" Date1" style="clear: both; margin-top: 20px">
    <h4 style="color: #227dc7">From: {{$com->pivot->start_time}}<span></span> To: {{is_null($com->pivot->quit_time) ? "Now" : $com->pivot->quit_time}}</h4>
    <span style="display: flex;"><i class="material-icons">account_balance</i>Company: {{$com->name}}</span><br>
    <span style="display: flex;"><i class="material-icons">book</i>Job: {{$com->pivot->job}}</span><br>
    <span style="display: flex;"><i class="material-icons">money</i>Salary (US$): {{$com->pivot->salary}}</span><br>
</div>
