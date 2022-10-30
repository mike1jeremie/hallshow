<?php
/*
 * index.php
 * 
 * Copyright 2022 RedMud Design
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * 
 */

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
   <title>HallShow</title>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <meta name="generator" content="Geany 1.37.1" />
   <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
   <meta http-equiv="Pragma" content="no-cache" />
   <meta http-equiv="Expires" content="0" />
   <script src="jquery-3.6.0.min.js"></script>
   <style>
      h1 {
         font-family: Arial, Helvetica, sans-serif;
         text-align: center;
      }

      #show {
         display: block;
         position: relative;
         width: 100%;
         height: 100%;
      }

      .fb,
      .framecont {
         background-color: black;
         position: fixed;
         display: block;
         width: 100vw;
         height: 100vh;
         top: 0;
         left: 0;
         padding: 0;
         margin: 0;
         overflow: hidden;
      }
   </style>
</head>

<body>

   <div id='show'>
      <div class='fb' id='a'></div>
      <div class='fb' id='b'></div>
   </div>
   <div class='frames' id='frames' hidden></div>
</body>
<script>
   var cur = 0;
   var dt = new Date();
   var dts = dt.getTime();
   var dtd = 0;
   var dur = 0;
   var cnt = 0;
   var frames = []; //frame time, fade time, pre roll, type, url
   var cur = 0;
   var l = 1;
   var ln = ['#a','#b'];
   const tags = ['img', 'vid', 'ifr'];
   const struct = ['<img class="framecont"  src="|name|?|D|">', '<video class="framecont" autoplay muted>  <source src="|name|?|D|" type="video/mp4">', '<iframe class="framecont" src="|name|&|D|"></iframe>'];

   setInterval(function() {
      if (cur == 0) {
         var d = new Date();
         $("#frames").load("./list.txt?" + d.getTime(), function() {
            frames = [];
            let list = document.getElementById("frames").innerHTML.split('\n');
            for (i = 0; i < list.length; i++) {
               let frame = list[i].split('|');
               if (frame.length == 5) {
                  frame[0] = parseInt(frame[0]);
                  frame[1] = parseInt(frame[1]);
                  frame[2] = parseInt(frame[2]);
                  frames.push(frame);
               }
            }
         });
      }
      if (frames.length > 0) {
         if (dts > (dtd + ((frames[cur][0]) * 100))) {
            if (dtd != 0) cur = ((cur + 1) % frames.length);
            document.getElementById('show').children[l].style.zIndex = "-1";
            l++;
            l = l%2;
            document.getElementById('show').children[l].style.zIndex = "99";
            document.getElementById('show').children[l].style.opacity = 0;

            var d = new Date();
            document.getElementById('show').children[l].innerHTML = struct[tags.indexOf(frames[cur][3])].replace('|name|', frames[cur][4]).replace('|D|',d.getTime());

            dtd = dts;
            cnt = -Math.round(frames[cur][2]);
         }

         document.getElementById('show').children[l].style.opacity = Math.max(0, Math.min(cnt, frames[cur][1])) / frames[cur][1];
         //console.log(cur +"    "+frames[cur][2]);

         dt = new Date();
         dts = dt.getTime();
         cnt++;
      }
   }, (1 / 30 * 1000));
</script>

</html>