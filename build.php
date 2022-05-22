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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
   <title>HallShow</title>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <meta name="generator" content="Geany 1.37.1" />
   <script src="jquery-3.6.0.min.js"></script>
   <style>
      body * {
         font-family: Arial, Helvetica, sans-serif;
      }

      body {
         background-color: #000000;
         color: #ffffff;
      }

      h1,
      h2,
      h3 {
         font-family: Arial, Helvetica, sans-serif;
         text-align: center;
         color: #ffffff;
      }

      .button {
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bolder;
         background-color: #6666ff;
         border-radius: 5em / 5em;
         height: 30px;
         padding: 5px 15px 5px 15px;
         margin: 5px;
         text-align: center;
         display: inline-flex;
         justify-content: center;
         align-items: center;
         cursor: pointer;
      }

      .buttonspace {
         opacity: 0;
         cursor: default;
      }

      .button:hover {
         background-color: #3333ff;
         color: #ffffff
      }

      #butcan {
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bolder;
         /*background-color: #fefefe;*/
         padding: 5px;
         margin: 5px;
         text-align: center;
      }

      #frames {
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bolder;
         background-color: #999999;
         height: 118px;
         padding: 5px;
         margin: 5px;
         text-align: center;
         width: auto;
         height: 138px;
         padding: 5px;
         overflow: scroll;
         white-space: nowrap;
         overflow-y: hidden;

      }

      .frame {
         position: relative;
         top: 0px;
         background-color: #000000;
         height: 108px;
         width: 192px;
         padding: 0;
         margin: 5px;
         text-align: center;
         display: inline-block;
         /*justify-content: center;
         align-items: center;*/
         cursor: pointer;
         border-color: #ffffff;
         border-width: 1px;
         border-style: solid;
         overflow: hidden;
      }

      .selfrm {
         border-color: #ff0000;
      }

      #settings {
         padding: 0;
         margin: 5px;
         text-align: center;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .setent {
         padding: 0;
         margin: 5px;
         text-align: center;
         display: inline-flex;
         justify-content: center;
         align-items: center;
      }

      #frcon {
         color: black;
         background-color: #ddd;
         font-family: Arial, Helvetica, sans-serif;
         padding: 5px;
         width: 99%;
         margin: 0px;
         min-height: 100px;
         text-align: left;
         height: fit-content;
         white-space: nowrap;
         overflow-x: scroll;
      }

      .thumb>svg,
      .thumb>iframe,
      .thumb>img,
      .thumb>video {
         width: 192px;
         height: 108px;
      }

      input {
         margin-left: 10px;
      }

      input[type=file] {
         width: 90px;
         color: transparent;
      }

      #wysiwyg {
         margin-top: 5px;
         background-color: #ffffff;
         position: relative;
         width: 100%;
         padding-top: 56.25%;
         /* 16:9 Aspect Ratio */
         overflow: scroll;
      }

      #wysiwyg>div {
         background-color: #ffffff;
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         text-align: center;
      }
   </style>
</head>

<body>

   <h1>SHOW BUILDER</h1>
   <div id='butcan'>
      <div onclick='addframe()' class='button' id='add_frame'>Add Frame</div>
      <div onclick='dupframe()' class='button' id='dup_frame'>Duplicate Frame</div>
      <div class='button buttonspace'>&nbsp;</div>
      <div onclick='delframe()' class='button' id='delete_frame'>Delete Frame</div>
      <div class='button buttonspace'>&nbsp;</div>
      <div onclick='shiftleft()' class='button' id='shiftleft'>Shift Left</div>
      <div onclick='shiftright()' class='button' id='shiftright'>Shift Right</div>
      <div class='button buttonspace'>&nbsp;</div>
      <div onclick='save()' class='button' id='save'>Save Show</div>
   </div>

   <div class='frames' id='frames'>
      <?php

      if (file_exists('./frames.html')) {
         $file = file_get_contents('./frames.html', true);
         echo $file;
      }
      ?>
   </div>


   <h3>Settings</h3>
   <div id='settings'>
      <div class="setent">
         <h4>Frame Duration</h4>
         <input onkeyup="conchg()" type="text" id="frdur" name="frdur">
         &nbsp;&nbsp;&nbsp;
      </div>
      <div class="setent">
         <h4>Fade Duration</h4>
         <input onkeyup="conchg()" type="text" id="fadur" name="fadur">
         &nbsp;&nbsp;&nbsp;
      </div>

      <h4>Load Frame</h4>
      <input id='selectedfile' type='text' name='selectedfile' hidden>
      <input id='inputfile' type='file' name='inputfile' onChange='showSelectedFile()'>

   </div>
   <!-- <div onkeyup="conchg()" id="frcon" contentEditable></div> -->
   <textarea onkeyup="conchg()" id="frcon" name="frcon" rows="4" cols="50"></textarea>
   <div id="wysiwyg" hidden>
      <div></div>
   </div>

   <script>
      var sel = null;
      var fcnt = 0;

      function moveChildTo(child, direction) {

         var span = child.parentNode,
            td = span.parentNode;

         if (direction === -1 && span.previousElementSibling) {
            td.insertBefore(span, span.previousElementSibling);
         } else if (direction === 1 && span.nextElementSibling) {
            td.insertBefore(span, span.nextElementSibling.nextElementSibling)
         }
      }

      function addframe() {
         var itm = document.getElementById('frames');
         fcnt++;
         var fid = window.performance.now().toString().replace(".", "");
         itm.innerHTML += "<div onclick='selectFrame(this.id)' class='frame' title='60|20' id='" + fid + "'><div id='thumb' class='thumb'></div></div>";
         selectFrame(fid);
      }

      function dupframe() {
         var itm = document.getElementById('frames');
         if (sel != null) {

            fcnt++;
            var fid = window.performance.now().toString().replace(".", "");
            itm.innerHTML += "<div onclick='selectFrame(this.id)' class='frame' title='60|20' id='" + fid + "'><div id='thumb' class='thumb'>" + document.getElementById(sel).children[0].innerHTML + "</div></div><del></del>";
            selectFrame(fid);
         }
      }

      function delframe() {
         var itm = document.getElementById('frames')
         if (sel != null) {
            itm.removeChild(document.getElementById(sel));
            document.getElementById("frcon").value = '';
            sel = null;
         }
      }

      function shiftleft() {
         if (sel != null) {
            moveChildTo(document.getElementById(sel).firstChild, -1);
            //itm.removeChild(document.getElementById(sel));
         }
      }

      function shiftright() {
         if (sel != null) {
            moveChildTo(document.getElementById(sel).firstChild, 1);
            //itm.removeChild(document.getElementById(sel));
         }
      }

      function selectFrame(id) {
         sel = id;
         for (i = 0; i < document.getElementById("frames").children.length; i++) {
            document.getElementById("frames").children[i].classList.remove("selfrm");
         }
         document.getElementById(id).classList.add("selfrm");
         var fdata = document.getElementById(id).title.split('|');
         document.getElementById("frcon").value = document.getElementById(sel).firstChild.innerHTML;
         document.getElementById("wysiwyg").firstChild.innerHTML = document.getElementById(sel).children[0].innerHTML;
         document.getElementById("frdur").value = fdata[0];
         document.getElementById("fadur").value = fdata[1];
      }

      function conchg() {
         if (sel != null) {
            var fdatas = document.getElementById("frdur").value + "|" + document.getElementById("fadur").value;
            document.getElementById(sel).title = fdatas;
            //document.getElementById(sel).firstChild.innerHTML = document.getElementById("frcon").innerText;
            document.getElementById(sel).children[0].innerHTML = document.getElementById("frcon").value;
            console.log(document.getElementById("frcon").value);
            console.log(document.getElementById(sel).firstChild.innerHTML);
         }
      }

      function save() {

         for (i = 0; i < document.getElementById("frames").children.length; i++) {
            document.getElementById("frames").children[i].classList.remove("selfrm");
         }

         var jqxhr = $.post("proc.php", {
            data: document.getElementById("frames").innerHTML
         });
         //console.log(jqxhr);


      }

      async function uploadFile() {
         let formData = new FormData();
         console.log(inputfile.files[0]);
         formData.append("file", inputfile.files[0]);

         let rep = await fetch('upload.php', {
            method: "POST",
            body: formData
         });
         let da = await rep.text();
         console.log(da);
         console.log('The file has been uploaded successfully.');
      }

      function showSelectedFile() {
         selectedfile.value = document.getElementById("inputfile").files[0].name;
      }

      document.getElementById('inputfile').addEventListener('change', function() {
         if (sel != null) {
            console.log(document.getElementById("inputfile").files[0].name);
            let fext = document.getElementById("inputfile").files[0].name.split('.')[1];
            console.log(fext);
            if (fext == 'svg') {
               var fr = new FileReader();
               fr.onload = function() {
                  document.getElementById(sel).firstChild.innerHTML = fr.result;
               }
               fr.readAsText(this.files[0]);
            } else {
               uploadFile();

               if (fext == 'mp4') {
                  document.getElementById(sel).firstChild.innerHTML = `
<video id="swtclogo" width="400" autoplay="" muted="">
  <source src="uploads/` + encodeURIComponent(document.getElementById("inputfile").files[0].name) + `" type="video/mp4">
  Your browser does not support HTML video.
</video>
`;
               } else if (fext == 'png' || fext == 'jpg' || fext == 'PNG' || fext == 'JPG') {
                  document.getElementById(sel).firstChild.innerHTML = `<img src="uploads/` + encodeURIComponent(document.getElementById("inputfile").files[0].name) + `">`;
               }
            }
            document.getElementById("frcon").value = document.getElementById(sel).firstChild.innerHTML;
            conchg();
         }
      })
   </script>


</body>

</html>