var timerID    = 0;
var lastUpdate = 0;
var challenge  = 0;

function zeropad(text)
{
  text = text.toString();
  if (text.length == 1)
    text = '0' + text;

  return text;
}

function secondsToDuration(seconds)
{
  var duration = '';

  if (seconds < 86400)
  {
    if (seconds >= 3600)
    {
      hours     = Math.floor(seconds / 3600);
      duration += zeropad(hours) + ':';
      seconds  -= hours*3600;
    }
    else
      duration += '00:';

    if (seconds >= 60)
    {
      minutes   = Math.floor(seconds / 60);
      duration += zeropad(minutes) + ':';
      seconds  -= minutes*60;
    }
    else
      duration += '00:';

    return duration + zeropad(seconds) + ' h';
  }
  else
    return '> 1 Tag';
}

function updateJobTable()
{
  if (xmlhttp.readyState != 4)
    return;

  // response-code # current_time # start-time | mails-sent | mails-total | finished-time | lastID | lastTimestamp # ...
  var job_data = xmlhttp.responseText.split('#');

  job_resp  = job_data[0];
  job_now   = job_data[1];
  job_entry = job_data.slice(2);

	//alert(job_now)

  if (job_resp != challenge)
    return;

  job_table = document.createElement('table');
  job_table.id = 'jobtable';
  job_table.cellSpacing = '0px';
  job_table.cellPadding = '0px';

  for (i=0; i < job_entry.length; i++)
  {
    job_entry[i] = job_entry[i].split('|');

    isFinished = false;
    isAborted  = false;
    isResumed  = true;

    now       = new Date();
    timestamp = new Date();
    now.setTime(job_now);
    timestamp.setTime(job_entry[i][0]);

    if (job_entry[i][3] != 0)
      if (job_entry[i][1] == job_entry[i][2]) // wenn mails-sent = mails-total, fertig
        isFinished = true;
      else
        isAborted  = true;

    if(((job_now - job_entry[i][5]) > 300000) && isFinished == false)	// 5 min
	  isResumed  = true;
	else
	  isResumed  = false;

    if (isAborted)
      statusClass = 'aborted';
    else
    if (isFinished)
      statusClass = 'finished';
    else
      statusClass = 'running';

    job_row = job_table.insertRow(-1);
    col1 = job_row.insertCell(-1);
    col2 = job_row.insertCell(-1);
    col3 = job_row.insertCell(-1);
    col4 = job_row.insertCell(-1);
    col5 = job_row.insertCell(-1);
    col6 = job_row.insertCell(-1);
    col7 = job_row.insertCell(-1);
    col8 = job_row.insertCell(-1);

    col1.width =  '15px';
    col2.width = '150px';
    col3.width = '150px';
    col4.width = '150px';
    col5.width = '150px';
    col6.width = '150px';
    col7.width =  '15px';
    col8.width =  '15px';

    col1.innerHTML = '#' + (i+1);
    //col1.innerHTML = (job_now - job_entry[i][5]);
    col2.innerHTML = zeropad(timestamp.getDate())  + '.' + zeropad(timestamp.getMonth()+1) + '.' +         timestamp.getFullYear()  + ' '
                   + zeropad(timestamp.getHours()) + ':' + zeropad(timestamp.getMinutes()) + ':' + zeropad(timestamp.getSeconds());
    col3.innerHTML = job_entry[i][1] + ' / ' + job_entry[i][2];
    col4.innerHTML = '<div class="progressfilled ' + statusClass + '" style="width:' + Math.floor(job_entry[i][1] / job_entry[i][2] * 148) + 'px"></div>'
                   + '<div class="percentage">' + Math.floor(job_entry[i][1] / job_entry[i][2] * 100) + ' %</div>'
                   + '<div class="progressempty"  style="width: 150px"></div>';
    col5.innerHTML = (isFinished || isAborted)
                       ? secondsToDuration(job_entry[i][3] - Math.floor(timestamp.getTime()/1000))
                       : secondsToDuration(Math.ceil((now.getTime() - timestamp.getTime()) / 1000));
    col6.innerHTML = (isFinished)
                       ? 'Fertiggestellt'
                       : isAborted
                         ? 'Abgebrochen'
                         : secondsToDuration(Math.ceil((job_entry[i][2] - job_entry[i][1]) / (job_entry[i][1] / (now.getTime() - timestamp.getTime()) * 1000)));
    col7.innerHTML = (!isFinished && !isAborted)
                       ? '<a href="javascript:stopMailJob(' + job_entry[i][0] + ',' + (i+1) + ')"><img src="images/abort.gif" width="14px" height="14px" border="0px" /></a>'
                       : '';
    col8.innerHTML = (!isFinished && isResumed)
                       ? '<a href="javascript:resumeMailJob(' + job_entry[i][0] + ',' + (i+1) + ')"><img src="images/resume.gif" width="14px" height="14px" border="0px" /></a>'
                       : '';
  }

  old_job_table = document.getElementById('jobtable');
  old_job_table.parentNode.replaceChild(job_table, old_job_table);
}

function getMailJobs()
{
  if (typeof xmlhttp == 'boolean')
  {
    errormsg = document.createElement('div');
    errormsg.innerText = '-- Mailjobs können auf Ihrem Browser nicht angezeigt werden, da dieser kein XMLHTTP unterst&uuml;tzt --';
    errormsg.className = 'errormsg';

    old_job_table = document.getElementById('jobtable');
    old_job_table.parentNode.replaceChild(errormsg, old_job_table);
  }
  else
  {
    if (timerID == 0)
      timerID = setInterval(getMailJobs, 1000);

    if (xmlhttp.readyState != 3)
    {
      challenge = Math.floor(Math.random() * 4294967296);
      xmlhttp.open('GET', 'inc/admin_mailjobs.php', true);
      xmlhttp.onreadystatechange = updateJobTable;
      document.cookie = 'challenge=' + challenge;
      xmlhttp.send(null);
      document.cookie = 'challenge=; expires=Mon, 26 Jul 1997 05:00:00 GMT';
    }
  }
}

function stopMailJob(jobID, jobNr)
{
  if (window.confirm('Wollen Sie Mailjob ' + jobNr + ' wirklich abbrechen?'))
  {
    xmlhttp2.open('GET', 'inc/admin_mailjobs.php', false);
    document.cookie = 'abort=' + jobID;
    xmlhttp2.send(null);
    document.cookie = 'abort=; expires=Mon, 26 Jul 1997 05:00:00 GMT';
  }
}

function resumeMailJob(jobID, jobNr)
{
  if (window.confirm('Wollen Sie Mailjob ' + jobNr + ' wirklich resumen?'))
  {
    /*
    xmlhttp2.open('GET', 'inc/admin_dispatchjob.php', false);
    document.cookie = 'resume=' + jobID;
    xmlhttp2.send(null);
    document.cookie = 'resume=; expires=Mon, 26 Jul 1997 05:00:00 GMT';
    */
    xmlhttp2.open('GET', 'inc/admin_dispatchjob.php?resume='+ jobID, false);
    xmlhttp2.send(null);
  }
}