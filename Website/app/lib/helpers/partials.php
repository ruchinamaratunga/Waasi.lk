<?php

function notificationHead($customer,$comment,$date){
    $html = '<div class="row">
                <div class="col-sm-2 col-xs-2">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </div>
                </div>
                <div class="col-sm-10 col-xs-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">';
    $html .= '<strong style="padding-left: 5px;">'.$customer.'</strong> <span class="text-muted pull-right">'.$date.'</span></div>';
    $html .= '<div class="panel-body">'.$comment.'</div></div></div></div>';
    
    return $html;
}
