<style>
    /* Calendar Styles */
.calendar {width:100%; border-collapse:collapse;}
.calendar tr.navigation th {padding-bottom:20px;}
.calendar th.prev-month {text-align:left;}
.calendar th.current-month {text-align:center; font-size:1.5em;}
.calendar th.next-month {text-align:right;}
.calendar tr.weekdays th {text-align:left;}
.calendar td {width:14%; height:100px; vertical-align:top; border:1px solid #CCC;}
.calendar td.today {background:#FFD;}
.calendar td.prev-next {background:#EEE;}
.calendar td.prev-next span.date {color:#9C9C9C;}
.calendar td.holiday {background:#DDFFDE;}
.calendar span.date {display:block; padding:4px; line-height:12px; background:#EEE;}
.calendar div.day-content {}
.calendar ul.output {margin:0; padding:0 4px; list-style:none;}
.calendar ul.output li {margin:0; padding:5px 0; line-height:1em; border-bottom:1px solid #CCC;}
.calendar ul.output li:last-child {border:0;}
 
/* Small Calendar */
.calendar.small {width:auto; border-collapse:separate;}
.calendar.small tr.navigation th {padding-bottom:5px;}
.calendar.small tr.navigation th a {font-size:1.5em;}
.calendar.small th.current-month {font-size:1em;}
.calendar.small tr.weekdays th {text-align:center;}
.calendar.small td {width:auto; height:auto; padding:4px 8px; text-align:center; border:0; background:#EEE;}
.calendar.small span.date {display:inline; padding:0; background:none;}
</style>
<table class="calendar">
    <thead>
        <tr class="navigation">
            <th class="prev-month"><a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><?php echo $calendar->prev_month() ?></a></th>
            <th colspan="5" class="current-month"><?php echo $calendar->month() ?> <?php echo $calendar->year ?></th>
            <th class="next-month"><a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>"><?php echo $calendar->next_month() ?></a></th>
        </tr>
        <tr class="weekdays">
            <?php foreach ($calendar->days() as $day): ?>
                <th><?php echo $day ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($calendar->weeks() as $week): ?>
            <tr>
                <?php foreach ($week as $day): ?>
                    <?php
                    list($number, $current, $data) = $day;
                     
                    $classes = array();
                    $output  = '';
                     
                    if (is_array($data))
                    {
                        $classes = $data['classes'];
                        $title   = $data['title'];
                        $output  = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
                    }
                    ?>
                    <td class="day <?php echo implode(' ', $classes) ?>">
                        <span class="date" title="<?php echo implode(' / ', $title) ?>"><?php echo $number ?></span>
                        <div class="day-content">
                            <?php echo $output ?>
                        </div>
                    </td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>