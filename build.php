<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <!-- No-op until loaded dynamically (could make configurable) -->

   <!-- STYLESHEETS (others loaded dynamically) -->
   </link>
   <style>
      body * {
         font-family: Arial, Helvetica, sans-serif;
      }

      body {
         height: 100vh;
         display: grid;
         grid-template-columns: 222px auto auto auto auto auto;
         gap: 1px;
         grid-auto-rows: minmax(60px, auto);

         overflow: hidden;
      }

      #settings {
         padding: 5px;
         width: 100%;
         height: 60px;
         grid-column: 5 / 7;
         grid-row: 1;

         display: grid;
         grid-template-columns: repeat(6, 1fr);
         gap: 10px;
         grid-auto-rows: minmax(60px, auto);

      }

      .setint {
         width: 100%;
         height: 60px;
         grid-column: 1;
         grid-row: 1;
      }

      #frames {
         width: 100%;
         grid-column: 1;
         grid-row: 2;
         background-color: black;
         overflow-y: scroll;
         overflow-x: hidden;
      }



      .thumb>svg,
      .thumb>iframe,
      .thumb>img,
      .thumb>video {
         width: 192px;
         height: 108px;
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

      .button {
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bolder;
         background-color: #6666ff;
         border-radius: 10px / 10px;
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
         /*background-color: #fefefe;*/
         padding: 5px;
         margin: 5px;
         text-align: center;

         width: 100%;
         height: 60px;

         grid-column: 1 / 4;
         grid-row: 1;

         display: grid;
         grid-template-columns: repeat(10, 1fr);
         gap: 10px;
         grid-auto-rows: minmax(60px, auto);

      }

      #editor {
         width: 100%;
         height: 100%;
         grid-column: 2 / 7;
         grid-row: 2 / 2;

         display: grid;
         grid-template-columns: 50px auto 200px;
         gap: 10px;
         grid-auto-rows: 50px auto;
      }

      #filebar {
         grid-column: 1/4;
         grid-row: 1;
      }

      #toolbar {
         grid-column: 1;
         grid-row: 2;
      }

      #slide {
         grid-column: 2;
         grid-row: 2;
      }

      #properties {
         grid-column: 3;
         grid-row: 2;
      }
   </style>
   <!-- Lacking browser support -->
   <script type="module" src="./browser-not-supported.js"></script>
   <title>HallShow</title>
</head>

<body style="margin:0">
  
</body>
<script>
  
</script>

</html>