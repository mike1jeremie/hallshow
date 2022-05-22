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

      .fb {
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

      .thumb {
         width: 100%;
         height: 100%;
         padding: 5px;
      }

      .thumb>svg,
      .thumb>img,
      .thumb>iframe,
      .thumb>video {
         width: 100%;
         height: 100%;
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
   var frames = [];
   var cur = 0;
   var doc = null;

   function moveChildTo(child, direction) {

      var span = child.parentNode,
         td = span.parentNode;

      if (direction === -1 && span.previousElementSibling) {
         td.insertBefore(span, span.previousElementSibling);
      } else if (direction === 1 && span.nextElementSibling) {
         td.insertBefore(span, span.nextElementSibling.nextElementSibling)
      }
   }


   setInterval(function() {
      if (cur == 0) {
         var d = new Date();

         $.get("./frames.html?" + d.getTime(), function(response) {
            var data = response;
            //console.log(data);

            var parser = new DOMParser();
            doc = parser.parseFromString(data, 'text/html');
            frames = [];
            for (i = 0; i < doc.body.children.length; i++) {
               let frame = [];
               frame.push(doc.body.children[i].id);
               frame.push(parseInt(doc.body.children[i].title.split('|')[0]));
               frame.push(parseInt(doc.body.children[i].title.split('|')[1]));
               frames.push(frame);
            }

            //console.log(doc);
         });
/*
         $("#frames").load("./frames.html?" + d.getTime(), function() {
            document.getElementById("frames").innerHTML = document.getElementById("frames").innerHTML.replaceAll('onclick="selectFrame(this.id)" class="frame"', '');
            frames = [];
            for (i = 0; i < document.getElementById("frames").children.length; i++) {
               let frame = [];
               frame.push(document.getElementById("frames").children[i].id);
               frame.push(parseInt(document.getElementById("frames").children[i].title.split('|')[0]));
               frame.push(parseInt(document.getElementById("frames").children[i].title.split('|')[1]));
               frames.push(frame);
            }
         });
*/
      }

      if (frames.length > 0) {
         if (dts > (dtd + (frames[cur][1] * 100))) {
            if (dtd != 0) cur = ((cur + 1) % frames.length);
            document.getElementById('show').children[0].style.opacity = 0;
            document.getElementById('show').children[0].innerHTML = doc.getElementById(frames[cur][0]).innerHTML;//document.getElementById(frames[cur][0]).innerHTML;
            document.getElementById('show').insertBefore(document.getElementById('show').children[1], document.getElementById('show').children[0]);
            dtd = dts;
            cnt = 0;
         }

         document.getElementById('show').children[1].style.opacity = Math.min(Math.max(cnt-20,0), frames[cur][2]) / frames[cur][2];
         //console.log(cur +"    "+frames[cur][2]);

         dt = new Date();
         dts = dt.getTime();

         cnt++;
      }
   }, (1 / 30 * 1000));
</script>

</html>